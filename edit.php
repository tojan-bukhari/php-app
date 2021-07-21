
<?php
include("connection.php");
include("functions.php");

$id = $_GET['id']; // get id through query string

$result= mysqli_query($con,"select * from users where id='$id'"); // select query
$data= mysqli_fetch_assoc($result);
print_r($data);

if(isset($_POST['update'])){
    $name=$_POST["name"];
    $email=$_POST['email'];

$edit = mysqli_query($con,"update users set user_name='$name', email='$email'  where id = '$id'"); // edit query
if($edit)
{
    mysqli_close($con); // Close connection

    if($data['role']==="user"){
     header("location:user.php"); 
    }else if($data['role']==="admin"){
     header("location:admin.php"); 
    exit;   
    }
    
}
else
{
    echo "Error editing users"; // display error message if not delete
}    	
}
?>

<!DOCTYPE html>
<html>
<head>
<title>edit</title>
</head>
<body>
<h3>Update Data</h3>
<form method="POST">
  <input type="text" name="name" value="<?php echo $data['user_name'] ?>" placeholder="Enter Name" Required>
  <input type="text" name="email" value="<?php echo $data['email'] ?>" placeholder="Enter Email" Required>
  <input type="submit" name="update" value="Update">
</form>
<br>
</body>
</html>