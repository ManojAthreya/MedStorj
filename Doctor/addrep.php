<?php

 $conn = mysqli_connect("localhost","root","","userdb");
 if(mysqli_connect_errno()){
  echo 'Failed to connect to MySQL', mysqli_connect_errno();
}

  

if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn,$_POST['Name']);  
    $phone = mysqli_real_escape_string($conn,$_POST['Phone']);
    $email = mysqli_real_escape_string($conn,$_POST['Email']); 
    $company = mysqli_real_escape_string($conn,$_POST['Company']); 

    $sql="INSERT into medrep (Name,Phone,Email,Company)values('$name','$phone','$email','$company')";
    if ($conn->query($sql) === TRUE) {
        header('location:medrep.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
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
                <title>MedRep Form</title>
            </head>
<body>
    <div class="container-fluid">
        <div class="row">
        <p><a href="dashboard.php">Home</a>  
|      <a href="logout.php">Logout</a>
     <a href="medrep.php">View Medreps</a></p>
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                    <h2>Medical Representative Details</h2>
                    <form method= "POST" action = "#">
                        <div class="form-group">
                            <input class="form-control" placeholder="Name" name="Name"  required = "true">
                        </div>
                        <div class="form-group">
                            <input type="integer" class="form-control"  placeholder="Phone"  name="Phone" required = "true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Email"  name="Email" required = "true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Company"  name="Company" required = "true">
                        </div>    
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>