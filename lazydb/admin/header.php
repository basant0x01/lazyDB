<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php 
  session_start();
  include "db/db.php";
?>

<head>
    <meta charset="UTF-8">
    <title>Advance Project Management System | LazyDB</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxs-bank'></i>
        <span class="logo_name">LazyDB</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="#" class="active">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-box'></i>
                <span class="links_name">All Modules</span>
            </a>
        </li>
        <li class="log_out">
            <a href="../logout.php">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
            </a>
        </li>
    </ul>
</div>

<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Dashboard</span>
        </div>

        <div class="search-box">
            <input type="text" placeholder="Subdomains / Programs">
            <i class='bx bx-search'></i>
        </div>

        <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">$whoami <?php echo $_SESSION['username']; ?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>