<?php 
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD']== "POST")
    {
        // somthing is posted 
        $user_name =$_POST["user_name"];
        $email = $_POST["email"];
        $pass= $_POST["pass"];
        $role=$_POST["choose"];

        if(!empty ($user_name) && !empty($email) && !empty($pass) && !empty($role) && !is_numeric($user_name))
        {
            // save to data pase 
            $query = "insert into users (user_name,email,pass,role) values ('$user_name', '$email', '$pass', '$role')";

            mysqli_query($con,$query);

           header("location: login.php ");
           die;
        }else
        {
            echo "please enter some valid information";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>Signup</title>
<link rel="stylesheet" href="login.css">
</head>
<body>
<div>
    <form name="frmUser" method="post" >
		<table  style="margin: 150px" cellpadding="10" cellspacing="1" width="500" class="tblLogin">
			<tr class="tableheader">
			<td  colspan="2">Enter Login Details</td>
			</tr>
            <tr class="tablerow">
			<td>
			<input type="text" name="user_name" placeholder="User Name" class="login-input"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="email" placeholder="User Email" class="login-input"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="password" name="pass" placeholder="Password" class="login-input"></td>
			</tr>
            <tr class="tablerow">
			<td>
            <select name="choose" >
            <option value="admin">Admin</option>
            <option value="user">User</option>
            </select></td>
			</tr>
			<tr class="tableheader">
			<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
			</tr>
            <tr class="tableheader">
			<td colspan="2"><a href="login.php"> click to login</a></td>
			</tr>
		</table>
</div>

</body>
</html>

