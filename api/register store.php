<?php
include("connect.php");
$s=$_POST['name'];
$c=$_POST['email'];
$b=$_POST['mobile'];
$d=$_POST['password'];
$e=$_POST['cpa'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if($d==$e){
move_uploaded_file($tmp_name,"../uploads/$image");
$insert = mysqli_query($connect,"INSERT INTO user2(name,email,mobile,password,photo,role,status,votes) VALUES ('$s','$c','$b','$d','$image','$role',0,0)");
if($insert){
  echo ' 
  <script>
    alert("Registration sucessfull!");
  window.location ="../"; 
  </script>
  ';
}
else{
  echo ' 
  <script>
    alert("Some error occured!");
  window.location ="../routes/register.html"; 
  </script>
  ';
}
}
else{
    echo ' 
    <script>
      alert("Password and confirm password do not match!");
    window.location ="../routes/register.html"; 
    </script>
    ';
  
    
}

?>