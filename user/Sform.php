<!DOCTYPE html>
<html>
  
<head><title>Sponsership Form</title>
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

          <form method="POST" class="donateform" action="Sform.php">
<h2>Sponsership Form</h2>
     <center>
       <p>First_Name</p><input type="text" name="c1">
      <p>Last_Name</p><input type="text" name="c2">
        <p>Sex</p><p><input type="text" name="c3">
        <p>City</p><input type="text" name="c4">
      <p>Phone_Number</p><input type="text" name="c5">
      <p>E_mail</p><input type="text" name="c6">
      <p>Account Number</p><input type="text" name="c7">

      <h3>Number of people to sponsor</h3>

     </p><input type="text" name="c11" placeholder="cost per person per month is 3000 birr">

     

      <input type="submit" name="b1" value="Donate">&nbsp &nbsp &nbsp
      <input type="submit" name="b2" value="Clear">
     </center>
</form>
 
        </div>


</div>


<?php
$conn = mysqli_connect("localhost", "root", "", "project");

if(isset($_POST['b1'])){
$a=$_POST['c1'];
$a1=$_POST['c2'];
$a2=$_POST['c3'];
$a4=$_POST['c4'];
$a5=$_POST['c5'];
$a6=$_POST['c6'];
$a7=$_POST['c7'];
$a11=$_POST['c11'];


$name= $_SESSION['orgname'];

$query = "select * from hum_organization where Org_Name ='$name'";
$result=mysqli_query($conn,$query);
$check=mysqli_num_rows($result);

if($check){
  while($rows = mysqli_fetch_assoc($result)){ 
    $cno = $rows['CNO'];

$sqlu = "insert into user(U_Id, UFN, ULN, CNO) values (NULL,'$a','$a1','$cno')";
      
        $queryu=mysqli_query($conn,$sqlu);

        if($queryu){
                echo "user details uploaded successfully !";
            }else{
               echo "user details failed, please try again !";
            } 
}


 $query2= "select * from users where CNO='$cno'and UFN='$a' and ULN='$a1'";
$result2=mysqli_query($conn,$query2);

  while($rows=mysqli_fetch_assoc($result2)){ 

   $uid= $rows['U_Id'];
   
}

$sql1="insert into sponsors(S_Id, SFN, SLN, Sex, City, Phone_N_O, e_mail, acc_no, people_number, U_Id) 
                    values(NULL,'$a','$a1','$a2','$a4','$a5','$a6','$a7','$a11','$uid')";
$aa=mysqli_query($conn,$sql1);

if($aa){?>
   <button class="label"> Well Done! </button>  
<?php }
else{?>
   <button class="label"> error! try Again. </button>
<?php }

   }
       }  



?>




</body>
</html> 