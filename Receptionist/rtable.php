<?php

 $conn = mysqli_connect("localhost","root","root","userdb");
 if(mysqli_connect_errno()){
  echo 'Failed to connect to MySQL', mysqli_connect_errno();
}
?>      
<style>
body {
	background: #1e3c72; 
	background: -webkit-linear-gradient(to bottom left,#673ab7,#0099ff); 
	background: linear-gradient(to bottom left,#673ab7,#0099ff);
	width: 100%;
	height: 657px;
  }
</style>                
<h1>Patient Details</h1>
  
<div class="container-fluid">
             <div class="row">
                <div class="nav">
                    <p><a href="rentry.php">Home</a> 
                    <a href="logout.php">Logout</a>
                    </p>
                    
                </div>   
              </div>
      </div>
<h2>Patient Records</h2>
<table width="60%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Sl.No</strong></th>
<th><strong>Name</strong></th>
<th><strong>Phone</strong></th>
<th><strong>Doctor</strong></th>
<th><strong>Date</strong></th>
<th><strong>Time</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
     <?php
            $sqldata="Call GetPatients()";
            $result = $conn-> query($sqldata);
            if($result-> num_rows > 0) {
           while($row = $result-> fetch_assoc())  {
            echo '<tr><td align="center">';
            echo $row['Id'];
            echo '</td><td align="center">';
            
            echo $row['Name'];
            echo '</td><td align="center">';
            
            echo $row['Phone'];
            echo '</td><td align="center">';
            
            echo $row['Doctor'];
            echo '</td><td align="center">';

            echo $row['Date'];
            echo '</td><td align="center">';

            echo $row['Time'];
            echo '</td><td align="center">';
?>
            <a href="redit.php?id=<?= $row["Id"] ?>" >Edit</a>
          <?php  echo '</td><td align="center">';

          ?><a href="rdelete.php?id=<?= $row["Id"] ?>" >Delete</a>
          <?php  echo '</td><td align="center">';
           }  
           echo "</table>" ;
 }
            ?>
            </tbody>
    </table>
  </div>
<html>
<body>