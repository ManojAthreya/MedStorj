<?php
   $conn = mysqli_connect("localhost","root","","userdb");
   if(mysqli_connect_errno()){
    echo 'Failed to connect to MySQL', mysqli_connect_errno();
  }
$msg=' ';
  $id=$_GET['id'];
$query = "SELECT * from medrep where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = $result-> fetch_assoc();
?>

<?php
$status = "";
if(isset($_POST['submit']))
{

$name =$_POST['Name'];
$phone =$_POST['Phone'];
$email =$_POST['Email'];
$company =$_POST['Company'];

$update="UPDATE `medrep` set `Name`='$name',`Phone`='$phone' ,`Email`='$email', `Company`='$company' where Id='".$_GET['id']."'";
mysqli_query($conn, $update);
$msg="updated";
header('location:medrep.php');


}
?>
<!DOCTYPE html>
<html>
        <head>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
                <!--jQuery library--> 
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <!--Latest compiled and minified JavaScript--> 
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <style>
                    body {
	background: #1e3c72; 
	background: -webkit-linear-gradient(to bottom left,#b3ff1a,#ff4d4d); 
	background: linear-gradient(to bottom left,#b3ff1a,#ff4d4d);
	width: 100%;
	height: 657px;
  }
  </style>
                <title>Update Form</title>
            </head>
<body>
<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
<h2>Update Patient Details</h2>
<form name="form" method="post" action=""> 
<div class="form-group">
<input type="text" name="Name" placeholder="Name" value="<?php echo $row['Name']; ?>">
</div>
<div class="form-group">
<input type="text" name="Phone" placeholder="Phone" 
 value="<?php echo $row['Phone']; ?>" />
</div>
<div class="form-group">
<input type="text" name="Email" placeholder="Email" 
 value="<?php echo $row['Email']; ?>" />
</div>
<div class="form-group">
<input type="text" name="Company" placeholder="Company" 
 value="<?php echo $row['Company']; ?>" />
</div>
<input name="submit" type="submit" class="btn btn-primary" value="Update" />
<?php if($msg != ' '): ?>
<?php echo $msg; ?>
<?php endif;?>
</form>
</div>
</body>
</html>