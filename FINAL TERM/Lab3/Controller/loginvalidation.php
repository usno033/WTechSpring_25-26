<?php
session_start();
include("../Model/db.php");

$obj = new db();
$conn = $obj->connection();

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $obj->loginUser($conn, $email, $password);

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;

        header("Location: dashboard.php");

    } else {
        echo "Invalid Email or Password!";
    }
}
?>