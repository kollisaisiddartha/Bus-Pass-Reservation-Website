<?php

session_start();

if (!isset($_SESSION['rno'])) {
    header("Location: login.php");
    exit;
}

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'buspassms';

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment_method = $_POST['payment_method'];
    $additional_details = $_POST['additional_details'];
    $rno = $_SESSION['rno'];

    if ($payment_method === "UPI") {
        $query = "INSERT INTO payments (rno, payment_method, upi_id, additional_details) VALUES ('$rno', '$payment_method', '{$_POST['upi_id']}', '$additional_details')";
    } else {
        $query = "INSERT INTO payments (rno, payment_method, card_number, cvv, expiry_datee, additional_details) VALUES ('$rno', '$payment_method', '{$_POST['card_number']}', '{$_POST['cvv']}', '{$_POST['expiry_datee']}', '$additional_details')";
    }

    if (mysqli_query($con, $query)) {
        // Payment details stored successfully
        echo '<script>alert("Successfully applied for bus pass.");</script>';
        echo '<script>window.location.href = "dashboard.php";</script>'; // Redirect to another page
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        form {
            margin-left: 100px;
            border: 2px solid black;
            width: 500px;
            padding: 20px;
            border-radius: 15px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        select,
        input[type="text"],
        input[type="number"],
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 12px;
            margin-top: 7px;
            width: calc(100% - 22px);
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 12px;
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
    <br><br><br>
    <h2 style="margin-left:100px; padding:10px;">Payment Page</h2>
    <form method="POST">
        <label for="payment_method">Payment Method:</label>
        <select id="payment_method" name="payment_method" onchange="showDetails()" required>
            <option value="" disabled selected>Select Payment Method</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
            <option value="upi">UPI</option>
        </select>
        <div id="payment_details" style="display: none;">
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number">
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv">
            <label for="expiry_datee">Expiry Date:</label>
            <input type="text" id="expiry_datee" name="expiry_datee">
        </div>
        <div id="upi_details" style="display: none;">
            <label for="upi_id">UPI ID:</label>
            <input type="text" id="upi_id" name="upi_id">
        </div>
        <label for="additional_details">Additional Details:</label>
        <textarea id="additional_details" name="additional_details" rows="4" cols="50"></textarea>
        <input type="submit" value="Submit Payment">
    </form>

    <script>
    function showDetails() {
        var paymentMethod = document.getElementById("payment_method").value;
        var cardDetails = document.getElementById("payment_details");
        var upiDetails = document.getElementById("upi_details");

        if (paymentMethod.toLowerCase() === "upi") {
            cardDetails.style.display = "none";
            upiDetails.style.display = "block";
        } else {
            cardDetails.style.display = "block";
            upiDetails.style.display = "none";
        }
    }
</script>

</body>
</html>
