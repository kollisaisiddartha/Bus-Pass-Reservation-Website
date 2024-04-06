<?php
require('includes/connection.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
</head>
<body>
<?php include_once('includes/sidebar.php');?>
<?php include_once('includes/header.php');?>
    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                    <?php
                     $query1=mysqli_query($con,"SELECT * FROM category");
                     $totalcat=mysqli_num_rows($query1);
                    ?>
                    <h1><?php echo $totalcat; ?></h1>
                   <a href="total category.php"><span>Total Categories</span></a>
    </div>
    <!--total categories-->
           <div>
           <i class="far fa-folder"></i>
         </div>
        </div>
            <div class="card-single">
                <div>
                <?php
                     $query2=mysqli_query($con,"SELECT * FROM pass");
                     $totalpass=mysqli_num_rows($query2);
                    ?>
                    <h1><?php echo $totalpass; ?></h1>
                   <a href="total-pass.php"><span>Total Pass</span></a>
     </div>
     <div>
           <i class="far fa-id-card"></i>
         </div>
      </div>
            <div class="card-single">
                <div>
                <?php
                      $query5=mysqli_query($con,"SELECT * FROM pass WHERE date(date)=CURDATE()-1;");
                      $totalyes=mysqli_num_rows($query5);
                    ?>
                    <h1><?php echo $totalyes; ?></h1>
                    <a href="#"><span>Pass created yesterday</span></a>
                    <!--passes generated yesterday-->
    </div>
    <div>
           <i class="far fa-id-card"></i>
         </div>
</div>  
</main>  
</body>
</html>