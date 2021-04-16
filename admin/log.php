<?php
session_start();

?>



<!DOCTYPE html>    
<html>    
<head>    
    <title>Log-in Page</title>    
    <link rel="stylesheet" type="text/css" href="css/login.css">    
</head>    
<body>    
<h2>Login_Page</h2>
      
    <div class="login">    

<form id="login" method="POST" action="log.php">    
        <label><b>User Name     
        </b>    
        </label>    
        <input type="text" name="Uname" id="Uname" placeholder="Username">    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="Pass" id="pass" placeholder="Password">    
        <br><br> 

         <input type="submit" name="submit" id="log" value="Log In Here">
          
        <br><br>    

        <input type="checkbox" id="check">    
        <span>Remember me</span>    
        <br><br>    
       <a href="#" id="forgot">  Forgot Password</a>    
    </form>     

</body>    
</html> 

<?php
if (isset($_POST['submit']))
{

     

    
function sponser(){
    include 'connection.php';
    $uname = $_POST['Uname'];
    $pw = $_POST['Pass'];

  $sql3 = "select * from sponsor where S_Id='$uname' AND acc_no ='$pw'";
$res3 = mysqli_query($conn,$sql3);

if(mysqli_num_rows($res3)==1){
    

    echo "<script type='text/javascript'>alert('loggedin')</script>";

     $_SESSION['donate-user'] = $uname;
     $_SESSION['password'] = $pw;
header("location:user/Dform.php");}

else{

echo "<script type='text/javascript'>alert(' not loggedin')</script>";

}
}


function member(){
    include 'connection.php';
    $uname = $_POST['Uname'];
    $pw = $_POST['Pass'];

  $sql3 = "select * from member where M_Id='$uname' AND Acc_N_O='$pw'";
$res3 = mysqli_query($conn,$sql3);

if(mysqli_num_rows($res3)==1){
    

    echo "<script type='text/javascript'>alert('loggedin')</script>";
 $_SESSION['donate-user'] = $uname;
     $_SESSION['password'] = $pw;

header("location:user/Dform.php");}

else{

sponser();

}
} 



function adopte(){
    include 'connection.php';
    $uname = $_POST['Uname'];
    $pw = $_POST['Pass'];

  $sql3 = "select * from adopte_user where passwordU='$pw' AND AU_Id='$uname'";
$res3 = mysqli_query($conn,$sql3);

if(mysqli_num_rows($res3)==1){
    

    echo "<script type='text/javascript'>alert('loggedin')</script>";

     $_SESSION['adopte-user'] = $uname;

header("location:user/adopt.php");}

else{

member();

}
}

function org(){
    include 'connection.php';
    $un = $_POST['Uname'];
    $pw = $_POST['Pass'];
 $sql2 = "select * from hum_organization where passwordO='$pw' AND CNO='$un'";
$res2 = mysqli_query($conn,$sql2);

if(mysqli_num_rows($res2)==1){
  while ($row = mysqli_fetch_assoc($res2)) {
    $orgname= $row['Org_Name'];
 
  }

   $_SESSION['orgname'] = $orgname;


    echo "<script type='text/javascript'>alert('loggedin')</script>";

header("location:org/index.php");}
else{
    adopte();
}

}

      include 'connection.php';
    $un = $_POST['Uname'];
    $pw = $_POST['Pass'];
 $sql1 = " select * from admin where passwordA='$pw' AND A_Id='$un'";
 $res1 = mysqli_query($conn,$sql1);
 if(mysqli_num_rows($res1)==1){


    echo "<script type='text/javascript'>alert('loggedin')</script>";

header("location:admin.php");}
else{
    org();
}







         
 }   

?>