<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include "db.php";
    include "auth_check.php"; // Check if user is logged in or not.
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LazyDB Admin Dashboard</title>
    <link rel="stylesheet" href="asset/css/view-program-style.css">
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
    
    <!-- cards end  -->

