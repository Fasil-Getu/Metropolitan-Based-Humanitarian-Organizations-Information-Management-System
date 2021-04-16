

<!DOCTYPE html >
<html>
<head>
<title>userz</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/Userz.css" rel="stylesheet" type="text/css" />


</head>
<body>

<div class="main">

 <?php
    require_once('menuA.php');
?>

  <div class="content">
  
      
        
     
<?php

$conn=mysqli_connect("localhost","root","","project");	


//Get images from the database
function show(){
	$conn=mysqli_connect("localhost","root","","project");
  $cno=$_SESSION['cno'];


$query2= "select * from users where CNO='$cno' ";
$result2=mysqli_query($conn,$query2);

 while($rows = mysqli_fetch_assoc($result2)){ 
 $uid = $rows['U_Id'];


$query3= "select * from applicant where U_Id ='$uid' and Status='active' ";
$result3=mysqli_query($conn,$query3);
$check=mysqli_num_rows($result3);


if($check){

  while($rows = mysqli_fetch_assoc($result3)){ 

   $imageURL = 'uploads/'.$rows["photo"];

?>
<form class="images-info" action="child.php" method="POST">

<div class="card" onclick="javascript:this.parentNode.submit();">
  	 <img class="adopte-img" src="<?php echo $imageURL; ?>" alt="" />
  <div class="card-body">	 
  		<h4 class="card-title"><?php echo $rows['App_FName'];?></h4>
	  <p class="card-text btn-info"><?php echo "Age: ".$rows['Age'];?> </p>
	 <p class="card-text btn-info"><?php echo "Gender: ".$rows['Sex'];?> </p>

	 <p class="card-text" name="appid" value="$rows['App_Id']"><?php echo $rows['App_Id'];?><a href=""> more</a></p>
	 <input type="hidden" name="appid" value="<?php echo $rows['App_Id'];?>" class="card">

  </div>
</div>


</form>


<?php } }


 } }

//


 $name= $_SESSION['orgname'];

$query = "select * from hum_organization where Org_Name ='$name' and Org_type = 'institution based'";
$result=mysqli_query($conn,$query);
$check=mysqli_num_rows($result);

if($check){
  while($rows = mysqli_fetch_assoc($result)){ 
    $cno = $rows['CNO'];
    $_SESSION['cno']=$cno;
show();
 
}}



?>

</div>
</div>
</body>
</html>


