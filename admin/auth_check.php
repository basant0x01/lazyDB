<?php
// Check if session is not created
if (isset($_SESSION['username']) || $_SESSION['user_email'] == true) {

}else{

    header("Location: forbiddens/401.php");
    exit();
}

?>