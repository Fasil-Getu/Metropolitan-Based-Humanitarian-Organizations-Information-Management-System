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
  
  
  
    <form method="get" action="">
      <p>
        <input type="text" name="search" />
        <input type="submit" value="Search" class="btn" />
      </p>
    </form>
  </div>
  
  <div id="content">
   <table class="table ">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last name</th>
        <th>gender</th>
        <th>Age</th>
      
       
      </tr>
    </thead>
    <tbody>
      
  <?php 
  include 'connection.php';
 $name= $_SESSION['orgname'];

$query = "select * from hum_organization where Org_Name ='$name'";
$result=mysqli_query($conn,$query);

  while($rows = mysqli_fetch_assoc($result)){ 
    $cno = $rows['CNO'];
}

$query2= "select * from users where CNO='$cno' ";
$result2=mysqli_query($conn,$query2);
 while($rows = mysqli_fetch_assoc($result2)){ 
 $uid = $rows['U_Id'];


$query3= "select * from applicant where U_Id ='$uid' and Status='active' ";
$result3=mysqli_query($conn,$query3);
  while($rows = mysqli_fetch_assoc($result3)){ ?>
      <tr>
        <td><?php echo $rows['App_FName'];?></td>
        <td><?php echo $rows['App_LName']; ?></td>
        <td><?php echo $rows['Sex']; ?></td>
        <td><?php echo $rows['Age']; ?></td>

      <?php } } ?>

      </tr>
      

     
        
      </tbody>
    </table>
</div>

</div>
</body>
</html>
