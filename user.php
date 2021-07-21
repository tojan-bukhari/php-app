
<?php
session_start(); 
   include("connection.php");
   include("functions.php");

   // $user_data = check_login($con);

   $id= $_SESSION['user_id'];
   $result = mysqli_query($con,"SELECT * FROM users WHERE id = '$id' ");
   $count  = mysqli_num_rows($result);
   if($count==0) {
      echo "there must be a problem";
   }else{
      $user_data = mysqli_fetch_assoc($result);
      // print_r($user_data);
   }
?>

<!DOCTYPE html>
<html>
<head>
<title>user</title>
<link rel="stylesheet" href="login.css">
</head>
<body>
<div class="profile_box">
  <p>hello <?php echo $user_data['user_name']?></p>
  <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" width="50px" hight="50px" alt="Italian Trulli">
  <button class="btn_edit"><a href="edit.php?id=<?php echo $user_data['id']?>">EDIT PROFILE</a></button>
  
</div>

</body>
</html>