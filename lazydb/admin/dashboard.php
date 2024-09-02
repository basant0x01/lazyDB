<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include "db.php";
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
                <a href="#">
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
                <div class="card-name">All Subdomains</div>
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
    <?php
        // Check if search form is submitted
            if(isset($_POST['search'])) {
                $search_query = $_POST['search_query'];
                // Modify the SQL query to include search filter for both program name and subdomain
                $query = "SELECT * FROM my_projects WHERE program_name LIKE '%$search_query%' OR program_subdomains LIKE '%$search_query%'";
                        } else {
                        // Default query to fetch all projects
                    $query = "SELECT * FROM my_projects";
                    }        
                $result = mysqli_query($con, $query);
    ?>
    <!-- table start  -->

<div class="tables">
    <!-- last appoinments start  -->
    <div class="last-appoinments">
        <div class="heading">
            <h3>Program Management</h3>
                <div style="padding: 10px;" class="search">
                    <input type="text" name="search" placeholder="Search Subs/Progs">
                    <label for="search"><i class="fa fa-search"></i></label>
                </div>
            <a href="#" class="btn">View All</a>
        </div>

    <style>
        .table-container {
            max-height: 500px; /* Adjust height as needed */
            overflow-y: auto;
            border: 1px solid #ddd; /* Optional: Add border for better visibility */
        }

        .appoinments {
            width: 100%;
            border-collapse: collapse;
        }

        .appoinments th, .appoinments td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .appoinments th {
            background-color: #f4f4f4;
        }

        thead {
            position: sticky;
            top: 0;
            background-color: #f4f4f4;
            z-index: 1;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }


        overflow-y: auto;


        tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

    </style>
</head>
<body>
    <div class="table-container">
        <table class="appoinments">
            <thead>
                <tr>
                    <th>Program Name</th>
                    <th>Platform</th>
                    <th>Visibility</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['program_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['program_platform']); ?></td>
                    <td><?php echo htmlspecialchars($row['program_visiblity']); ?></td>
                    <td>
                        <i class="far fa-eye"></i>
                        <i class="far fa-edit"></i>
                        <i class="far fa-trash-alt"></i>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>


    </div>
    <!-- last Appointments end  -->
    <!-- doctor visit start  -->
    <div class="doctors-visiting">
        <div class="heading">
            <h3>Technology Divison</h3>
            <a href="#" class="btn">View All</a>
        </div>
        <table class="visiting">
            <thead>
                <td>Photo</td>
                <td>Technology</td>
                <td>Total Subs</td>
                <td>Details</td>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="img-box-small">
                            <img src="./asset/img/doctor-icon.png" alt="">
                        </div>
                    </td>
                    <td>PHP</td>
                    <td>6734</td>
                    <td><i class="far fa-eye"></i></td>
                </tr>
                <tr>
                    <td>
                        <div class="img-box-small">
                            <img src="./asset/img/doctor-2.webp" alt="">
                        </div>
                    </td>
                    <td>Cloudflare</td>
                    <td>334</td>
                    <td><i class="far fa-eye"></i></td>
                </tr>
                <tr>
                    <td>
                        <div class="img-box-small">
                            <img src="./asset/img/doctor-3.webp" alt="">
                        </div>
                    </td>
                    <td>Laravel FW</td>
                    <td>332</td>
                    <td><i class="far fa-eye"></i></td>
                </tr>
           
                <tr>
                    <td>
                        <div class="img-box-small">
                            <img src="./asset/img/doctor-5.jpeg" alt="">
                        </div>
                    </td>
                    <td>Adobe</td>
                    <td>10</td>
                    <td><i class="far fa-eye"></i></td>
                </tr>
                <tr>
                    <td>
                        <div class="img-box-small">
                            <img src="./asset/img/doctor-6.png" alt="">
                        </div>
                    </td>
                    <td>Java</td>
                    <td>109</td>
                    <td><i class="far fa-eye"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- doctor visit end  -->
</div>
    <!-- table end -->
</div>
    <!-- main end-->
</div>
    <!-- container end -->
</body>
</html>