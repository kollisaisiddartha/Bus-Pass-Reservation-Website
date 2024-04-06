<?php
    session_start();

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'buspassms';
    
    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['pass'];
    
        if (!empty($email) && !empty($password) && !is_numeric($email)) {
            $query = "SELECT * FROM userinfo WHERE email ='$email' LIMIT 1";
            $result = mysqli_query($con, $query);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
    
                if ($user_data['password'] == $password) {
                    // Set session variables
                    $_SESSION['rno'] = $user_data['rno'];
                    header("Location: dashboard.php");
                    exit;
                }
            }
            echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Please enter both email and password')</script>";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/style.css">
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

        .login-forms input[type="email"],
        .login-forms input[type="password"] {
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
        <h1>Login</h1>
        <form method="POST">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="pass" required>
            <input type="submit" value="Submit">
            <a href="../index.php">Back Home</a>
        </form>
        <p>Not have an account? <a href="signup.php">Signup Here</a></p>
    </div>
</body>
</html>
