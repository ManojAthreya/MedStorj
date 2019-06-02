<?php

 $conn = mysqli_connect("localhost","root","root","userdb");
 if(mysqli_connect_errno()){
  echo 'Failed to connect to MySQL', mysqli_connect_errno();
}

if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn,$_POST['Name']);  
    $age = mysqli_real_escape_string($conn,$_POST['Age']);
    $sex = mysqli_real_escape_string($conn,$_POST['Sex']);
    $phone = mysqli_real_escape_string($conn,$_POST['Phone']);  
    $address = mysqli_real_escape_string($conn,$_POST['Address']); 
    $date = mysqli_real_escape_string($conn,$_POST['Date']); 
    $disease = mysqli_real_escape_string($conn,$_POST['Disease']); 
    $medicine = mysqli_real_escape_string($conn,$_POST['Medicine']); 



    $sql="INSERT into patientrecords (Name,Age,Sex,Phone,Address,Date,Disease,Medicine)values('$name','$age','$sex','$phone','$address','$date','$disease','$medicine')";
    if ($conn->query($sql) === TRUE) {
        header('location:prtable.php');
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
                <style>
                    body {
	background: #1e3c72; 
	background: -webkit-linear-gradient(to bottom left,#b3ff1a,#ff4d4d); 
	background: linear-gradient(to bottom left,#b3ff1a,#ff4d4d);
	width: 100%;
	height: 657px;
  }
  </style>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Login Form</title>
            </head>
<body>
    <div class="container-fluid">
        <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                    <h2>Enter Patient Details</h2>
                    <form method= "POST" action = "#">
                        <div class="form-group">
                            <input class="form-control" placeholder="Name" name="Name"  required = "true">
                        </div>
                        <div class="form-group">
                            <input type="integer" class="form-control"  placeholder="Age"  name="Age" required = "true">
                        </div>
                        <div class="form-group">
                                <select name="Sex">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                      </select>
                         </div>
                        <div class="form-group">
                            <input class="form-control"  placeholder="Phone"  name="Phone" required = "true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Address"  name="Address" required = "true">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control"  placeholder="Date"  name="Date" required = "true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Disease"  name="Disease" required = "true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Medicine"  name="Medicine" required = "true">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>