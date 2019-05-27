<?php
$conn = mysqli_connect("localhost","root","root","userdb");
if(mysqli_connect_errno()){
 echo 'Failed to connect to MySQL', mysqli_connect_errno();
}

$id=$_GET['id'];
$result = mysqli_query($conn,"DELETE FROM medrep WHERE id=$id")
or die(mysqli_error($conn));
header('location:medrep.php');


?>