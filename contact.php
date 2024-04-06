<?php
   require('admin/includes/connection.php');
  if(!empty($_POST['submit'])){
  $date =  date('Y-m-d H:i:s'); 
  // Contact
  $name = $_POST['name'];
  $email = $_POST['Email'];
  $rollno = $_POST['rollno'];
  $message= $_POST['message'];
  //insert page data
  mysqli_query($con,"insert into users(name,email,rollno,message,date)
   values('$name','$email','$rollno','$message','$date')");
  echo"<script>alert('Submitted successfully');</script>";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="asset/css/style.css">
    <title>Contact us</title>
    <style>
    .contact-form{
    width:380px;
    height: 400px;
    margin-left: 640px;
    color: white;
    background: black;
    border-radius: 20px;
    padding: 30px;
    margin-top:15px;
}
input[type=Email]{
    width: 100%;
    font-size: 25px;
}
textarea{
    width:100%;
    font-size:25px;
}
input[type=subject]{
    width:100%;
    font-size:25px;
}
body{
    background-color:#b3e0ff;
}
input[type=submit]{
    margin-left: 17px
}
header, footer {
            background-color: #001f33;
            color: white;
            padding: 20px;
        }
        </style>
</head>
<body>
<header>

<?php include('partials/header.php') ; ?>

</header>
     <main>
         <div class="contact">
    <h1 style="color: black;">Contact Us</h1>
      </div>
     <form class="contact-form" action="" method="POST">
     <label>Username</label>
			<input type="text" name="name"><br><br>
			<label>Email</label>
			<input type="Email" name="Email"><br><br>
            <label>Roll No</label>
			<input type="text" name="rollno"><br><br>
            <label>Complaints/Feedback</label>
         <textarea name="message"></textarea><br><br>
        <input type="submit" name="submit" value="Submit">
</form>
       </main>
       <footer>
<?php include('partials/footer.php'); ?>
</footer>
</body>
</html>