<?php
session_start();
?>
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
  <li><a href="view.php" ><span>View</span></a></li>  
 <li><a href="index.php">Log Out</a></li>
</ul>

</div>
</div>

<div class="main">

<h1 style="color: silver;"><center>WELCOME TO ORGANIZATION DATA UPDATING PAGE</center> </h1> 	
<center>

<form method="POST" action="edit.php">

CNO:<input type="text" name="cno" style="width: 30%; height: 20px;" />

</br>

<b style="color: white;">^</b></br>
<b style="color: white;">||</b></br>

</br><b>ENTER YOUR CERTIFICATE NUMBER HERE</b></br>
</br>
<input type="submit" name="edit" value="EDIT" style="padding: 5px; width: 100px; border-radius: 10px; margin-bottom: 20px;"> 

</form>

</center>



<center>

<table cesavepadding='20' border='0' width='' class="table" >
	

	<thead style="background-color:silver; ">
	<tr >

	<th><b> ATTRIBUTE </b></th>
	<th><b>ORGANIZATION_NAME</b></th>
    <th><b> Office_addres </b></th>
    <th><b> Region         </b></th>
	<th><b> PHONE_NUMBER </b></th>
    <th ><b> e_mail  </b></th>

</tr>

</thead>


<tbody >


	<?php 
include 'connection.php';

if(isset($_POST['edit'])){

 $certificate=$_POST['cno'];
 $_SESSION['CNO']=  $certificate;

$sql1="select * from hum_organization where CNO='$certificate'";
$res=mysqli_query($conn,$sql1);
$row=mysqli_num_rows($res);



if($row){
	while($rows=mysqli_fetch_assoc($res)){ ?>

	 	<tr align="center">
        <td>VALUE</td>

        <td><?php echo $rows['Org_Name'];?> </td>
        <td><?php echo $rows["Office_addres"]; ?></td>
        <td><?php echo $rows['Region']; ?></td>
        <td><?php echo $rows['Phone_N_O'];?></td>
        <td><?php echo $rows['e_mail'];?></td>

    </tr>
               
<?php }
}
} ?>


<tr>
<td>EDIT HERE</td>

<form action="edit.php" method="Post">
<td><input type="text" name="name"></td>
<td><input type="text" name="address"></td>
<td><input type="text" name="region"></td>
<td><input type="text" name="phone"></td>
<td><input type="text" name="email"></td>
<td><input type="submit" name="save" value="SAVE" style="padding: 5px; width: 100px; border-radius: 10px; "></td>

</form>
</tr>



</tbody>


</tabel>
</center>

<?php

if(isset($_POST['save'])){
include 'connection.php';

$certificate=$_SESSION['CNO'];

$name=$_POST['name'];
$address=$_POST['address'];
$region=$_POST['region'];
$phone=$_POST['phone'];
$email=$_POST['email'];

$sql2="update hum_organization set Org_Name='$name', Phone_N_O='$phone', Office_addres='$address', Region='$region', e_mail='$email' where CNO='$certificate'";

if($name){
$res2=mysqli_query($conn,$sql2);
if($res2){
echo "save done";
}
else
{
echo "not done";
}
}
}
?>

</div>

</body>
</html>

