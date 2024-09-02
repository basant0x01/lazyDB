<?php
    session_start();
    include "admin/db.php";
    
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {
          $row = mysqli_fetch_assoc($result);
          if ($row['username'] === $username && $row['password'] === $password) {

              $_SESSION['user_id'] = $row['user_id'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['user_email'] = $row['user_email'];

                header("Location: admin/dashboard.php");
                exit();

              }else{

            }

          }

        ?>

          <script type="text/javascript">alert("Incorrect Username or Password!");</script>

          <?php
      }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    <div class="whole">
        <div class="container">
            <div class="title">LazyDB v1.0</div>
            <form action="" method="POST">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input name="username" type="text" placeholder="Email or Phone" required>
                </div>
                
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" placeholder="Password" required>
                </div>
                <div class="pass"><a href="#">Forgot Password?</a></div>
                
                <div class="row bottom">
                    <input type="submit" name="login" value="Login">
                </div>
                <div class="signup-link">Not a member? <a href="#">Signup Now</a></div>
            </form>
        </div>
    </div>
</body>
</html>