<?php include "header.php"; ?>
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
            <h3 style="background: indianred;padding: 6px;color: white;">Program Management</h3>
                <div style="padding: 10px;" class="search">
                    <input type="text" name="search" placeholder="Search Subs/Progs">
                    <label for="search"><i class="fa fa-search"></i></label>
                </div>
                <a style="background: linear-gradient(45deg, #47cebe , #ef4a82);padding: 6px;color: white;text-decoration: none;" href="create-project.php">Create New Project</a>
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
                        <a href="view-program.php?program_id=<?php echo $row['program_id']; ?>"><i class="far fa-eye"></i></a>
                        <a href="update-program.php?program_id=<?php echo $row['program_id']; ?>"><i class="far fa-edit"></i></a>
                        <a href="delete-program.php?program_id=<?php echo $row['program_id']; ?>"><i class="far fa-trash-alt"></i></a>
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
            <h3>Technology Divison [ Top-10 ]</h3>
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
                    <td>Elementor</td>
                    <td>10</td>
                    <td><i class="far fa-eye"></i></td>
                </tr>
                <tr>
                    <td>
                        <div class="img-box-small">
                            <img src="./asset/img/doctor-6.png" alt="">
                        </div>
                    </td>
                    <td>phpMyAdmin</td>
                    <td>109</td>
                    <td><i class="far fa-eye"></i></td>
                </tr>
                <tr>
                    <td>
                        <div class="img-box-small">
                            <img src="./asset/img/doctor-6.png" alt="">
                        </div>
                    </td>
                    <td>Apache Web Server</td>
                    <td>109</td>
                    <td><i class="far fa-eye"></i></td>
                </tr>
                <tr>
                    <td>
                        <div class="img-box-small">
                            <img src="./asset/img/doctor-6.png" alt="">
                        </div>
                    </td>
                    <td>OS: Unix</td>
                    <td>109</td>
                    <td><i class="far fa-eye"></i></td>
                </tr>
                <tr>
                    <td>
                        <div class="img-box-small">
                            <img src="./asset/img/doctor-6.png" alt="">
                        </div>
                    </td>
                    <td>OS: Linux</td>
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