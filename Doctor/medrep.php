<?php

 $conn = mysqli_connect("localhost","root","","userdb");
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
<h1>Medical Representatives</h1>
  
<div class="form">
<p><a href="dashboard.php">Home</a>  
| <a href="logout.php">Logout</a></p>
<a href="addrep.php">Add Medical Representative</a></p>
<h2>Medical Representatives</h2>
<table width="60%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Sl.No</strong></th>
<th><strong>Name</strong></th>
<th><strong>Phone</strong></th>
<th><strong>Email</strong></th>
<th><strong>Company</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
     <?php
            $sqldata="SELECT Id,Name,Phone,Email,Company FROM medrep order by Id";
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
            
            echo $row['Email'];
            echo '</td><td align="center">';

            echo $row['Company'];
            echo '</td><td align="center">';
?>
            <a href="repedit.php?id=<?= $row["Id"] ?>" >Edit</a>
          <?php  echo '</td><td align="center">';

          ?><a href="repdelete.php?id=<?= $row["Id"] ?>" >Delete</a>
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