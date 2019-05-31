<?php
       
//    session_start();

   $conn = mysqli_connect("localhost","root","","userdb");
   if(mysqli_connect_errno()){
    echo 'Failed to connect to MySQL', mysqli_connect_errno();
}
if (isset($_SESSION['username'])) {
  header('location:dashboard.php');
}



   if(isset($_POST['submit'])) {
           $username = $_POST['username'];
           $username = mysqli_real_escape_string($conn,$username);
           $password = $_POST['password'];
           $password = mysqli_real_escape_string($conn,$password);
      
         $query="SELECT username, password From doctor WHERE username='".$_POST['username']."' AND password='" .$_POST ['password'] . "'";

         $result = mysqli_query($conn, $query)or die($mysqli_error($conn));
         $num = mysqli_num_rows($result);
         if ($num == 0) {
           echo 'Invalid Username or Password';
           } else {  
             $row = mysqli_fetch_array($result);
             $_SESSION['username'] = $row['username'];
             $_SESSION['id'] = $row['id'];
             header('location: dashboard.php');
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
        <link rel="stylesheet" href="style1.css">
        <title>Doctor Login</title>      
    </head>
    <body>
    <form method="post">
    <div id="particles-js"></div>
<section class="login_container">
  <div class="container">
    <div class="logo"><h1>Clinic Database</h1></div>
    <div class="login_wrapper">
      <div class="login_title">
        <h1>Doctor</h1>
        <br>
      </div>
      <div class="login_form">
        <form>
          <div class="input-group">
            <input type="text" name="username" placeholder="Username" required="required" /><br>
          </div>
          <div class="input-group">
            <input type="password" name="password" placeholder="Password" required="required" />
          </div>
       <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>
</section>
    </form>
            </div>
    </body>
</html>