<?php
// Start the session
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['rno'])) {
    header("Location: login.php");
    exit;
}

// Establish database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'buspassms';

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Retrieve pass details of the current user
$rno = $_SESSION['rno'];
$query = "SELECT * FROM pass WHERE rno = '$rno'";
$result = mysqli_query($con, $query);

// Fetch pass details into an array
$passes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $passes[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Passes</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .your-passes{
            margin-left: 100px;
            margin-top: 10px;
        }
    </style>

</head>
<body>
<?php include_once('includes/sidebar.php');?>
<?php include_once('includes/header.php');?>
    <h1 style="margin-left: 100px; margin-top:70px">Your Passes:</h1>
    <table border="3" class="your-passes">
        <thead>
            <tr>
                <th style="padding:5px;">ID</th>
                <th style="padding:5px;">Pass Number</th>
                <th style="padding:5px;">Full Name</th>
                <th style="padding:5px;">Phone Number</th>
                <th style="padding:5px;">Roll Number</th>
                <th style="padding:5px;">Category</th>
                <th style="padding:5px;">Address</th>
                <th style="padding:5px;">Cost</th>
                <th style="padding:5px;">Date</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($passes as $pass): ?>
            <tr>
                <td style="padding:5px;"><?php echo $pass['id']; ?></td>
                <td style="padding:5px;"><?php echo $pass['pass_number']; ?></td>
                <td style="padding:5px;"><?php echo $pass['fname']; ?></td>
                <td style="padding:5px;"><?php echo $pass['number']; ?></td>
                <td style="padding:5px;"><?php echo $pass['rno']; ?></td>
                <td style="padding:5px;"><?php echo $pass['category']; ?></td>
                <td style="padding:5px;"><?php echo $pass['address']; ?></td>
                <td style="padding:5px;"><?php echo $pass['cost']; ?></td>
                <td style="padding:5px;"><?php echo $pass['date']; ?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
