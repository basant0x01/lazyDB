<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 Unauthorized</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            max-width: 600px;
            text-align: center;
        }
        h1 {
            font-size: 48px;
            color: #d9534f;
            margin: 0;
        }
        p {
            font-size: 18px;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border-radius: 4px;
            text-decoration: none;
            margin: 10px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        footer a {
            color: #007bff;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>401 Unauthorized</h1>
        <p>Sorry, but you don't have permission to access this page.</p>
        <p>It looks like you need to log in to view this content. Please make sure you are logged in with the appropriate credentials.</p>
        <a href="/lazydb/login.php" class="btn">Log In</a>
        <!-- <a href="/signup" class="btn">Sign Up</a> -->
        <p>If you need assistance, please <a href="/support">contact our support team</a>.</p>
        <footer>
            © 2024 LazyDB v0.1. All rights reserved. | 
            <a href="/privacy-policy">Privacy Policy</a> | 
            <a href="/terms-of-service">Terms of Service</a>
        </footer>
    </div>
</body>
</html>
