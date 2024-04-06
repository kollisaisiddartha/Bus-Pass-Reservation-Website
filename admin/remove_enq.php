<?php
require('includes/connection.php');

// Check if ID is provided
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Delete row from the database
    $delete_query = "DELETE FROM users WHERE id = $id";
    if(mysqli_query($con, $delete_query)) {
        header("Location: readenq.php"); 
        exit;
    } else {
        echo "Failed to delete row.";
    }
} else {
    echo "ID is missing.";
    exit;
}
?>
