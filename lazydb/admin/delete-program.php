<?php

include "db.php";

$program_id = $_GET['program_id'];

$query = "DELETE from my_projects WHERE program_id=$program_id";

if (mysqli_query($con, $query)){

   ?>

   <script type="text/javascript">
   window.location.href = "http://localhost/lazydb/admin/dashboard.php";
   </script>

   <?php

} else {

  echo "Error deleting record: " . $conn->error;
}

?>