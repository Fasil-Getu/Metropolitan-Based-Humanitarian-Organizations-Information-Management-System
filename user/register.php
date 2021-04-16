
	

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Register</title>


<link href="css/userz.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/registeration.css" />
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
	
	<center>  <h2> Register </h2> </center>  
	  <hr>  

			<form id="form" action="register.php" method="POST">

				<div class="form-group">
				  	<label  for="uname">User Name:</label>
				   	<input type="text" class="form-control" id="uname" placeholder="username" name="uname" required="true">
				</div>
			
			  <div class="form-group">
			    <label  for="fn">First Name:</label>
			    <input type="text" class="form-control" id="fn" placeholder="First Name" name="fname">
			  </div>
			  <div class="form-group">
			    <label  for="ln">Last Name:</label>
			    <input type="text" class="form-control" id="ln" placeholder="Last name Name" name="lname">
			  </div>
			    <div class="form-group">
			    <label  for="email">Email:</label>			    
			     <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="true">
			  </div>
			  <div class="form-group">
			    <label  for="pwd">Credit Card Number:</label>
			    <input type="text" class="form-control" id="credit" placeholder="Enter credit card info" name="credit" required="true">
			  </div>
			  <div class="form-group">
			    <label  for="pwd">Password:</label>
			    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required="true">
			  </div>
			  </br>
			  <div class="form-group"> 
			  
			      <button type="submit" class="btn" name="submit">sign up</button> &nbsp; <p> Already a Member?</p> 
			      <a href="../log.php">Sign in</a>
			     </div>
			</form>
     
	</div>
	   </div>
		</div>
		</div>
			
  
</body>
</html>

<?php

	$conn = mysqli_connect("localhost", "root", "", "project");
			
			if(isset($_POST['submit'])) {

		function checkUser($uname){

			$conn = mysqli_connect("localhost", "root", "", "project");

			$myquery = "select * from adopte_user";

	 		$result = mysqli_query($conn,$myquery);

			$found = false;

			if (!empty($_POST['uname']) && !empty($_POST['pass'])){
			    
			    if(!$result){
			        echo mysqli_error();
			    }
			    else {
			         while ($row = mysqli_fetch_assoc($result) && !$found) {
			            if ($uname == $row['AU_Id']){
			            	$found = true;
			           
			           }

			            else
			            	$found = false;
			        }
			    }
			}
			return $found;
		}
		

		function add($fname, $lname, $uname, $email, $credit, $pass){ 
			$conn = mysqli_connect("localhost", "root", "", "project");
			

			if(!checkUser($uname)){
$uname= $_POST['uname'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$credit=$_POST['credit'];

$name= $_SESSION['orgname'];
$query = "select * from hum_organization where Org_Name ='$name'";
$result=mysqli_query($conn,$query);

  while($rows = mysqli_fetch_assoc($result)){ 
    $cno = $rows['CNO'];
}


$query2= "select * from users where CNO='$cno'";
$result2=mysqli_query($conn,$query2);

  while($rows = mysqli_fetch_assoc($result2)){ 
    $uid= $rows['U_Id'];
}


$sql ="insert into users(U_Id, UFN, ULN, CNO) values ('$uid','$fname','$lname','$cno')";
			
				$query=mysqli_query($conn,$sql);


$sql1 ="insert into adopte_user(AU_Id, AU_FN, AU_LN, email, passwordU, credit, U_Id) values ('$uname','$fname','$lname','$email','$pass','$credit','$uid')";
			
				$myquery=mysqli_query($conn,$sql1);

				if($myquery){?>

                   <button class="label"><?php echo $fname; ?> you have successfully registered! </button>  <?php

                   $_SESSION['adopte-user'] = $uname;


header("Location: http://localhost/proj/user/adopt.php");  
}

              
				
			}
			
			 
			else

			echo '<script type="text/javascript"> alert(" Username already exist!!  ");</script>'; 

		}

		add($_POST['uname'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['pass'],$_POST['credit'],$_POST['uid']);
		
	}
?>

