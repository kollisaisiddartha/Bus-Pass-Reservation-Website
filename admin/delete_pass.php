<?php
require('includes/connection.php');

// Check if pass ID is provided
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $pass_id = $_GET['id'];

    // Delete pass details from the database
    $delete_query = "DELETE FROM pass WHERE id = $pass_id";
    if(mysqli_query($con, $delete_query)) {
        header("Location: manage pass.php"); // Redirect to manage pass page
        exit;
    } else {
        echo "Failed to delete pass details.";
    }
} else {
    echo "Pass ID is missing.";
    exit;
}
?>
