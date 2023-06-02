<?php

require_once "../config.php";

// Define variables and initialize with empty values
$name = $email = $password = $tahun = $fakulti = "";

// Processing form data when form is submitted
// var_dump($_POST);

$id = $_POST['id'];
$name = $_POST['username'];
$email =  $_POST['email'];
$password = md5($_POST['password']);
$tahun = $_POST['tahun'];
$fakulti = $_POST['fakulti'];

try {
    $sql = "UPDATE users SET username='$name', email='$email', password='$password', tahun='$tahun', fakulti='$fakulti' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Records updated successfully.')
            window.location.href='../index.php';
    </script>";
        // header("location: ../index.php");
    } else {
        throw new Exception("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
