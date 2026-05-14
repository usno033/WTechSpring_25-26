<?php
session_start();
include("../Model/db.php");

$obj = new db();
$conn = $obj->connection();

$name = $email = $website = $comment = $password = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $comment = $_POST["comment"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];

    if(strlen($name) < 5){
        echo "Name must be at least 5 characters!<br>";
    }
    elseif(!preg_match("/^[^ ]+@[^ ]+\.[a-z]{2,3}$/", $email)){
        echo "Invalid Email!<br>";
    }
    elseif(strlen($password) < 4){
        echo "Password must be at least 4 characters!<br>";
    }
    else{

        $obj->insertUser($conn, $name, $email, $password, $website, $comment, $gender);

        header("Location: Login.php");
    }
}
?>