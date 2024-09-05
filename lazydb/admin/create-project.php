<?php include "header.php"; ?>

<div class="tables">
    <!-- last appoinments start  -->
    <div class="last-appoinments">
        <div class="heading">
            <h3>Create New Program</h3>
        </div><br>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

body {
    margin: 0;
    padding: 0;
    overflow: auto; /* Ensure scrolling is enabled */
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
}
</style>
</head>
<body>


<div class="container">
  <form action="" method="POST">
    <label for="fname">Program Name</label>
    <input type="text" id="" name="program_name" value="" placeholder="Program name..">

    <label for="subject">Program's Wildcard Domains</label>
    <textarea id="" name="program_domains" placeholder="Your Wildcard Domains" style="height:200px"></textarea>

    <label for="Visibility">Program Visibility</label>
    <select id="Visibility" name="program_visiblity">
      <option value="Public">Public</option>
      <option value="Private">Private</option>
    </select>


    <label for="type">Program Types</label>
    <select id="type" name="program_type">
      <option value="VDP">VDP</option>
      <option value="BBP">BBP</option>
    </select>

    <label for="platforms">Bughunting Platforms</label>
    <select id="platforms" name="program_platform">
      <option value="hackerone">HackerOne</option>
      <option value="bugcrowd">BugCrowd</option>
      <option value="yeswehack">YesWeHack</option>
    </select>

    <label for="subject">Manually Added Subdomains (If Available)</label>
    <textarea id="subject" name="program_manual_subdomains" placeholder="Your Manuall Subdomains" style="height:200px"></textarea>

    <input type="submit" name="create_project" value="Create">
  </form>
</div>

<?php
                  if (isset($_POST['create_project'])) {
                      // Retrieve form data
                      $program_name = $_POST['program_name'];
                      $program_domains = $_POST['program_domains'];
                      $program_visiblity = $_POST['program_visiblity'];
                      $program_type = $_POST['program_type'];
                      $program_platform = $_POST['program_platform'];
                      $program_manual_subdomains = $_POST['program_manual_subdomains'];
                      $program_subdomains = $_POST['program_subdomains'];
                      

                      // Construct the INSERT query
                      $query = "INSERT INTO my_projects (program_name, program_domains, program_visiblity, program_type, program_platform,program_manual_subdomains, program_subdomains) VALUES ('$program_name', '$program_domains','$program_visiblity', '$program_type', '$program_platform', '$program_manual_subdomains', '$program_subdomains')";

                      // Execute the query
                      if (mysqli_query($con, $query)) {
              ?>
                          <!-- Display success message if insertion is successful -->
                          <script type="text/javascript">alert("Program Created Successfully")</script>
                          <script type="text/javascript">
                          window.location.href = "http://localhost/lazydb/admin/dashboard.php";
                          </script>
              <?php
                      } else {
                          // Display error message if there's an issue with the query execution
                          echo "Error: " . $query . "<br>" . mysqli_error($con);
                      }

                      // Close database connection
                      mysqli_close($con);
                  }
              ?>