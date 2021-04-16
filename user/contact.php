<!DOCTYPE html >
<html >
<head>
<title>Userz</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/userz.css" rel="stylesheet" type="text/css" />


<body>
<div class="main">
  <?php
    require_once('menu.php');
?>

  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2><span>Contact Us</span></h2>
 
        <div class="article">
  
            <ul style="font-family: georgia; font-size: 14px; margin: 5px; background-color: white; ">

              <?php 

                              $orgname = $_SESSION['orgname']  ;


                  $query= "select * from hum_organization where Org_Name ='$orgname' ";

                       $result=mysqli_query($conn,$query);
                        $check=mysqli_num_rows($result);
                       if($check){
                      while($rows = mysqli_fetch_assoc($result)){   ?>

              <li>
                <label for="Address">Physical Address : <?php echo $rows['Office_addres']; ?> </label>
              </li>

              <li>
                <label for="email">Email Address : <?php echo $rows['e_mail']; ?></label>
              </li>

              <li>
                <label for="website">Website : http://www. <?php echo $rows['Org_Name'] ;?> .com </label>
              </li>

               <li>
                <label for="phone">Phone Number : <?php echo $rows['Phone_N_O'] ;?></label>
              </li>

              <li>
               <label for="fax">Fax : <?php echo $rows['passwordO'];?> P O box</label>
              </li>

              <li>
               <label for="conclude "> <?php echo $rows['Region'];?>  , Ethiopia</label>
              </li>

              </ul>
        <?php }
                } ?>
        </div>
      </div>
      
      </div>
     </body>
</html>
