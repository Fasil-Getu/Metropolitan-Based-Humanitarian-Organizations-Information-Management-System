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
  
 <form method="POST" action="search.php">
      <p>
        <input type="text" name="searchtext" placeholder="Enter Applicants Full Name"  required="true"/>
        <input type="submit" name="searchsubmit" value="Search" class="btn" />
      </p>
    </form>
  </div>
  
  <div id="content">

  		


    <div class ="thead">
      <div id="tr">
        <div class="th">First Name</div>
        <div class="th">Last name</div>
        <div class="th">gender</div>
        <div class="th">Age</div>
        <div class="th">Status</div>
   
      </div>
    </div>

   
      
  <?php 
  include 'connection.php';

 $name= $_SESSION['orgname'];

$query = "select * from hum_organization where Org_Name ='$name'";
$result=mysqli_query($conn,$query);

  while($rows = mysqli_fetch_assoc($result)){ 
  $cno = $rows['CNO'];
}

$query2= "select * from users where CNO='$cno'";
$result2=mysqli_query($conn,$query2);

 while($rows = mysqli_fetch_assoc($result2)){ 
   $uid = $rows['U_Id'];


$query3= "select * from applicant where U_Id='$uid' ";
$result3=mysqli_query($conn,$query3);

  while($rows = mysqli_fetch_assoc($result3)){ ?>


  		<form  action="applicants.php"  method="POST" id="myform"> 

      <div id="tr">
      

      	<input type="hidden"  name="id" value="<?php echo $rows['App_Id'];?>">

        <div class="td"><?php echo $rows['App_FName'];?> 
        <input type="hidden"  name="apfname" value="<?php echo $rows['App_FName'];?>">
       </div>

        <div class="td" name="aplname" ><?php echo $rows['App_LName']; ?>
        	<input type="hidden"  name="aplname" value="<?php echo $rows['App_LName'];?>">
        </div>

        <div class="td" name="sex"><?php echo $rows['Sex']; ?>
        	<input type="hidden"  name="sex" value="<?php echo $rows['Sex'];?>">
        </div>

        <div class="td" name="age"><?php echo $rows['Age']; ?>
         <input type="hidden"  name="age" value="<?php echo $rows['Age'];?>">
         </div>

  <div class="td">

 <select name="status">  
<option value="active">Active</option>  
<option value="waiting">Waiting</option>  
<option value="rejected">Rejected</option> 
</select>  
   <button type="submit" name="submit" class="subbtn">Submit</button>   
  
  </div> 
          
             </div>
                       </form>
     
     <?php 
            } } ?>

    
 <?php


if(isset($_POST['submit'])){
include 'connection.php';

$status=$_POST['status'];
$id=$_POST['id'];
$fname=$_POST['apfname'];
$lname=$_POST['aplname'];
$sex=$_POST['sex'];
$age=$_POST['age'];

$sql2="update applicant set Benfi_FN='$fname', Benfi_lN='$lname', status='$status' where App_Id='$id'";
$res2=mysqli_query($conn,$sql2);

if($res2){  ?>
<button class="label"><?php echo $fname; ?></button>
<button class="label">Updated to <?php echo $status; ?></button>
<?php }        
  

else{ ?>

<button class="label"> Not Updated </button>


<?php } } ?> 

 

 

</div>

 
</body>
</html>
