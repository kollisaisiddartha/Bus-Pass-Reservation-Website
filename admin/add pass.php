<?php
   require('includes/connection.php');
  if(!empty($_POST['submit'])){
  $date =  date('Y-m-d H:i:s'); 
  $expiry_date = date('Y-m-d', strtotime($date . ' + 1 day')); 

  $pass = $_POST['pass_number'];
  $fname = $_POST['fname'];
  $number = $_POST['number'];
  $rno = $_POST['rno'];
  $category = $_POST['category'];
  $address= $_POST['address'];
  $cost = $_POST['cost'];
  //insert  data
  mysqli_query($con, "insert into pass(pass_number,fname,number,rno,category,address,cost,date,expiry_date) values('$pass','$fname','$number','$rno','$category','$address','$cost','$date','$expiry_date')");

  echo"<script>alert('Added successfully');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pass</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Container styling */
        .container {
            margin: 50px auto;
            width: 750px;
            text-align: center;
        }

        /* Page header styling */
        .page-header {
            color: #333;
            margin-top: 70px;
        }

        /* Form styling */
        .contact-form {
            margin: 0 auto;
            border: 2px solid #007bff; /* Border color */
            border-radius: 10px;
            padding: 30px;
            background-color: #fff; /* Background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Input styling */
        input[type="text"],
        input[type="number"] {
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc; /* Border color */
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            width: calc(100% - 22px);
        }

        /* Button styling */
        input[type="submit"] {
            padding: 10px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff; /* Button color */
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Hover color */
        }
    </style>
</head>
<body>
    <?php include_once('includes/sidebar.php');?>
    <?php include_once('includes/header.php');?>

    <div class="container">
        <h1 class="page-header">Add Pass</h1>
        <form class="contact-form" action="" method="post">
    <div class="form_div">
            <label for="pass_number"><b>Pass Number:</b></label>
            <input type="number" id="pass_number" name="pass_number" required><br><br>
    </div>
    <div class="form_div">
            <label for="fname"><b>Name:</b></label>
            <input type="text" id="fname" name="fname" required><br><br>
            </div>            

    <div class="form_div">
            <label for="number"><b>Phone Number:</b></label>
            <input type="number" id="number" name="number" required><br><br>
            </div>            

    <div class="form_div">        
            <label for="rno"><b>Roll No:</b></label>
            <input type="text" id="rno" name="rno" required><br><br>
            </div>            

    <div class="form_div">            
            <label for="category"><b>Category:</b></label>
            <input type="text" id="category" name="category" required><br><br>
            </div>            

    <div class="form_div">    
            <label for="address"><b>Address:</b></label>
            <input type="text" id="address" name="address" required><br><br>
    </div>            

    <div class="form_div"> 
            <label for="cost"><b>Cost:</b></label>
            <input type="number" id="cost" name="cost" required><br><br>
    </div>            
    <label for="expiry_date"><b>Expiry Date:</b></label>
            <input type="text" id="expiry_date" name="expiry_date" value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" disabled><br><br>
            <input type="submit" name="submit" value="Add">
        </form>
    </div>
</body>
</html>
