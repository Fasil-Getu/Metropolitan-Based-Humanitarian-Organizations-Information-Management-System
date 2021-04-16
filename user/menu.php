

<?php
session_start();

?>

  <?php


		

		$conn = mysqli_connect("localhost", "root", "", "project");
			
			if(isset($_SESSION['orgname'])) {
				$name=$_SESSION['orgname'];
				
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
