

  <?php



    $conn = mysqli_connect("localhost", "root", "", "project");
      
      if(isset($_SESSION['orgname'])) {
        $name=$_SESSION['orgname'];
?>

<div class="header">
  
      <div class="logo">
       <h1><a href="indexS.php"><?php echo $name;?> &nbsp;<span>Organization</span> <small><?php echo $name;?></small></a></h1>
      </div>
      <div class="menu_nav" style="margin-left:280px; ">
        <ul>
          <li class="active"><a href="indexS.php"><span>Home Page</span></a></li>
          <li ><a href="about.php"><span>About Us</span></a></li>
          <li><a href="donation.php"><span>Donation</span></a></li>
           <li><a href="application.php"><span>Application</span></a></li>
          <li><a href="contact.php"><span>Contact Us</span></a></li>
        </ul>

        <button>
          <a href="http://localhost/proj/index.php"> Back to previous page</a>
        </button>
         
     
    </div>
  </div>

<?php }