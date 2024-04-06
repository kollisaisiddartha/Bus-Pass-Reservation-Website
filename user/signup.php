<?php

    include("includes/connection.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $firstname = $_POST['fname'];
        $rno = $_POST['rno'];
        $gender = $_POST['gender'];
        $num = $_POST['number'];
        $address = $_POST['add'];
        $email = $_POST['email'];
        $password = $_POST['pass'];

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query = "insert into userinfo(fname,rno,gender,number,address,email,password) values('$firstname','$rno','$gender','$num','$address','$email','$password')";
            mysqli_query($con,$query);
            echo "<script type='text/javascript'> alert('Succesfully Register')</script>";

        }
        else{
            echo "<script type='text/javascript'> alert('Please enter some valide information')</script>";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #b3e0ff;
            margin: 0;
            padding: 0;
        }

        .login-forms {
            max-width: 380px;
            margin: 50px auto;
            padding: 30px;
            background: black;
            color: white;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-forms h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-forms label {
            display: block;
            margin-top: 15px;
        }

        .login-forms input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .login-forms input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-forms input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .login-forms a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        .login-forms a:hover {
            text-decoration: underline;
        }

        .login-forms p {
            margin-top: 20px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="login-forms">
        <br>
        <h1>Sign up</h1>
       
        <form method="POST">
            <label>Full Name :</label>
            <input type="text" name="fname" required>
            <label>Roll No :</label>
            <input type="text" name="rno" required>
            <label>Gender :</label>
            <input type="text" name="gender" required>
            <label>Contact :</label>
            <input type="number" name="number" required>
            <label>Address :</label>
            <input type="text" name="add" required>
            <label>Email :</label>
            <input type="email" name="email" required>
            <label>Password :</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="submit">
        </form>
        <a href="../index.php">Back Home</a>
        <p>Already have an account?  <a href="login.php">Login Here</a></p>
    </div>
</body>
</html>