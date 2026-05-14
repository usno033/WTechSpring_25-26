<?php include "../Controller/RegistrationController.php"; ?>

<!DOCTYPE html>
<html>
<body>

<h2>Registration</h2>

<form method="post">

<table>
<tr>
<td>Name:</td>
<td><input type="text" name="name"></td>
</tr>

<tr>
<td>Email:</td>
<td><input type="text" name="email"></td>
</tr>

<tr>
<td>Password:</td>
<td><input type="password" name="password"></td>
</tr>

<tr>
<td>Website:</td>
<td><input type="text" name="website"></td>
</tr>

<tr>
<td>Comment:</td>
<td><textarea name="comment"></textarea></td>
</tr>

<tr>
<td>Gender:</td>
<td>
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
</td>
</tr>

<tr>
<td></td>
<td><input type="submit" value="Register"></td>
</tr>
</table>

</form>

</body>
</html>