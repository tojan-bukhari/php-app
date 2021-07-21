
<?php
session_start(); 
   include("connection.php");
   include("functions.php");

   // $user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
<title>admin</title>
</head>
<body>
<table style="width:100%, text-align:cenetr">
  <tr>
    <th>id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php
  $sql="SELECT id,user_name,email FROM users";
  $edit="edit";
  $delete="delete";
  $result=$con-> query($sql);
  if($result-> num_rows >0){
     while($row= $result -> fetch_assoc()){
        echo "<tr><td>".$row["id"]."</td>";
        echo "<td>".$row["user_name"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo  '<td><a href="edit.php?id='. $row["id"].'">',"Edit",'</a></td>';
        echo  '<td><a href="delete.php?id='. $row["id"].'">',"Delete",'</a></td>';
     }
     echo "</table>";
   }else{
      echo "0 result";
   }
   die;
  ?>
</table>
</body>
</html>

