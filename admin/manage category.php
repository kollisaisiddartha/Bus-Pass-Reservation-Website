<?php
require('includes/connection.php'); 

$q = "SELECT * FROM category";
$r = mysqli_query($con, $q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Category</title>
</head>
<body>
<?php include_once('includes/sidebar.php');?>
<?php include_once('includes/header.php');?>
<main>
    <h1 class="page-header">Manage Category</h1><br><br>
    <table style="width:100%" border="3px;">
        <thead>
            <th style="padding:3px;">Id</th>
            <th>Category Name</th>
            <th>Starts From</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php 
        $count = 1; 
        while($category = mysqli_fetch_assoc($r)) { ?>
            <tr>
                <td style="padding:3px;"><?php echo $count; ?></td>
                <td style="padding:3px;"><?php echo $category['name']; ?></td>
                <td style="padding:3px;"><?php echo $category['from_dest']; ?></td> 
                <td style="padding:3px;">
                    <a href="edit_category.php?id=<?php echo $category['id']; ?>">Edit</a> |
                    <a href="delete_category.php?id=<?php echo $category['id']; ?>" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                </td>
            </tr>
        <?php $count++; } ?>
        </tbody>
    </table>
</main>
</body>
</html>
