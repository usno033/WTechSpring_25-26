<?php
class db {

    function connection(){
        $conn = new mysqli("localhost", "root", "", "section_c");

        if($conn->connect_error){
            die("Connection Failed: ".$conn->connect_error);
        }

        return $conn;
    }

    function insertUser($conn, $name, $email, $password, $website, $comment, $gender){
        $sql = "INSERT INTO users(name,email,password,website,comment,gender)
                VALUES('$name','$email','$password','$website','$comment','$gender')";
        return $conn->query($sql);
    }

    function loginUser($conn, $email, $password){
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        return $conn->query($sql);
    }
}
?>