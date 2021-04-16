<!DOCTYPE html >

<html>
<head>
<title>userz</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/application.css" rel="stylesheet" type="text/css" />
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


      <div class="register"  >

        <form id="form" action="application.php" method="POST" enctype="multipart/form-data">  
 

  <center>  <h2 id="h2">Application</h2> </center>  

  <hr>  
    <div class="form-group">
			    <label  for="fn">First Name:</label>
			    <input type="text" class="form-control" id="fn" placeholder="First Name" name="fname">
			  </div>
 <div class="form-group">
			    <label  for="ln">Last Name:</label>
			    <input type="text" class="form-control" id="ln" placeholder="Last name Name" name="lname">
			  </div>                                 
<div class="form-group">                                   
<label  for="gender">Gender:</label>                  
 <select class="option" name="gender">                 
<option value="male">Male</option>                      
<option value="female">Female</option>                  
                                                        
</select>  
</div>    
 
 <div class="form-group">
 <label> Address:</label>   
<input type="text" name="Address" placeholder= "Address" required />  
  </div>
 <div class="form-group">
 <label> Age:</label>   
<input type="text" name="Age" placeholder= "Age" required />  
  </div>

 <div class="form-group">  
<label>   
Disability:  
</label>   
  
<select class="option" name="disablity">  
<option value="yes">Yes</option>  
<option value="no">No</option>  
</select>  
</div>    
 
    


 <div class="form-group">  
<label>   
Phone :  
</label>  
<input type="text" name="phone" placeholder="phone"  value="+251" size="2"/>   
</div>

<div class="form-group">  
<label>   
Family:  
</label>   
  
<select class="option" name="family">  
<option value="yes">Yes</option>  
<option value="no">No</option>  
</select>  
</div> 

</br>
<div class="form-group">  
<label>   
Photo: 
</label>  </br>

<input type="file" name="photo" placeholder="photo"  value="" required="true" />   
</div>

    <button type="submit" class="applybtn" name="submit" value="Upload">Apply</button>    


</form>  </div>
      </div>

</div>
    </div>
        </div>
</body>
</html>

<?php

$conn = mysqli_connect("localhost", "root", "", "project");
// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES['photo']['name']);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$statusMsg = '';

if(isset($_POST["submit"]) && !empty($_FILES["photo"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)){
          

$fname=$_POST[ 'fname' ];
$lname=$_POST[ 'lname' ];
$gender=$_POST[ 'gender' ];
$Address=$_POST[ 'Address' ];
$Age=$_POST[ 'Age' ];
$disablity=$_POST[ 'disablity' ];
$phone=$_POST[ 'phone' ];

$name=$_SESSION['orgname'];

$query="select * from hum_organization where Org_Name='$name'";
$result=mysqli_query($conn,$query);

  while($rows = mysqli_fetch_assoc($result)){ 
    $cno = $rows['CNO'];

$sqlu = "insert into user(U_Id, UFN, ULN, CNO) values (NULL,'$fname','$lname','$cno')";
      
        $queryu=mysqli_query($conn,$sqlu);

        if($queryu){
                echo "user details uploaded successfully !";
            }else{
               echo "user details failed, please try again !";
            } 
}



 $query2= "select * from users where CNO='$cno'and UFN='$fname' and ULN='$lname'";
$result2=mysqli_query($conn,$query2);

  while($rows=mysqli_fetch_assoc($result2)){ 

   $uid= $rows['U_Id'];
   
}


$myquery = "insert into applicant(App_FName, App_LName, Sex, Age, photo, From_where, disablity, App_Phone_n_O, U_Id) values('$fname','$lname','$gender','$Age','$fileName','$Address','$disablity','$phone','$uid')";

$insert = mysqli_query($conn, $myquery);  

if($insert){
                $statusMsg = "Applicant details uploaded successfully !";
            }else{
                $statusMsg = "upload failed, please try again !";
            } 
            
                }

else{
	$statusMsg = "file type is incorrect !";
}
 }
else{
	 $statusMsg = 'Please select a file to upload !';
}
}?>
<button class="label"> <?php echo $statusMsg; ?>  </button>  <?php

?>
