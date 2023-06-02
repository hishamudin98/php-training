<?php

require_once "../config.php";

// Define variables and initialize with empty values
$id = "";

// Processing form data when form is submitted

$id = $_GET['id'];

try {
    $sql = "DELETE FROM users WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Records deleted successfully.";
        echo "<script>alert('Records deleted successfully.')
        window.location.href='../index.php';
    </script>";
        // header("location: ../index.php");
    } else {
        throw new Exception("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
    }
} catch (Exception $e) {
    echo $e->getMessage();
}