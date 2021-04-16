<?php
session_start()

?>

<div class="header">
 
      <div class="logo">
       <h1><a href="adopt.php"><?php echo $_SESSION['orgname'];?> &nbsp;<span>Organization</span> <small><?php echo $_SESSION['orgname'];?></small></a></h1>
      </div>
      <div class="menu_nav" style="margin-left:300px; ">
        <ul>
          <li ><a href="adopt.php"><span>Home Page</span></a></li>
          <li><a href="adopt.php"><span>Adopt</span></a></li>
          <li ><a href="#" class="active" ><span >Logged in as</span> <span style="background-color: orange;"> <?php echo $_SESSION['adopte-user']; ?></span></a></li>
          
          <li><a href="register.php"><span>Log out</span></a></li>
        </ul>

   
    </div>
  </div>