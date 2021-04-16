
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/indexr.css">
  <script type="text/javascript" src="ind.js"></script>
	<title>index</title>
</head>






<body >

<div class="container">


<div class="Tnav">


 
                                     

<div class="dropdown">
  <button class="dropbtn"><img src="img/logo.png"> </button>
  <div class="dropdown-content">
    <a href="log.php" name="admin">Administrator</a>
    <a href="log.php" name="org">Organization</a>
  
  </div>
</div>
	
                                   
    <div class="dropdown">
  <button class="dropbtn">Language </button>
  <div class="dropdown-content">
    <a href="#">Amharic</a>
    <a href="#">Engish</a>
  
  </div>
</div>  
    
                     
 
 <span ><img id="titlelg2" src="img/human.png"></span>

 <a href="index.php"><span ><img id="titlelg" src="img/Ethio Humanitarian House Logo.gif"></span></a>



</div>


<div class="Snav">

<!the contents of the list are to be retrieved and displayed from the database -this; is temporary demonstration>

<h2>Organizations</h2>
<?php

include 'connection.php';
$sql="select Org_Name from hum_organization";
$result=mysqli_query($conn,$sql);
$row=mysqli_num_rows($result);

if($row){
	while($row=mysqli_fetch_assoc($result)){
$names=$row['Org_Name'];
?>
<form action="user/index.php" method="POST">

<div class="button-info">
  <button  type="submit"  name="OrgName" value="<?php echo $names; ?>"><?php echo $names;?></button> 
</div>	
  </form>
 
<?php }        
 }                     
  else{ ?>
    <p>No Result found...</p>
<?php } ?>                               

                                         </div>


<div class="main">
	<h1 id="welcome">Welcome!</h1>
<p id="p1"> This web based platform provides Metropolitan based Humanitarian organizations,currently of those operating in Addis Ababa .             
 All of them in one place .</p>
<p> It allows you to access their various forms of services ,information and the means you could provide them with Assistance .  </p>
<p>Have a look Around!</p>
</div>

                 </div>

</body>


</html>