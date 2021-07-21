<?php
session_start(); 
   include("connection.php");
   include("functions.php");

   $user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
<title>home</title>
</head>
<body>

<h1>home page</h1>
<a href="logout.php">Logout</a>
<br>
Hello user/admin
</body>
</html>