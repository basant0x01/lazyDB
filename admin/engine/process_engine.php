<?php
// Ensure the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start_engine'])) {
    // Retrieve the program_id from the POST request
    $program_id = isset($_POST['program_id']) ? htmlspecialchars($_POST['program_id']) : '';

    // Database connection (adjust these values to your setup)
    $host = 'localhost';
    $db = 'lazydb';
    $user = 'root';
    $pass = '';
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query to fetch program_domain based on program_id
        $stmt = $pdo->prepare("SELECT program_domains FROM my_projects WHERE program_id = :program_id");
        $stmt->execute(['program_id' => $program_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Define the path to the file
        $file_path = 'subdomain_enumeration/wildcard_domains.txt';
        
        // Open the file for writing (create if it doesn't exist)
        $file = fopen($file_path, 'w');
        
        if ($file) {
            if ($result) {
                // Write the program_domain to the file
                fwrite($file, htmlspecialchars($result['program_domains']));
            } else {
                fwrite($file, "No program found with the given ID.");
            }
            // Close the file
            fclose($file);
            
            // Execute the Bash script
            $script_path = 'subdomain_enumeration/subdomain_enumerator.sh';
            $output = shell_exec("bash $script_path 2>&1");
            
            // Handle the output of the script
            if ($output === null) {
                echo "Error executing bash script.";
            } else {
                // Read and clean the output file
                $subdomains_file_path = 'subdomain_enumeration/temp-subdomains.txt';
                if (file_exists($subdomains_file_path)) {
                    $subdomains_raw = file_get_contents($subdomains_file_path);
                    
                    // Clean up the raw subdomains data
                    $subdomains_raw = trim($subdomains_raw); // Remove any leading or trailing whitespace
                    $subdomains_raw = trim($subdomains_raw, '[]'); // Remove square brackets
                    $subdomains_raw = str_replace('"', '', $subdomains_raw); // Remove double quotes
                    
                    // Split the cleaned string into an array of subdomains
                    $subdomains = array_filter(array_map('trim', explode("\n", $subdomains_raw))); // Use newline as the delimiter
                    
                    if ($subdomains) {
                        // Convert array to a string, each subdomain on a new line
                        $subdomains_string = implode("\n", $subdomains);
                        
                        // Prepare SQL statement to update the program_subdomains column
                        $update_stmt = $pdo->prepare("UPDATE my_projects SET program_subdomains = :subdomains WHERE program_id = :program_id");
                        $update_stmt->execute([
                            'program_id' => $program_id,
                            'subdomains' => $subdomains_string
                        ]);
                        
                        // Redirect to the view-program page
                        header("Location: http://localhost/lazydb/admin/view-program.php?program_id=$program_id");
                        exit; // Ensure that no further code is executed after the redirect
                    } else {
                        echo "No subdomains found.";
                    }
                } else {
                    echo "Subdomains file not found.";
                }
            }
        } else {
            echo "Error: Unable to open file for writing.";
        }
    } catch (PDOException $e) {
        echo "Error: " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "Invalid request.";
}
?>