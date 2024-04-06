<?php
require('includes/connection.php'); 

$q = "SELECT * FROM pass";
$r = mysqli_query($con, $q);

?>
<html !DOCTYPE>
<head>
    <title>Manage Pass</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include_once('includes/sidebar.php');?>
    <?php include_once('includes/header.php');?>
    
    <main>
        <h1 class="page-header">Manage Pass</h1><br><br>
        <table style="width:100%" border="3px">
            <thead>
                <th style="padding:3px;">Id</th>
                <th>Pass Number</th>
                <th>Full Name</th>
                <th>Contact Number</th>
                <th>Roll No</th>
                <th>Category</th>
                <th>Address</th>
                <th>Cost</th>
                <th>Creation Date</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                $count = 1; 
                while($pass = mysqli_fetch_assoc($r)) { ?>
                    <tr>
                        <td style="padding:3px;"> <?php echo $count; ?></td>
                        <td style="padding:3px;"> <?php echo $pass['pass_number']; ?> </td>
                        <td style="padding:3px;"> <?php echo $pass['fname']; ?> </td> 
                        <td style="padding:3px;"> <?php echo $pass['number']; ?> </td>
                        <td style="padding:3px;"> <?php echo $pass['rno']; ?> </td>
                        <td style="padding:3px;"> <?php echo $pass['category']; ?> </td>
                        <td style="padding:3px;"> <?php echo $pass['address']; ?> </td>
                        <td style="padding:3px;"> <?php echo $pass['cost']; ?> </td>
                        <td style="padding:3px;"> <?php echo $pass['date']; ?> </td>
                        <td style="padding:3px;"> 
                            <a href="edit_pass.php?id=<?php echo $pass['id']; ?>">Edit</a> | 
                            <a href="delete_pass.php?id=<?php echo $pass['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php $count++; } ?>
                </tbody>
            </main>
        </body>
        </html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require('includes/connection.php'); 

$Sql = "SELECT * FROM pass";
$Result = mysqli_query($con, $Sql);

while ($row = mysqli_fetch_assoc($Result)){
	$expiry_date = $row['expiry_date'];
	$current_date = $row['date'];
}

if ($current_date > $expiry_date) {

    $mail = new PHPMailer(true);
    $userSql = "SELECT email FROM userinfo";
    $userResult = mysqli_query($con, $userSql);

    try {
       
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'saisiddu8888@gmail.com'; 
        $mail->Password = 'iozsmbvkbwtijysl'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587; 

        // Recipients
        $mail->setFrom('saisiddu8888@gmail.com', 'Admin');
        while($userRow = mysqli_fetch_assoc($userResult)) {
            $to = $userRow['email'];
            $mail->addAddress($to);   

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your pass has expired';
            $mail->Body = 'Dear user,<br>Your pass has expired. Please renew it as soon as possible.';
            $mail->AltBody = 'Dear user,\nYour pass has expired. Please renew it as soon as possible.';
            $mail->send();
            echo "Email sent to: $to<br>";
            $mail->clearAddresses();    
        }

        echo 'Email sent successfully';

        // Delete user's data from the database
        mysqli_query($con, "DELETE FROM pass WHERE expiry_date < '$current_date'");
        echo 'User data deleted successfully';
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
