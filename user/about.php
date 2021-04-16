<!DOCTYPE html>
<html>
<head>
<title>Userz </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


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
        <div class="article">
          <h2><span>About </span> <?php echo $_SESSION['orgname'];?> </h2>

               <?php     $orgname = $_SESSION['orgname']  ;


                  $query= "select * from hum_organization where Org_Name ='$orgname' ";

                       $result=mysqli_query($conn,$query);
                        $check=mysqli_num_rows($result);
                       if($check){
                      while($rows = mysqli_fetch_assoc($result)){   ?>

          

          <p><?php echo $rows['purpose']; ?></p>
        </div>

        <div class="article">
          <h2><span>Our</span> Mission</h2>
     

          
          <p>Providing all basic services (food, clothes, shelter, hygiene facilities, health, educational and others) to the disabled and elder people who reside in the center,
Helping the disabled and the elder people with the potential to find and retain employment and other needs to participate fully in the everyday life of society;
Helping disabled people by encouragement and example to develop their physical and mental capacities;
Networking and partnering with GOs, CSOs and other organizations to create equal opportunities and access social services for the disabled and the elder people in the effort of poverty reduction;
Conducting research on different aspects of disability as well as the elderly and providing trainings to organizations with similar objectives,
Improving public knowledge and acceptance of the capabilities, needs and problems of disabled and marginalized elder people,
Improving the education, training, rehabilitation, and employment opportunities available to all disabled and elder people in the country,
</p>


        <?php }} ?>
        </div>
      </div>

</body>
</html>
