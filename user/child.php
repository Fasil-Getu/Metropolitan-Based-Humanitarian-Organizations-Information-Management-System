

<!DOCTYPE html >
<html>
<head>
<title>userz</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/Userz.css" rel="stylesheet" type="text/css" />


</head>
<body>

<div id="main">

 <?php
    require_once('menuA.php');
?>

  <div id="content">
  
 <h1>Make an Appointment</h1>     
        
     
<?php





function appointment(){

$conn=mysqli_connect("localhost","root","","project");  

if(isset($_POST['submit'])) {

 

 $adopteuser=$_POST['adopteuser'];

 $querya ="select * from adopte_user where AU_Id='$adopteuser'";
$resulta=mysqli_query($conn,$querya);
$checka=mysqli_num_rows($resulta);

if($checka){

while($rows = mysqli_fetch_assoc($resulta)){ 
    $fname=$rows['AU_FN'];
    $lname=$rows['AU_LN'];
    $fullname= $fname ." ".$lname;
     $email=$rows['email'];
 

 }

 $appid= $_POST['appid'];
 $bfullname = $_POST['Benfi_fullname'];
 $date = $_POST['date'];


$query2 = "insert into appointment(AU_Id, fullname, email, Benfi_fullname, App_Id, date) values ('$adopteuser','$fullname','$email','$bfullname','$appid','$date')"; 

$myquery=mysqli_query($conn,$query2);

        if($myquery){?>

<button class="label"> <?php echo $adopteuser;?> you have made an appointment with:  <?php echo $bfullname;?>   on a date : <?php echo $date; ?> ! </button>

     <?php     }
                  
                     }                               

else{?>
   <button class="label"><?php echo $adopteuser; ?> please select another day! </button> 

   <?php } }
                
    

else{?>
   <button class="label"> please click appointment button! </button> 

   <?php } }
            



$conn=mysqli_connect("localhost","root","","project");  
//Get image from the database
if($_POST['appid']){

 $appid= $_POST['appid'];

$query= "select * from applicant where App_Id='$appid' ";
$result=mysqli_query($conn,$query);
$check=mysqli_num_rows($result);
if($check){
  while($rows = mysqli_fetch_assoc($result)){ 

   $imageURL = 'uploads/'.$rows["photo"];
   ?>

<form id="images-info" action="child.php" method="POST">

<div id="card">
  	 <img id="adopte-img" src="<?php echo $imageURL; ?>" alt="" />
  <div id="card-body">	 
<h4 id="card-title"><?php echo $rows['Benfi_FN']." ". $rows['Benfi_LN'];?></h4>
<input type="hidden" name="Benfi_fullname" value="<?php echo $rows['Benfi_FN']." ". $rows['Benfi_LN'];?>">
	  <p id="btn-info"><?php echo "Age: ".$rows['Age'];?> </p>
	 <p id="btn-info"><?php echo "Gender: ".$rows['Sex'];?> </p>
	 <p id="btn-info"> <?php echo "disability: ".$rows['disablity'];?></p>
   <p id="btn-info"> <?php echo "address: ".$rows['From_where'];?></p>

<label style="margin-left:200px">Appointment</label>
<input type="date" name="date"></br></br>


    <input type="hidden" name="Benfi_fullname" value="<?php echo $rows['Benfi_FN']." ". $rows['Benfi_LN'];?>">
    <input type="hidden" name="appid" value="<?php echo $appid;?>">

    <input type="hidden" name="adopteuser" value="<?php echo $_SESSION['adopte-user'];?>" >

<input style="margin-left:63%; width:30%; background-color: yellow; padding:5px; border-radius: 10px;" type="submit" name="submit" value="Appoint">


  </div>
</div>

</form>



<?php 
         }  }   
              }

else{ ?>

    <p>No image(s) found...</p>

<?php } 

 appointment();
?>




</div>
</div>
</body>
</html>


