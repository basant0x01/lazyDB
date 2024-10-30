<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include "db.php";
    include "auth_check.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LazyDB Admin Dashboard</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
    <!-- container start -->
<div class="container">
    <!-- sidebar start  -->
    <div class="sidebar">
        <ul>
            <li>
                <a href="http://localhost/lazydb/admin/dashboard.php">
                    <i class="fas fa-clinic-medical"></i>
                    <div class="title">LazyDB v0.1</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-th-large"></i>
                    <div class="title">All Modules</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-stethoscope"></i>
                    <div class="title">Configuration</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <div class="title">Settings</div>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fas fa-question"></i>
                    <div class="title">Logout</div>
                </a>
            </li>
        </ul>
    </div>
    <!-- sidebar end  -->
    <!-- main start -->
    <div class="main">
    <!-- top-bar start  -->
    <div class="top-bar">
        <div class="search">
            <input type="text" name="search" placeholder="Search Subdomains / Programs">
            <label for="search"><i class="fa fa-search"></i></label>
        </div>
        <i class="fas fa-bell"></i>
        <div class="user">
           <h5 style="margin-top: 10px;margin-left: 30px;">Admin</h5>
        </div>
    </div>
    <!-- top-bar end  -->
    <!-- card start  -->
    <div class="cards">
        <div class="card">
            <div class="card-content">
                    <?php
                    // Query to count the number of projects
                    $query = "SELECT COUNT(*) AS total_projects FROM my_projects";

                    // Execute the query
                    $result = mysqli_query($con, $query);

                    // Check if the query was successful
                    if ($result) {
                        // Fetch the result
                            $row = mysqli_fetch_assoc($result);
                            $total_projects = $row['total_projects'];
                        } else {
                            // Handle query error
                            $total_projects = 0;
                            echo "Error executing query: " . mysqli_error($con);
                            }
                        ?>
                    <div class="number"><?php echo $total_projects; ?></div>
                        <?php
                    ?>
                <div class="card-name">Total Projects</div>
            </div>
            <div class="icon-box">
                <i class="fas fa-briefcase-medical"></i>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <?php
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

                      $total_subdomains = count(explode("\n", trim($subdomains)));
                      ?>
                <div class="number"><?php echo $total_subdomains; ?></div>
                <div class="card-name">All Subdomains: <span><a style="text-decoration: none;" href="view-total-subdomains.php">View Details</a></span></div>
            </div>
            <div class="icon-box">
                <i class="fas fa-wheelchair"></i>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="number">8</div>
                <div class="card-name">New Subdomains</div>
            </div>
            <div class="icon-box">
                <i class="fas fa-bed"></i>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="number">$4500</div>
                <div class="card-name">Earnings</div>
            </div>
            <div class="icon-box">
                <i class="fas fa-dollar-sign"></i>
            </div>
        </div>
    </div>
    <!-- cards end  -->