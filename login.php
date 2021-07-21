<?php 
session_start();

    include("connection.php");
    include("functions.php");

    $message="";
    if(count($_POST)>0) {
        $result = mysqli_query($con,"SELECT * FROM users WHERE email ='" . $_POST["email"] . "' and pass = '". $_POST["pass"]."'");
        $count  = mysqli_num_rows($result);
        if($count==0) {
            $message = "Invalid Username or Password!";
        } else {
            $message = "You are successfully authenticated!";
            $user_data = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user_data['id'];
            // print_r($user_data);
              if($user_data['role'] === 'user')
              {
                header('location: user.php');
                die;
              }else if($user_data['role'] === 'admin'){
                header('location: admin.php');
                die;
              }
        }
    }



?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="login.css">
</head>
<body>
<div>
    <form name="frmUser" method="post" >
	<div class="message"><?php if($message!="") { echo $message; } ?></div>
		<table  style="margin: 150px" cellpadding="10" cellspacing="1" width="500" class="tblLogin">
			<tr class="tableheader">
			<td  colspan="2">Enter Login Details</td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="email" placeholder="User Email" class="login-input"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="password" name="pass" placeholder="Password" class="login-input"></td>
			</tr>
			<tr class="tableheader">
			<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
			</tr>
		</table>
</form>

</div>

</body>
</html>