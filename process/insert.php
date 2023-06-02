<?php
require_once "../config.php";

// Define variables and initialize with empty values
$name = $email = $password = $tahun = $fakulti = $dob = "";

// Processing form data when form is submitted

$name = $_POST['username'];
$email =  $_POST['email'];
$password = md5($_POST['password']);
$tahun = $_POST['tahun'];
$fakulti = $_POST['fakulti'];
$dob = $_POST['dob'];

try {
    // Prepare an insert statement
    $sql = "INSERT INTO users (username, email, password, tahun, fakulti, dob) VALUES ('$name', '$email', '$password' , '$tahun', '$fakulti', '$dob')";

    if (mysqli_query($conn, $sql)) {
        echo "Records inserted successfully.";
        echo "<script>alert('Records inserted successfully.')
        window.location.href='../index.php';
    </script>";
        // header("location: ../index.php");
    } else {
        throw new Exception("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
