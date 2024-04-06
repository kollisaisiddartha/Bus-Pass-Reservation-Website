<?php
require('includes/connection.php'); 

// Check if category ID is provided
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $category_id = $_GET['id'];
    
    // Fetch category details from the database
    $query = "SELECT * FROM category WHERE id = $category_id";
    $result = mysqli_query($con, $query);
    
    // Check if category exists
    if(mysqli_num_rows($result) > 0) {
        $category = mysqli_fetch_assoc($result);
    } else {
        echo "Category not found.";
        exit;
    }
} else {
    echo "Category ID is missing.";
    exit;
}

// Check if form is submitted for updating category
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_name = $_POST['new_name'];
    $new_dest = $_POST['new_dest'];


    
    // Update category name in the database
    $update_query = "UPDATE category SET name = '$new_name', from_dest = '$new_dest' WHERE id = $category_id";
    if(mysqli_query($con, $update_query)) {
        echo "<script>window.location.href = 'manage category.php';</script>"; 
        exit;
    } else {
        echo "Failed to update category.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        
        .container {
            margin: 100px auto;
            width: 750px; 
            text-align: center;
        }
        
        h1 {
            color: #333;
            margin-top: 2px;
        }
        
        .edit_cat {
            border: 2px solid #007bff;
            width: 680px; 
            padding: 60px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        
        label {
            font-weight: bold;
            color: #555;
            margin-top: 10px;
            display: block;
            text-align: left;
        }
        
        input[type="text"],
        input[type="submit"] {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            width: calc(100% - 22px);
        }
        
        input[type="submit"] {
            width: 150px;
            background-color: #007bff;
            border: none;
            color: #fff;
            cursor: pointer;
            margin-top: 20px;
        }
        
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include_once('includes/sidebar.php');?>
    <?php include_once('includes/header.php');?>
    <h1>Edit Category</h1>
    <div class="container">
        <form method="POST" class="edit_cat">
            <label for="new_name">New Category Name:</label>
            <input type="text" id="new_name" name="new_name" value="<?php echo $category['name']; ?>" required>
            <br><br>
            <label for="new_dest">New Source Name:</label>
            <input type="text" id="new_dest" name="new_dest" value="<?php echo $category['from_dest']; ?>" required>
            <br><br>
            <input type="submit" value="Update Category">
        </form>
    </div>
</body>
</html>
