<!DOCTYPE html >
<html>
<head>
<title>Users</title>
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

<center> <h1>Select Here</h1>

  <form method="POST" action="donation.php">
<?php
$name= $_SESSION['orgname'];

$query = "select * from hum_organization where Org_Name ='$name' and Org_type = 'institution based'";
$result=mysqli_query($conn,$query);
$check=mysqli_num_rows($result);

if($check){
?>
<button name="type">In Kind</button>&nbsp &nbsp &nbsp
<button name="monetary">Monetary</button>&nbsp &nbsp &nbsp
<button name="member">MEMBESHIP</button>&nbsp &nbsp &nbsp
<?php }
else{?>
<button name="type">In Kind</button>&nbsp &nbsp &nbsp
<button name="monetary">Monetary</button>&nbsp &nbsp &nbsp
<button name="sponser">SPONSERSHIP </button>&nbsp &nbsp &nbsp
<button name="member">MEMBESHIP</button>&nbsp &nbsp &nbsp
<?php }?>



  </center></form>  
        <div class="article">
 
          <?php

            if(isset($_POST['type'])){ ?>
     <center> 

        <h2>Donation_By Kind</h2>

      
          <div class="kinds"><b>Items We Need Right Now</b></div>
  
       <div class="kinds">modies</div> 
     <div class="kinds">shoes</div>
      <div class="kinds">Soft</div>
        <div class="kinds">Diper</div>
        <div class="kinds">Clothes</div>
        <div class="kinds">Education_Material</div>
    
      
</center>

    <?php    } 

          if(isset($_POST['monetary'])){ ?>


              <form method="POST" action="donation.php">

     <center> 
          <h2>Monetary Donation</h2>

<div class="monetary">Service Modality    
      </br> </br>

<select name="mod" required="true">
  <option><b>--------</b></option>
      <option><b>paypal</b></option>
        <option><b>Moneygram</b></option>
        <option><b>wester-union</b></option>
        <option><b>Master-card</b></option>
      </select>
</br> </br>

<input type="text" name="amount" placeholder="amount" required="true">
<input type="password" name="pass" placeholder="password" required="true">

<input type="submit" name="submit" value="donate">
 <input type="submit" name="b2" value="Clear">
</div> 
</center>

</form>
     <?php   } 


          elseif(isset($_POST['sponser'])){

           echo "<center> <h2>WELLCOME OUR SPONSER</h2>";
         echo "<a href='Sform.php'>FOR THE FIRST TIME</a></br>";
          echo "<a href='../log.php'>IS NOT MY FIRST TIME</a>";
        }

         elseif(isset($_POST['member'])){
         	echo "<center> <h2>WELLCOME OUR MEMBER</h2>";
         echo "<a href='Mform.php'>FOR THE FIRST TIME</a></br>";
          echo "<a href='../log.php'>IS NOT MY FIRST TIME</a>";
        }

 
          ?>


        </div>
        <div class="article">
         
        </div>
     




      <?php

$conn = mysqli_connect("localhost", "root", "", "project");

$nameorg=$_SESSION['orgname'];

$queryorg="select * from hum_organization where Org_Name='$nameorg'";
$resultorg=mysqli_query($conn,$queryorg);

  while($rows = mysqli_fetch_assoc($resultorg)){ 
 $cno=$rows['CNO'];
}
 


if(isset($_POST['submit'])){

if ($_POST['submit'] == 'donate'){

  $mod = $_POST['mod'];
  $amount = $_POST['amount'];
  $pass = $_POST['pass'];



$sqlmon="insert into monetary_donator(CNO, modality, accpass, amount) values('$cno','$mod','$pass','$amount')";
$chk=mysqli_query($conn,$sqlmon);

if($chk){?>
   <button class="label"> Thank you for Your Generousity! Well Done! </button>  
<?php }

else{?>
   <button class="label"> error! try Again. </button>
<?php 
     }
       } }

 ?> 

  </div>
</body>
</html>
