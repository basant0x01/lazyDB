<?php
include "db.php";

$query = "SELECT program_subdomains, program_manual_subdomains FROM my_projects";
$result = mysqli_query($con, $query);

$subdomains = '';

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $subdomain_string = $row['program_subdomains'] . ',' . $row['program_manual_subdomains'];
        $subdomain_array = explode(",", $subdomain_string); // Assuming subdomains are separated by commas
        foreach ($subdomain_array as $subdomain) {
            // Trim to remove leading/trailing whitespaces
            $subdomains .= trim($subdomain) . "\n";
        }
    }
}

$total_subdomains = substr_count($subdomains, "\n") + 1; // Counting total lines

?>

<pre><?php echo $subdomains; ?></pre>