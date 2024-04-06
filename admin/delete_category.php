<?php
require('includes/connection.php');

// Check if category ID is provided
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $category_id = $_GET['id'];

    // Delete category from the database
    $delete_query = "DELETE FROM category WHERE id = $category_id";
    if(mysqli_query($con, $delete_query)) {
        header("Location: manage category.php"); 
        exit;
    } else {
        echo "Failed to delete category.";
    }
} else {
    echo "Category ID is missing.";
    exit;
}
?>
