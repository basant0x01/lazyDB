<?php include "view-program-header.php"; ?>

<?php
$program_id = intval($_GET['program_id']); // Sanitize input
$query = "SELECT * FROM my_projects WHERE program_id = $program_id";
$result = mysqli_query($con, $query);

// Platform | Program | <Subdomains> Search Trick
while ($row = mysqli_fetch_assoc($result)) {
?>

<!-- card start  -->

<div class="cards">
    <div class="card" style="padding: 15px;">
        <div class="card-content">
            <label>Program Name:</label>
            <div class="card-name"><?php echo htmlspecialchars($row['program_name']); ?></div>
            <label>Program Type: <?php echo htmlspecialchars($row['program_type']); ?></label>
            <div class="card-name"></div>
            <label>Program Platform: <?php echo htmlspecialchars($row['program_platform']); ?></label>
            <div class="card-name"></div>
            <label>Program Visibility: <?php echo htmlspecialchars($row['program_visiblity']); ?></label>
            <div class="card-name"></div>
        </div>
    </div>

    <?php
    $query = "SELECT program_subdomains, program_manual_subdomains FROM my_projects WHERE program_id = $program_id";
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

    $total_subdomains = count(array_filter(explode("\n", trim($subdomains))));
    ?>

    <div class="card" style="padding: 20px;">
        <div class="card-content">
            <div class="number">
                <!-- Add form for START ENGINE -->
                <form method="post" action="engine/process_engine.php">
                    <input type="hidden" name="program_id" value="<?php echo htmlspecialchars($_GET['program_id']); ?>">
                    <button type="submit" name="start_engine" style="margin-right: 5px; padding: 5px; margin-left: 30px; background-color: green; color: white;">START ENGINE</button>
                </form>
            </div>
            <div class="card-name" style="margin-left: 30px;">Engine Status: <span style="color: white;">Neutral</span></div>
            <div class="card-name" style="margin-left: 30px;">Engine Debug Log: <a style="text-decoration: none;" href="">Access Log</a></div>
        </div>
    </div>

    <div class="card">
        <div class="card-content">
            <div class="number"><?php echo $total_subdomains; ?></div>
            <label>Total Subdomains <span><a style="text-decoration: none;" href="view-subdomains.php?program_id=<?php echo htmlspecialchars($_GET['program_id']); ?>">View Details</a></span></label>
        </div>
    </div>

    <div class="card">
        <div class="card-content">
            <div class="number">0</div>
            <label>New Subdomains [24/hr] <span><a style="text-decoration: none;" href="">View Details</a></span></label>
        </div>
    </div>

    <!-- cards end  -->
</div>

<?php } ?>
