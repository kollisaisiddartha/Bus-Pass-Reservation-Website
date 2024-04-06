<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #nav {
            background-color: #333;
            display: flex;
			width:688px;
            justify-content: center;
            padding: 10px 0;
			border-radius: 10px
        }
        
        #nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        #nav a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div id="nav">
        <a href="index.php"><b>HOME</b></a>
        <a href="about.php"><b>ABOUT</b></a>
        <a href="contact.php"><b>CONTACT</b></a>
        <a href="user/signup.php"><b>USER</b></a>
        <a href="admin/login.php"><b>ADMIN LOGIN</b></a>
    </div>
</body>
</html>
