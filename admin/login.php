<?php
require('includes/connection.php'); 
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's login</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/style.css">
    <style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #b3e0ff;
}

.admin_head {
    text-align: center;
    margin-top: 50px;
    color: #333;
}

.forms {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: black;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.forms form {
    text-align: center;
}

.forms label {
    display: block;
    margin-top: 15px;
    color: white;
}

.forms input[type="text"],
.forms input[type="password"],
.forms input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

.forms input[type="submit"] {
    background-color: #007bff;
    border: none;
    color: #fff;
    cursor: pointer;
}

.forms input[type="submit"]:hover {
    background-color: #0056b3;
}

.forms a {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #007bff;
    text-decoration: none;
}

.forms a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <h1 class="admin_head">Anits Bus Pass Management- Admin's Login</h1>
    <div class="forms">
        <center>
    <form  method="post"  action="logincheck.php" >
			<label>Username</label>
			<input type="text" name="name"><br><br>
			<label>Password</label>
			<input type="password" name="password"><br><br>
                <input type="submit" value="Login" name="login"><br><br>
            <i class="fa fa-home"></i>
            <a href="../index.php">Back Home</a>
		</form>
</center>
</div>
</body>
</html>