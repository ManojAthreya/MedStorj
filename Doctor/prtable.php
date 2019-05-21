<?php

 $conn = mysqli_connect("localhost","root","root","userdb");
 if(mysqli_connect_errno()){
  echo 'Failed to connect to MySQL', mysqli_connect_errno();
}
?>
 <style>
                    body {
	background: #1e3c72; 
	background: -webkit-linear-gradient(to bottom left,#b3ff1a,#ff4d4d); 
	background: linear-gradient(to bottom left,#b3ff1a,#ff4d4d);
	width: 100%;
	height: 657px;
  }
  </style>
<h1>Patient Records</h1>
  
<div class="form">
<p><a href="dashboard.php">Home</a>  
| <a href="logout.php">Logout</a></p>
<h2>Patient Records</h2>
<table width="60%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Sl.No</strong></th>
<th><strong>Name</strong></th>
<th><strong>Age</strong></th>
<th><strong>Sex</strong></th>
<th><strong>Phone</strong></th>
<th><strong>Address</strong></th>
<th><strong>Date</strong></th>
<th><strong>Disease</strong></th>
<th><strong>Medicine</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
     <?php
            $sqldata="SELECT Id,Name,Age,Sex,Phone,Address,Date,Disease,Medicine FROM patientrecords order by Id";
            $result = $conn-> query($sqldata);
            if($result-> num_rows > 0) {
           while($row = $result-> fetch_assoc())  {
            echo '<tr><td align="center">';
            echo $row['Id'];
            echo '</td><td align="center">';
            
            echo $row['Name'];
            echo '</td><td align="center">';
            
            echo $row['Age'];
            echo '</td><td align="center">';

            echo $row['Sex'];
            echo '</td><td align="center">';

            echo $row['Phone'];
            echo '</td><td align="center">';

            echo $row['Address'];
            echo '</td><td align="center">';

            echo $row['Date'];
            echo '</td><td align="center">';

            echo $row['Disease'];
            echo '</td><td align="center">';
            
            echo $row['Medicine'];
            echo '</td><td align="center">';
?>
            <a href="predit.php?id=<?= $row["Id"] ?>" >Edit</a>
          <?php  echo '</td><td align="center">';

          ?><a href="prdelete.php?id=<?= $row["Id"] ?>" >Delete</a>
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