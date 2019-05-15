<?php

 $conn = mysqli_connect("localhost","root","root","userdb");
 if(mysqli_connect_errno()){
  echo 'Failed to connect to MySQL', mysqli_connect_errno();
}
if (!isset($_SESSION['username'])) {
    header('location: ');
  }
  

if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn,$_POST['Name']);  
    $phone = mysqli_real_escape_string($conn,$_POST['Phone']);
    $doctor = mysqli_real_escape_string($conn,$_POST['Doctor']); 
    $date = mysqli_real_escape_string($conn,$_POST['Date']);  
    $time = mysqli_real_escape_string($conn,$_POST['Time']);  

    $sql="INSERT into patientdetails (Name,Phone,Doctor,Date,Time)values('$name','$phone','$doctor','$date','$time')";
    if ($conn->query($sql) === TRUE) {
        header('location:rtable.php');
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
                <title>Patient Entry</title>
            <style>
            .nav {
                padding:10px;
               background-color:black;   
            }
            h2 {
                text-align:center;
            }
            body {
	background: #1e3c72; 
	background: -webkit-linear-gradient(to bottom left,#0099ff,#673ab7); 
	background: linear-gradient(to bottom left,#0099ff,#673ab7);
	width: 100%;
	height: 657px;
  }
            </style>
            </head>
        <body>
            <div class="container-fluid">
             <div class="row">
                <div class="nav">
                    <p><a href="rentry.php">Home</a> 
                    <a href="rtable.php">View Patients</a>
                    <a href="logout.php">Logout</a>
                    </p>
                    
                </div>    
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                    <h2>Enter Patient Details</h2>
                    <form method= "POST" action = "#">
                        <div class="form-group">
                            <input class="form-control" placeholder="Name" name="Name"  required = "true">
                        </div>
                        <div class="form-group">
                            <input type="integer" class="form-control"  placeholder="Phone"  name="Phone" required = "true">
                        </div>
                        <div class="form-group">
                                <h4>Select Doctor</h4>
                                <select name="Doctor">
                                        <option value="Ramesh">Ramesh</option>
                                        <option value="Ramya">Ramya</option>
                                      </select>
                                    </div>
                        <div class="form-group">
                            <input type="Date" class="form-control"  placeholder="Date"  name="Date" required = "true">
                        </div>
                        <div class="form-group">
                            <input class="form-control"  placeholder="Time"  name="Time" required = "true">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>