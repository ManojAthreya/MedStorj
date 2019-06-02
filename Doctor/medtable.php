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
<h1>Medicine Database</h1>
  
<div class="form">
<p><a href="dashboard.php">Home</a>  
| <a href="logout.php">Logout</a>
<a href="medupdate.php">Enter New Stock</a></p>
<h2>Medicine Database</h2>
<table width="60%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Sl.No</strong></th>
<th><strong>Medicine</strong></th>
<th><strong>Stock</strong></th>
<th><strong>Message</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
     <?php
            $sqldata="Call medicine_call()";
            $result = $conn-> query($sqldata);
            if($result-> num_rows > 0) {
           while($row = $result-> fetch_assoc())  {
            echo '<tr><td align="center">';
            echo $row['Id'];
            echo '</td><td align="center">';
            
            echo $row['Medicine'];
            echo '</td><td align="center">';

            echo $row['Stock'];
            echo '</td><td align="center">';

            echo $row['Message'];
            echo '</td><td align="center">';
?>
            <a href="mededit.php?id=<?= $row["Id"] ?>" >Edit</a>
          <?php  echo '</td><td align="center">';

          ?>
          <a href="meddelete.php?id=<?= $row["Id"] ?>" >Delete</a> 
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