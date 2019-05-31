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
            .nav {
                padding:10px;
               background:black;   
            }
            .body {
                /* background: #1e3c72;  */
	            background: -webkit-linear-gradient(to bottom left,#b3ff1a,#ff4d4d); 
	            background: linear-gradient(to bottom left,#b3ff1a,#ff4d4d);
	            width: 100%;
                height: 607px;
                padding:10px;
            }
            h4 {
                text-align:center;
            }
            </style>
        <title>Dashboard</title>
    </head>
        <body>
        <div class="container-fluid">
             <div class="row">
                <div class="nav">
                    <p><a href="dashboard.php">Home</a> 
                    <a href="prtable.php">View Patients</a>
                    <a href="logout.php">Logout</a>
                    </p>
                </div>   
        <div class="body"> 
         <h1>Welcome Doctor</h1>
         <br>
          <h4><a href="precord.php">Enter Patient Records</h4>
          <br>
          <h4> <a href="medtable.php">Medicines</h4>
          <br>
          <h4> <a href="medrep.php">Medical Representatives</h4>
          </div>
    </div>
    </div>
    </body>
</html>

