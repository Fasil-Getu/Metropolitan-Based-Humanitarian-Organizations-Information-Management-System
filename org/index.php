<?php
session_start();

?>


<!DOCTYPE html >
<html >
<head>
<title>Organization</title>

<link href="css/organ.css" rel="stylesheet" type="text/css" />
<meta charset='utf-8'>
   <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<div id="container">
  <div id="header">
<h1> <a href="index.php "><?php echo $_SESSION['orgname'];?> Humanitarian</a></h1>
     
    <ul>
      <li><a href="index.php" class="on">Home</a></li>
      <li><a href="applicants.php">Applicants</a></li>
      <li><a href="wait.php">Waiting List</a></li>
      <li><a href="active.php">Active list</a></li>
      <li><a href="report.php">Generate Report</a></li>
      <li><a href="../index.php">Log Out</a></li>
    </ul>
  
  

    <form method="get" action="/">
      <p>
        <input type="text" name="search" />
        <input type="submit" value="Search" class="btn" />
      </p>
    </form>
  </div>

  <div id="content">

    <h1 align="center" style="font-family: georgia; padding: 10px 0;" > Welcome <?php echo $_SESSION['orgname'];?> Ambassador !</h1>


   <div class="article">

   

     
<?php

$conn=mysqli_connect("localhost","root","","project");  

$name= $_SESSION['orgname'];
$query = "select * from hum_organization where Org_Name ='$name'";
$result=mysqli_query($conn,$query);

  while($rows = mysqli_fetch_assoc($result)){ 
    $cno = $rows['CNO'];
    $orgtype=$rows['Org_type'];
     $orgpurpose=$rows['purpose'];
}
 if ($orgtype=="institution based") {
   # code...
 

$query2= "select * from users where CNO='$cno'";
$result2=mysqli_query($conn,$query2);

  while($rows = mysqli_fetch_assoc($result2)){ 
    $uid= $rows['U_Id'];
}

$query3= "select * from adopte_user where U_Id='$uid'";
$result3=mysqli_query($conn,$query3);
?>

 <h3 style="border-bottom:1px solid #c4c4c4;"> Notice ! </h3>
<h4 style="margin-right: 370px;">New Appointments</h4>

 <?php
      while($rows = mysqli_fetch_assoc($result3)){
    $auid= $rows['AU_Id'];

$query4 = "select * from appointment  where AU_Id='$auid' ORDER BY AU_Id DESC LIMIT 5";
$result4=mysqli_query($conn,$query4);
$check1 =mysqli_num_rows($result4);

if($check1){
while($rows = mysqli_fetch_assoc($result4)){ ?>


<div class="appointments"> User Name : <?php echo $rows['fullname'];?> &nbsp;&nbsp;&nbsp;&nbsp;
 Foster child:  <?php echo $rows['Benfi_fullname'];?>  &nbsp;&nbsp;&nbsp;&nbsp;
  Date:  <?php echo $rows['date']; ?> </div>

  <?php       } } }}

elseif ($orgtype == "community based") {?>
  <h4 style="margin-right: 370px;">Who We Are</h4>
  <div class="appointments">  <?php echo $orgpurpose;?>
 </div>


<?php }
           
          ?>
</div> 


<div class="article">

   <h4 style="margin-right: 370px;">New Donations</h4> 

    
  <?php 

$queryd = "select * from monetary_donator  where CNO='$cno' ORDER BY CNO DESC LIMIT 5";
$resultd=mysqli_query($conn,$queryd);
$checkd =mysqli_num_rows($resultd);

if($checkd){
while($rows = mysqli_fetch_assoc($resultd)){ ?>


     <div id="donations" class="appointments">
Via: <?php echo $rows['modality'];?> &nbsp;&nbsp;&nbsp;&nbsp;
 From account:  <?php echo $rows['accpass'];?>  &nbsp;&nbsp;&nbsp;&nbsp;
Amount:  <?php echo $rows['amount']; ?> 
</div>



  <?php     

          }}?>

     </div>
  
</div>

<div id="footer">
  <div>
    <p> 2020 <?php echo $_SESSION['orgname'];?> <span> all rights protected by <?php echo $_SESSION['orgname'];?></span></p>
  </div>
</div>


</body>
</html>
