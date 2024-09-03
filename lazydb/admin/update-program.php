<?php include "header.php"; ?>


<?php

  $program_id = $_GET['program_id'];

  $query = "select * from my_projects where program_id=$program_id";
  $result = mysqli_query($con,$query);

  // Plateform | Program | <Subdomains> Search Trick
  while($row = mysqli_fetch_assoc($result)){

?>


<div class="tables">
    <!-- last appoinments start  -->
    <div class="last-appoinments">
        <div class="heading">
            <h3>Update Program</h3>
        </div><br>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

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
  <form action="/action_page.php">
    <label for="fname">Program Name</label>
    <input type="text" id="fname" name="firstname" value="<?php echo $row['program_name']; ?>" placeholder="Your name..">

    <label for="lname">Program Platform</label>
    <input type="text" id="lname" value="<?php echo $row['program_visiblity']; ?>" name="lastname" placeholder="Your last name..">

    <label for="platforms">Bughunting Platforms</label>
    <select id="platforms" name="platforms">
      <option value="yeswehack">YesWeHack</option>
      <option value="hackerone">HackerOne</option>
      <option value="bugcrowd">BugCrowd</option>
    </select>

    <label for="subject">Subdomains</label>
    <textarea id="subject" name="subject" placeholder="Your Subdomains" style="height:200px"><?php echo $row['program_subdomains']; ?></textarea>

    <input type="submit" value="Submit">
  </form>
</div>


<?php } ?>