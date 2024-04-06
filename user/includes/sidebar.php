<?php
// Start the session
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['rno'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../../fontawesome/css/all.min.css">
    <title>Dashboard</title>
    
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span>Anits Bus Pass Management</span></h2>
        </div>
        <nav>
            <div class="sidebar-menu">
                <ul>
                    <li><a href="dashboard.php" class="active"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="dropdown-1">
                        <li><a href="./add_pass.php" style="padding:10px;">Apply Pass</a></li>
                        <li><a href="./view_pass.php" style="padding:10px;">View Pass</a></li>
                    </li>
                </ul>
            </div>  
        </nav>
    </div>
</body>
</html>
