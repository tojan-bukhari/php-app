Delete
<?php

include("connection.php");
include("functions.php");

$id = $_GET['id']; // get id through query string

$del = mysqli_query($con,"delete from users where id = '$id'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    echo "this is id '$id'";
    header("location:admin.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>