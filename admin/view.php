<html><head><title></title>
	<link rel="stylesheet" type="text/css" href="css/adminr.css">
  <meta charset='utf-8'>
   <meta name="viewport" content="width=device-width, initial-scale=1"></head>
<body bgcolor="blue_red">


	<div class="container">
		
<div class="tnav">

	 <div class="menubar">  

<button   class="admin">
<a href="admin.php"> <img src="img/Admin logo.gif"></a>
 	</button>

 <ul class="menulist" >
  <li  ><a href="admin.php"><span>Home</span></a></li>
   <li ><a href="Registeration_form.php"><span>Register</span></a></li>
  <li><a href="edit.php" ><span>Edit</span></a></li>  
   <li><a href="index.php"><span>Logout</span></a></li>
</ul>

</div>

</div>

<div class="main">




<?php
include 'connection.php';

$C=1;
$sql="select Org_Name,Org_type,Phone_N_O,CNO from hum_organization ";
$r=mysqli_query($conn,$sql);

$row=mysqli_num_rows($r);
echo "<h1 style= 'color:silver;' ><center> Legal and Registered Humanitarian Organizations in ADDIS<center> </h1> <br/>";


echo "<center><img src='img/img4.jpg' hight='20%' width='20%'></center>&nbsp";

echo "<center><table cellpadding='20' border='0' width='100%' >";
	echo "<tr bgcolor='silver'>";
	echo "<td><b> N_O </b></td>";
	echo "<td><b> ORGANIZATION_NAME </b></td>";
	echo "<td> <b>ORGANIZATION_TYPE </b></td>";
	echo "<td><b> PHONE_NUMBER </b></td>";
        echo "<td> <b>CERTIFICATE_NUMBER </b></td>";
	echo"</tr>";
            echo "</center>";
if($row){
	while($ro=mysqli_fetch_assoc($r)){
		echo "<tr bgcolor='white'>";
  echo "<td> $C </td>";
$C+=1;
	foreach ($ro as $key => $value) {
              
		echo "<td> $value </td>";
                   
	}
	echo "</tr>";
	}


}
?>


</div> 
</body>
</html>