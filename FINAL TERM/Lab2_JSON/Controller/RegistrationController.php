<?php
session_start();

$name = "";
$email = "";
$website = "";
$comment = "";
$password = "";
$gender = "";

$nameErr = "";
$emailErr = "";
$websiteErr = "";
$commentErr = "";
$passwordErr = "";
$genderErr = "";

$datafile = "../data.json";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$website = isset($_POST["website"]) ? $_POST["website"] : "";
$comment = isset($_POST["comment"]) ? $_POST["comment"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$gender = isset($_POST["gender"]) ? $_POST["gender"] : "";

    if (!empty($name) && strlen($name) >= 5)
    {
        $_SESSION["name"] = $name;
        setcookie("name", $name, time() + 3600, "/");
    }
    else
    {
        $nameErr = "Name must be at least 5 characters!";
    }

    if (!empty($email) && preg_match("/^[^ ]+@[^ ]+\.[a-z]{2,3}$/", $email))
    {
        $_SESSION["email"] = $email;
        setcookie("email", $email, time() + 3600, "/");
    }
    else
    {
        $emailErr = "Invalid Email Format!";
    }

    if (!empty($website) && preg_match("/\b(https?:\/\/)?[a-z0-9.-]+\.[a-z]{2,}\b/i", $website))
    {
        $_SESSION["website"] = $website;
        setcookie("website", $website, time() + 3600, "/");
    }
    else
    {
        $websiteErr = "Invalid Website Format!";
    }

    if (!empty($comment))
    {
        $_SESSION["comment"] = $comment;
        setcookie("comment", $comment, time() + 3600, "/");
    }
    else
    {
        $commentErr = "Comment cannot be empty!";
    }

    if (!empty($password) && strlen($password) >= 4)
    {
        $_SESSION["password"] = $password;
        setcookie("password", $password, time() + 3600, "/");
    }
    else
    {
        $passwordErr = "Password must be minimum 4 characters!";
    }

    if (!empty($gender))
    {
        $_SESSION["gender"] = $gender;
        setcookie("gender", $gender, time() + 3600, "/");
    }
    else
    {
        $genderErr = "Please Select Gender!";
    }

    if (
        empty($nameErr) &&
        empty($emailErr) &&
        empty($websiteErr) &&
        empty($commentErr) &&
        empty($passwordErr) &&
        empty($genderErr)
    )
    {
        $formdata = array(
            "name" => $name,
            "email" => $email,
            "website" => $website,
            "comment" => $comment,
            "password" => $password,
            "gender" => $gender
        );

        if (file_exists($datafile))
        {
            $existdata = file_get_contents($datafile);
            $tempdata = json_decode($existdata, true);
        }
        else
        {
            $tempdata = array();
        }

        if (!is_array($tempdata))
        {
            $tempdata = array();
        }

        $tempdata[] = $formdata;

        $jsondata = json_encode($tempdata, JSON_PRETTY_PRINT);

        if (file_put_contents($datafile, $jsondata))
        {
            echo "Form Submitted Successfully!<br>";
            echo "Data Saved<br>";
            echo "Welcome Back";
        }
        else
        {
            echo "Please Try Again";
        }

        $data = file_get_contents($datafile);
        $mydata = json_decode($data, true);
    }
}
?>