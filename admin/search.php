<?php
require('includes/connection.php'); 

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Add Category</title>
    <style>
        /* Form styling */
        form {
            margin-top: 20px;
            text-align: center;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px; /* Rounded borders */
            box-sizing: border-box;
            font-size: 16px;
            width: 300px;
            margin-right: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 20px; /* Rounded borders */
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    </head>
<body>
      <?php include_once('includes/sidebar.php');?>
      <?php include_once('includes/header.php');?>
        <main>
      <form action="" method="post"> 
          <input type= "text" name="search" placeholder="Search by Pass Number">
          <input type="submit" value="Search">
 </form><br><br>      
      <?php
if(isset($_POST['search'])) {
    $search = $_POST['search'];
    $q ="SELECT * from pass where pass_number like '$search%'|| number like '$search%'";
    $r = mysqli_query($con, $q);
    ?>
    <h2 align="center">Result against "<?php echo $search;?>" keyword </h2><br>
  
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
					</tr>
					<?php $count++; }} ?>
                    </tbody>
                     </main>
	</body>
</html>    