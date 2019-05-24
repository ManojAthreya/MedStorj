<?php
   $conn = mysqli_connect("localhost","root","","userdb");
   if(mysqli_connect_errno()){
    echo 'Failed to connect to MySQL', mysqli_connect_errno();
  }
$msg=' ';
  $id=$_GET['id'];
$query = "SELECT * from medicines where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = $result-> fetch_assoc();
?>

<?php
$status = "";
if(isset($_POST['submit']))
{

    $medicine=$_POST['Medicine'];  
    $stock = $_POST['Stock'];
    

$update="UPDATE `medicines` set `Medicine`='$medicine',`Stock`='$stock' where Id='".$_GET['id']."'";
mysqli_query($conn, $update);
$msg="updated";
header('location:medtable.php');


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
                <title>Update Medicine</title>
            </head>
<body>
<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
<h2>Update Medicine</h2>
<form name="form" method="post" action=""> 
<div class="form-group">
<input type="text" name="Medicine" placeholder="Medicine" value="<?php echo $row['Medicine']; ?>">
</div>
<div class="form-group">
<input type="number" name="Stock" placeholder="Stock" 
 value="<?php echo $row['Stock']; ?>" />
</div>
<input name="submit" type="submit" class="btn btn-primary" value="Update" />
<?php if($msg != ' '): ?>
<?php echo $msg; ?>
<?php endif;?>
</form>
</div>
</body>
</html>