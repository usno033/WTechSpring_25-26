<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: Login.php");
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<body>

<h2>Dashboard</h2>

Name: <?php echo $user['name']; ?><br>
Email: <?php echo $user['email']; ?><br>
Website: <?php echo $user['website']; ?><br>
Comment: <?php echo $user['comment']; ?><br>
Gender: <?php echo $user['gender']; ?><br>

</body>
</html>