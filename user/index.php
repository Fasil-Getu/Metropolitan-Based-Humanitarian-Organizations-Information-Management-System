<?php
session_start();

?>




<!DOCTYPE html >
<html>
<head>
<title>Userz</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/userz.css" rel="stylesheet" type="text/css" />


</head>
<body>

<div class="main">


<?php

  $conn = mysqli_connect("localhost", "root", "", "project");
      
      if(isset($_POST['OrgName'])) {
        $name= $_POST['OrgName'];
        $_SESSION['orgname']=$name;
        
$myquery = "select Org_type from hum_organization where Org_Name = '$name'";
$result =mysqli_query($conn,$myquery);



if ($result->num_rows > 0) {
  // output data of each row
  $row = mysqli_fetch_assoc($result);
   
    
if ($row["Org_type"] === "community based") {

    require_once('menuC.php');

      }
 else{

    require_once('menuI.php');

 }
  
 }

}

?>
  <div class="content">
    <div class="content_resize">
      
        
         <img  src="images/bk.jpg" width="900" height="460"  />

      

</div>
    </div>
        </div>

 
</body>
</html>


  