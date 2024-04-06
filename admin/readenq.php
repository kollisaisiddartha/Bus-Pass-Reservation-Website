<?php
require('includes/connection.php'); 

$q = "SELECT * FROM users";
$r = mysqli_query($con, $q);
?>
<!DOCTYPE html>
<html !DOCTYPE>
<head>
    <title>Read Enquiry</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include_once('includes/sidebar.php');?>
    <?php include_once('includes/header.php');?>
        
    <main>
        <h1 class="page-header">Read Enquiry</h1><br><br>
        <table style="width:100%" border="3px">
            <thead>
                <th style="padding:3px;">Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Roll No</th>
                <th>Message</th>
                <th>Creation Date</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php 
                $count = 1; 
                while($users = mysqli_fetch_assoc($r)) { ?>
                <tr>
                    <td style="padding:3px;"> <?php echo $count; ?></td>
                    <td style="padding:3px;"> <?php echo $users['name']; ?> </td> 
                    <td style="padding:3px;"> <?php echo $users['email']; ?> </td>
                    <td style="padding:3px;"> <?php echo $users['rollno']; ?> </td>
                    <td style="padding:3px;"> <?php echo $users['message']; ?> </td>
                    <td style="padding:3px;"> <?php echo $users['date']; ?> </td>
                    <td style="padding:3px;"> 
                        <a href="remove_enq.php?id=<?php echo $users['id']; ?>">Read</a>
                    </td>
                </tr>
                <?php $count++; } ?>
            </tbody>
        </table>
    </main>
</body>
</html>
