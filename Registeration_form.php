<html><head><title></title>
  <link rel="stylesheet" type="text/css" href="css/adminr.css">
  <meta charset='utf-8'>
   <meta name="viewport" content="width=device-width, initial-scale=1"></head>
<body >


  <div class="container">
    
<div class="tnav">

   <div class="menubar">  

<button   class="admin">
<a href="admin.php"> <img src="img/Admin logo.gif"></a>
  </button>

 <ul class="menulist" >
  <li  ><a href="admin.php"><span>Home</span></a></li>
   <li ><a href="view.php"><span>View</span></a></li>
  <li><a href="edit.php" ><span>Edit</span></a></li>  
   <li><a href="index.php"><span>Logout</span></a></li>
</ul>

</div>

</div>

<div class="main">
<form id="form" action="Registeration_form.php" method="POST">  
 

  <center>  <h1 style="color: silver;"> Registeration </h1> </center>  
  <hr>  
  <label> Name of the Organization </label>   
<input type="text" name="ON" placeholder= "Name of the Organization" size="15" required />  

<div class="formdiv"> 
<label> Type of humanitarian organization: </label>   
<select name="TY">  
<option value="Type">Type</option>  
<option value="community based.">community based</option>  
<option value="institution based">institution based</option>  
 
</select>  
</div>  



 <label> Address-main office </label>   
<input type="text" name="Add" placeholder= "Adress-main office" size="15" required />  



<div class="formdiv">  
<label>   
Region the organization will be Operating in :  
</label>   
  
<select name="RG">  

<label value="Region">Region</label> 
<option value="Addis Ababa">Addis Ababa</option> 
<option value="Amhara">Amhara</option>  
<option value="Afar">Afar</option>  
<option value="Benshangul">Benshangul</option>  
<option value="Gambela">Gambela</option>  
<option value="Harari">Harari</option>  
<option value="Oromia">Oromia</option>  
<option value="somali">somali</option>  
<option value="tigray">tigray</option> 
</select>  
</div>    
 


 
<label>   
Phone :  
</label>  
<input type="text" name="CC" placeholder="Country Code"  value="+251" size="2"/>   
<label>   
Purpose of the organization and work sector: 
</label>   
<textarea name="PR" cols="80" rows="5" placeholder="Purpose of the organization and work sector" value="purpose" required>  
</textarea>  

 <label for="email"><b>Email</b></label>  
 <input type="email" placeholder="Enter Email" id="email" name="em" required="true">  
   
    <label for="Certificate number"><b>Certificate number</b></label>  
 <input type="text" placeholder="Certificate number" name="CN" required>  

    <label for="psw"><b>Password</b></label>  
    <input type="password" placeholder="password" name="PSW" required="true">  
  
    <label for="psw-repeat"><b>Re-type Password</b></label>  
    <input type="password" placeholder="Retype Password" name="PSWR" required="true">  
    <button type="submit" name="submit" class="registerbtn">Register</button>    


</form>  

</div>
	</div>  

<script type="text/javascript" src="admin.js"></script>
</body>

</html>

<?php

if(isset($_POST['submit'])){
include 'connection.php';
$on=$_POST[ 'ON' ];
$ty=$_POST[ 'TY' ];
$ad=$_POST[ 'Add' ];
$rg=$_POST[ 'RG' ];
$ph=$_POST[ 'CC' ];
$pr=$_POST[ 'PR' ];
$ml=$_POST[ 'em' ];
$cn=$_POST[ 'CN' ];
$pw=$_POST[ 'PSW' ];
$pwr=$_POST[ 'PSWR' ];



$sql1="insert into hum_organization(Org_Name,Org_type,Office_addres,Region,Phone_N_O,purpose,e_mail,CNO,passwordO,R_password) values('$on','$ty','$ad','$rg','$ph','$pr','$ml','$cn','$pw','$pwr')";
$aa=mysqli_query($conn,$sql1);

if($aa){?>
  <button class="label"> you have successfully registered  <?php echo $on; ?>! </button>

    <?php }  

else{?>
 <button class="label"><?php echo $on; ?> Registeration unsuccessfull ! </button>
   <?php }  


}

?>



