<?php
require('includes/connection.php'); 

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $pass_id = $_GET['id'];
    
    $query = "SELECT * FROM pass WHERE id = $pass_id";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $pass = mysqli_fetch_assoc($result);
    } else {
        echo "Pass details not found.";
        exit;
    }
} else {
    echo "Pass ID is missing.";
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $pass_number = $_POST['pass_number'];
    $fname = $_POST['fname'];
    $number = $_POST['number'];
    $rno = $_POST['rno'];
    $category = $_POST['category'];
    $address = $_POST['address'];
    $cost = $_POST['cost'];
    
    $update_query = "UPDATE pass SET 
                        pass_number = '$pass_number',
                        fname = '$fname',
                        number = '$number',
                        rno = '$rno',
                        category = '$category',
                        address = '$address',
                        cost = '$cost'
                    WHERE id = $pass_id";
    if(mysqli_query($con, $update_query)) {
        header("Location: manage pass.php");
        exit;
    } else {
        echo "Failed to update pass details.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pass</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        
        h1 {
            margin-left: 470px;
            margin-top: 80px;
        }
        
        .edit_pass {
            margin-left: 200px;
            padding: 35px;
            border: 2px solid #007bff;
            width: 700px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .edit_pass label {
            margin-top: 10px;
        }
        
        .edit_pass input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        
        .edit_pass input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .edit_pass input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include_once('includes/sidebar.php');?>
    <?php include_once('includes/header.php');?>
    <h1>Edit Pass</h1>
    <form method="POST" class="edit_pass">
        <label for="pass_number">Pass Number:</label>
        <input type="text" id="pass_number" name="pass_number" value="<?php echo $pass['pass_number']; ?>" required>
        <br><br>
        <label for="fname">Full Name:</label>
        <input type="text" id="fname" name="fname" value="<?php echo $pass['fname']; ?>" required>
        <br><br>
        <label for="number">Contact Number:</label>
        <input type="text" id="number" name="number" value="<?php echo $pass['number']; ?>" required>
        <br><br>
        <label for="rno">Roll No:</label>
        <input type="text" id="rno" name="rno" value="<?php echo $pass['rno']; ?>" required>
        <br><br>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?php echo $pass['category']; ?>" required>
        <br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $pass['address']; ?>" required>
        <br><br>
        <label for="cost">Cost:</label>
        <input type="text" id="cost" name="cost" value="<?php echo $pass['cost']; ?>" required>
        <br><br>
        <input type="submit" value="Update Pass">
    </form>
</body>
</html>
