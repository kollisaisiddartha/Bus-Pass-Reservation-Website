<?php
require('includes/connection.php');
if(!empty($_POST['submit'])){
  $name = $_POST['name'];
  $from_dest = $_POST['from_dest'];
  //insert  data
  mysqli_query($con,"insert into category(name,from_dest) values('$name','$from_dest')");
  echo"<script>alert('Added successfully');</script>";
}
?>    

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Add Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Container styling */
        .container {
            margin-left: 200px;
            margin-top: 20px;
        }

        /* Page header styling */
        .category {
            margin-left: 200px;
            margin-top: 25px;
            color: #333;
        }

        /* Form styling */
        .add_cat {
            margin-left: 200px;
            border: 2px solid #007bff;
            border-radius: 10px; /* Rounded edges */
            width: 450px; /* Increased width */
            padding: 25px;
        }

        /* Input styling */
        input[type="text"],
        input[type="submit"] {
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            width: calc(100% - 22px);
        }

        /* Button styling */
        input[type="submit"] {
            margin-top: 20px;
            width: 100px;
            height: 40px;
            background-color: #00008f;
            color: white;
            border-radius: 3px;
            font-size: medium;
            align-items: center;
        }
    </style>
</style>
</head>
<body>
      <?php include_once('includes/sidebar.php');?>
      <?php include_once('includes/header.php');?>
        <main>
      <h1 class="category">Add Category</h1><br><br>
      <div class="add_cat">
      <form action="" method="post"> 
      <div class="form-group"> <label>Category Name:</label><br>
       <input type="text" name="name" value="" >
     </div>
     <br>
      <div>
      <form action="" method="post"> 
      <div class="form-group"> <label>Starts From:</label><br>
       <input type="text" name="from_dest" value="" >
     </div>
     <p><input type="submit"  name="submit"  value="Add" style="margin-left:35px;"></p>
</div>
 </form>                      
  </div>
</main>  
</body>
</html>
