<!DOCTYPE html>
<html>
	
<head><title>Donation Form</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/userz.css" rel="stylesheet" type="text/css" />


</head>
<body>
<div class="main">
<?php
   require_once('menu.php');
?>

  <div class="content">
   
    <div class="content_resize">

      <div class="mainbar">

      	<div class="article">
<h1>Donation Form</h1>


 <?php 
     $uname=$_SESSION['donate-user'] ;
     $pw=$_SESSION['password'] ;


$sqla="select * from sponsor where S_Id='$uname' AND acc_no ='$pw'";
$resa = mysqli_query($conn,$sqla);

if(mysqli_num_rows($resa)==1){

   while($rows = mysqli_fetch_assoc($resa)){ 

 $sid = $rows['S_Id'];
  $sfn = $rows['SFN'];
  $sln = $rows['SLN'];
  $ssex = $rows['Sex'];
  $scity = $rows['City'] ;
   $sphone = $rows['Phone_N_O'];
  $semail= $rows['e_mail'] ; 
  $saccno = $rows['acc_no'] ; 
  $suid = $rows['U_Id']  ;

}?>
          <form method="POST" class="donateform" action="Dform.php">
        <h2> Sponsership Form</h2>
         <h3>Number of people to sponsor</h3>

     </p><input type="text" name="c11" placeholder="cost per person per month is 3000 birr">

     

      <input type="submit" name="b1" value="Donate">&nbsp &nbsp &nbsp

 <input type="hidden" name="sid" value="$sid">  <input type="hidden" name="ssex" value="$ssex">        <input type="hidden" name="semail" value="$semail">
<input type="hidden" name="sfn" value="$sfn">   <input type="hidden" name="scity" value="$scity">       <input type="hidden" name="saccno" value="$saccno">
<input type="hidden" name="sln" value="$sln">  <input type="hidden" name="sphone" value="$sphone">        <input type="hidden" name="suid" value="$suid">

      <input type="submit" name="b2" value="Clear">
     </center>
</form>
      	</div>


</div>   <?php }  

else{

  $sqlm = "select * from member where M_Id='$uname' AND Acc_N_O='$pw'";
$resm = mysqli_query($conn,$sqlm);

if(mysqli_num_rows($resm)==1){
    while($rows = mysqli_fetch_assoc($resm)){ 

 $mid = $rows['M_Id'];
  $mfn = $rows['MFN'];
  $mln = $rows['MLN'];
  $sex = $rows['Sex'];
  $city = $rows['City']; 
   $phone = $rows['Phone_N_O'];
  $email= $rows['e_mail'] ; 
  $accno = $rows['Acc_N_O'] ; 
  $uid = $rows['U_Id']  ;

?>
         <form method="POST" class="donateform" action="Dform.php">
<h2>Membership Form</h2>
     <center>
        <h3>Donation interval</h3>
      <select name="c11">
        <option>-------</option>
        <option>DAILY</option>
        <option>WEEKLY</option>
        <option>MONTHLY</option>
        <option>YEARLY</option>
      </select>
      <h3>Amount</h3>
      <input type="text" name="c12" placeholder="Greater than 350 birr per month">

<input type="hidden" name="mid" value="$mid">  <input type="hidden" name="sex" value="$sex">        <input type="hidden" name="email" value="$email">
<input type="hidden" name="mfn" value="$mfn">   <input type="hidden" name="city" value="$city">       <input type="hidden" name="accno" value="$accno">
<input type="hidden" name="mln" value="$mln">  <input type="hidden" name="phone" value="$phone">        <input type="hidden" name="uid" value="$uid">

      <input type="submit" name="b1" value="Donate">&nbsp &nbsp &nbsp
      <input type="submit" name="b2" value="Clear">


     </center>
</form>
 
        </div>
           </div>

 <?php }  } } ?>


<?php

$conn = mysqli_connect("localhost", "root", "", "project");
 $uname=$_SESSION['donate-user'] ;
     $pw=$_SESSION['password'] ;


$sqla="select * from sponsor where S_Id='$uname' AND acc_no ='$pw'";
$resa = mysqli_query($conn,$sqla);

if(mysqli_num_rows($resa)>=1){

if(isset($_POST['b1'])){

$a11=$_POST['c11'];
$sid = $_POST['sid'];
  $sfn = $_POST['sfn'];
  $sln = $_POST['sln'];
  $ssex = $_POST['ssex'];
  $scity = $_POST['scity'] ;
   $sphone = $_POST['sphone'];
  $semail= $_POST['semail'] ; 
  $saccno = $_POST['saccno'] ; 
  $suid = $_POST['suid']  ;

 echo $_POST['sfn']; 

  $sql1="insert into sponsors(S_Id, SFN, SLN, Sex, City, Phone_N_O, e_mail, acc_no, people_number, U_Id) 
                    values('$sid','$sfn','$sln','$ssex','$scity','$sphone','$semail','$saccno','$a11','$suid')";
$aa=mysqli_query($conn,$sql1);

if($aa){?>
   <button class="label"> Well Done! </button>  
<?php }

else{?>
   <button class="label"> error! try Again. </button>
<?php }

   


} }

else{
$sqlm = "select * from member where M_Id='$uname' AND Acc_N_O='$pw'";
$resm = mysqli_query($conn,$sqlm);

if(mysqli_num_rows($resm)==1){
    while($rows = mysqli_fetch_assoc($resm)){ 

 $mid = $rows['mid'];
  $mfn = $rows['mfn'];
  $mln = $rows['mln'];
  $sex = $rows['Sex'];
  $city = $rows['city']; 
   $phone = $rows['phone'];
  $email= $rows['emaill'] ; 
  $accno = $rows['accno'] ; 
  $uid = $rows['uid']  ;

$a11=$_POST['c11'];
$a12=$_POST['c12'];


 echo $_POST['sfn']; 

  $sql1="insert into members(M_Id, MFN, MLN, Sex, City, Phone_N_O, e_mail, Acc_N_O, dinterval, amount, U_Id) 
                    values('$mid','$mfn','$mln','$sex','$city','$phone','$email','$accno','$a11','$a12','$suid')";
$aa=mysqli_query($conn,$sql1);

if($aa){?>
   <button class="label"> Well Done! </button>  
<?php }

else{?>
   <button class="label"> error! try Again. </button>
<?php }

   

}
} }



     ?>
</body>




</html> 