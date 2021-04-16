 <?php
session_start();

?>

<!DOCTYPE html >
<html >
<head>
<title>Organization</title>

<link href="css/organ.css" rel="stylesheet" type="text/css" />
<meta charset='utf-8'>
   <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<div id="container">
 <div id="header">
<h1> <a href="index.php "><?php echo $_SESSION['orgname'];?> Humanitarian</a></h1>
     
    <ul>
      <li><a href="index.php" class="on">Home</a></li>
      <li><a href="applicants.php">Applicants</a></li>
      <li><a href="wait.php">Waiting List</a></li>
      <li><a href="active.php">Active list</a></li>
      <li><a href="report.php">Generate Report</a></li>
     <li><a href="../index.php">Log Out</a></li>
    </ul>
  
  
   <form method="POST" action="search.php">
      <p>
        <input type="text" name="searchtext" placeholder="Enter Applicants Full Name"  required="true" />
        <input type="submit" name="searchsubmit" value="Search" class="btn" />
      </p>
    </form>
  </div>
  
  <div id="content">

<center>

  <form method="POST" action="report.php">
  
<select name="timespan" class="reportinput" id="reportinput" >
  <option > Choose time-span</option>
  <option >weekly</option>
  <option >monthly</option>
  <option >yearly</option>
</select>
 

<input type="submit" name="submit" value="Generate" class="reportinput">
</form>
       
</center>


<?php

  include 'connection.php';
 $name= $_SESSION['orgname'];


if(isset($_POST['submit'])){

    $timespan=$_POST['timespan'];

     $orgname=$_SESSION['orgname'];





if($timespan=="weekly"){?>

<table class="table ">
    <thead>
      <tr>
        <th>No. Of Applicants</th>
        <th>Monetary Donations</th>
        <th>No. Of Appointments</th>
        <th>Memberships $$</th>
        <th>Sponserships $$</th>
       
      </tr>
    </thead>
    <tbody>
    <tr>  
  
<?php 

$query1 = "select * from hum_organization where Org_Name ='$name'";
$result1=mysqli_query($conn,$query1);

  while($rows = mysqli_fetch_assoc($result1)){ 
    $cno = $rows['CNO'];
}  ?>



<?php

           $queryu= "select * from users where CNO='$cno' ";
$resultu=mysqli_query($conn,$queryu);
 while($rows = mysqli_fetch_assoc($resultu)){ 
 $uid = $rows['U_Id']; 


         
        $queryapp= "select * from applicant where U_Id ='$uid' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()";

$resultapp =mysqli_query($conn,$queryapp);
$checkapp =mysqli_num_rows($resultapp);


if($checkapp){
  while($rows = mysqli_fetch_assoc($resultapp)){ 
  
 $data[] = $rows['App_FName'];
   
}  }
          $datad= array();
          $queryd = "select * from monetary_donator  where CNO='$cno' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()";

$resultd=mysqli_query($conn,$queryd);
$checkd =mysqli_num_rows($resultd);

if($checkd){
while($rows = mysqli_fetch_assoc($resultd)){ 

 $datad[] = $rows['amount'];

} }


          $dataapo= array();
          $queryapo1= "select * from adopte_user where U_Id='$uid'";

$resultapo1=mysqli_query($conn,$queryapo1);
while($rows = mysqli_fetch_assoc($resultapo1)){
    $auid= $rows['AU_Id'];

            $queryapo2 = "select * from appointment  where AU_Id='$auid' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()";
$resultapo2=mysqli_query($conn,$queryapo2);
$checkapo =mysqli_num_rows($resultapo2);

if($checkapo){
while($rows = mysqli_fetch_assoc($resultapo2)){ 

$dataapo[] = $rows['fullname'];

        } 
         }
           }

           $datam= array();
           $querym= "select * from member where U_Id='$uid' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()";

$resultm=mysqli_query($conn,$querym);
$checkm =mysqli_num_rows($resultm);

if($checkm){
 while($rows = mysqli_fetch_assoc($resultm)){ 

     $datam[] = $rows['amount']; 

      }
        }
   

          $datas= array();
           $querys= "select * from sponsor where U_Id='$uid' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()";
           
$results=mysqli_query($conn,$querys);
$checks =mysqli_num_rows($results);

if($checks){
while($rows = mysqli_fetch_assoc($results)){ 

     $datas[] = $rows['people_number']; 

            } 
              } 
    } 
     ?>




      <td>  

   </br> </br> <b><?php echo" Total = ".count($data) ;?> </b> </br> </br>
<?php       
        foreach ($data  as $value){ ?>  
                
                  <table>

                    <tr>
                      <?php echo $value; ?> 

                   </tr></table>   <?php  }?>
     </td>

     <td>

<b><?php echo" Total = ".array_sum($datad)." birr" ;?> </b> </br> </br>     
<?php 

        foreach ($datad as $datadonor){ ?>
                 
                  <table><tr>
                  <?php echo  $datadonor."birr"; ?>  
                
                 </tr></table>   <?php    }?> 
    </td>
    
     <td>            
 <b><?php echo" Total = ".count($dataapo)." people" ;?> </b> </br> </br>
<?php
       foreach ($dataapo as $dataappointment){?>
                
                  <table><tr>
               <?php echo  $dataappointment; ?>  

                 </tr></table>      <?php }?> 
     </td>

     <td> 
<b><?php echo" Total = ".array_sum($datam)." birr" ;?> </b> </br> </br>  

 <?php                     
        foreach ($datam as $datamember){?>
                
                  <table><tr>
                     <?php echo  $datamember."birr"; ?>  

                </tr></table>    <?php }?>

     </td>

       <td>
<b><?php echo" Total = ".array_sum($datas)." number of people sponsored " ;?> </b> </br> </br> 
<?php                  
        foreach ($datas as $datasponsor){?>
                
                    <table><tr>
                
                   <?php echo $datasponsor; ?>

                    </tr></table>     <?php } ?>

      </td>

                    </tr>
                    </tbody>
                    </table>
<?php  }

elseif($timespan=="monthly"){?>

<table class="table ">
    <thead>
      <tr>
        <th>No. Of Applicants</th>
        <th>Monetary Donations</th>
        <th>No. Of Appointments</th>
        <th>Memberships $$</th>
        <th>Sponserships $$</th>
       
      </tr>
    </thead>
    <tbody>
      
  
<?php 

$query2 = "select * from hum_organization where Org_Name ='$name'";
$result2=mysqli_query($conn,$query2);

  while($rows = mysqli_fetch_assoc($result2)){ 
    $cno = $rows['CNO'];
}  

           $queryum= "select * from users where CNO='$cno' ";
$resultum=mysqli_query($conn,$queryum);
 while($rows = mysqli_fetch_assoc($resultum)) { 
 $uid = $rows['U_Id']; ?>


 <?php

       
        $queryapplm= "select * from applicant where U_Id ='$uid'  AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() ";

$resultapplm=mysqli_query($conn,$queryapplm);
  while($rows = mysqli_fetch_assoc($resultapplm)){ 
  
  $dataapplm[] = $rows['App_FName'];
        
}
          $datadm= array();
          $querydm = "select * from monetary_donator  where CNO='$cno' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";

$resultdm=mysqli_query($conn,$querydm);
$checkdm =mysqli_num_rows($resultdm);

if($checkdm){
while($rows = mysqli_fetch_assoc($resultdm)){ 

 $datadm[] = $rows['amount'];

} }

          $dataapom= array();
          $queryapo1m= "select * from adopte_user where U_Id='$uid'";

$resultapo1m=mysqli_query($conn,$queryapo1m);
while($rows = mysqli_fetch_assoc($resultapo1m)){
    $auid= $rows['AU_Id'];

            $queryapo2m = "select * from appointment  where AU_Id='$auid' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";
$resultapo2m=mysqli_query($conn,$queryapo2m);
$checkapom =mysqli_num_rows($resultapo2m);

if($checkapom){
while($rows = mysqli_fetch_assoc($resultapo2m)){ 

$dataapom[] = $rows['fullname'];

        } 
         }
           }

           $datamm= array();
           $querymm= "select * from member where U_Id='$uid' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";

$resultmm=mysqli_query($conn,$querymm);
$checkmm =mysqli_num_rows($resultmm);

if($checkmm){
 while($rows = mysqli_fetch_assoc($resultmm)){ 

     $datamm[] = $rows['amount']; 

      }
        }
   

          $datasm= array();
           $querysm= "select * from sponsor where U_Id='$uid' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";
           
$resultsm=mysqli_query($conn,$querysm);
$checksm =mysqli_num_rows($resultsm);

if($checksm){
while($rows = mysqli_fetch_assoc($resultsm)){ 

     $datasm[] = $rows['people_number']; 

            } 
              } 
    }
   ?>


  <tr>


      <td>  
  </br></br>      <b><?php echo" Total = ".count($dataapplm);?> </b> </br> </br> 
<?php         
        foreach ($dataapplm as $dataapplicant){ ?>  
                
                  <table><tr>
                    <?php echo $dataapplicant; ?> 
                   </tr></table>   <?php  }?>
     </td>



     <td>
      <b><?php echo" Total = ".array_sum($datadm)." birr" ;?> </b> </br> </br> 
<?php   
        foreach ($datadm as $datadonor){ ?>
                 
                  <table><tr>
                  <?php echo  $datadonor."birr"; ?>  
                
                 </tr></table>   <?php    }?> 
    </td>
    
     <td> 
     <b><?php echo" Total = ".count($dataapom)." people" ;?> </b> </br> </br>            

<?php
       foreach ($dataapom as $dataappointment){?>
                
                  <table><tr>
               <?php echo  $dataappointment; ?>  

                 </tr></table>      <?php }?> 
     </td>

     <td> 
      <b><?php echo" Total = ".array_sum($datamm)." birr" ;?> </b> </br> </br> 
 <?php                     
        foreach ($datamm as $datamember){?>
                
                  <table><tr>
                     <?php echo  $datamember."birr"; ?>  

                </tr></table>    <?php }?>

     </td>

       <td>
        <b><?php echo" Total = ".array_sum($datasm)." number of people sponsored" ;?> </b> </br> </br> 

<?php                  
        foreach ($datasm as $datasponsor){?>
                
                    <table><tr>
                
                   <?php echo $datasponsor; ?>

                    </tr></table>     <?php } ?>

      </td>

                    </tr>
                    </tbody>
                    </table>
<?php }

elseif($timespan=="yearly"){?>

<table class="table ">
    <thead>
      <tr>
        <th>No. Of Applicants</th>
        <th>Monetary Donations</th>
        <th>No. Of Appointments</th>
        <th>Memberships $$</th>
        <th>Sponserships $$</th>
       
      </tr>
    </thead>
    <tbody>
      
  
<?php 
$query3 = "select * from hum_organization where Org_Name ='$name'";
$result3=mysqli_query($conn,$query3);

  while($rows = mysqli_fetch_assoc($result3)){ 
    $cno = $rows['CNO'];
}  ?>



<?php

           $queryuy= "select * from users where CNO='$cno' ";
$resultuy=mysqli_query($conn,$queryuy);
 while($rows = mysqli_fetch_assoc($resultuy)) { 
 $uid = $rows['U_Id']; ?>


 <?php

      
        $queryapply= "select * from applicant where U_Id ='$uid' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW()";

$resultapply=mysqli_query($conn,$queryapply);
  while($rows = mysqli_fetch_assoc($resultapply)){ 
  
 $dataapply[] = $rows['App_FName'];
        
}
          $datady= array();
          $querydy = "select * from monetary_donator  where CNO='$cno' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW()";

$resultdy=mysqli_query($conn,$querydy);
$checkdy=mysqli_num_rows($resultdy);

if($checkdy){
while($rows = mysqli_fetch_assoc($resultdy)){ 

 $datady[] = $rows['amount'];

} }

          $dataapoy= array();
          $queryapo1y= "select * from adopte_user where U_Id='$uid'";

$resultapo1y=mysqli_query($conn,$queryapo1y);
while($rows = mysqli_fetch_assoc($resultapo1y)){
    $auid= $rows['AU_Id'];

            $queryapo2y = "select * from appointment  where AU_Id='$auid' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW()";
$resultapo2y=mysqli_query($conn,$queryapo2y);
$checkapoy =mysqli_num_rows($resultapo2y);

if($checkapoy){
while($rows = mysqli_fetch_assoc($resultapo2y)){ 

$dataapoy[] = $rows['fullname'];

        } 
         }
           }

           $datamy= array();
           $querymy= "select * from member where U_Id='$uid' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW()";

$resultmy=mysqli_query($conn,$querymy);
$checkmy =mysqli_num_rows($resultmy);

if($checkmy){
 while($rows = mysqli_fetch_assoc($resultmy)){ 

     $datamy[] = $rows['amount']; 

      }
        }
   

          $datasy= array();
           $querysy= "select * from sponsor where U_Id='$uid' AND CURRENT_DATE() BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW()";
           
$resultsy=mysqli_query($conn,$querysy);
$checksy =mysqli_num_rows($resultsy);

if($checksy){
while($rows = mysqli_fetch_assoc($resultsy)){ 

     $datasy[] = $rows['people_number']; 

            } 
              } 
    } ?>


<tr>


      <td> 
 </br></br> <b><?php echo" Total = ".count($dataapply) ;?> </b> </br> </br>  
<?php         
        foreach ($dataapply as $dataapplicant){ ?>  
                
                  <table><tr>
                      <?php echo $dataapplicant; ?> 
                   </tr></table>   <?php  } ?>
     </td>

     <td>
      <b><?php echo" Total = ".array_sum($datady)." birr" ;?> </b> </br> </br> 
<?php   
        foreach ($datady as $datadonor){ ?>
                 
                  <table><tr>
                  <?php echo  $datadonor."birr"; ?>  
                
                 </tr></table>   <?php    }?> 
    </td>
    
     <td>            
<b><?php echo" Total = ".array_sum($dataapoy)." people" ;?> </b> </br> </br> 
<?php
       foreach ($dataapoy as $dataappointment){?>
                
                  <table><tr>
               <?php echo  $dataappointment; ?>  

                 </tr></table>      <?php }?> 
     </td>

     <td> 
      <b><?php echo" Total = ".array_sum($datamy)." birr" ;?> </b> </br> </br> 
 <?php                     
        foreach ($datamy as $datamember){?>
                
                  <table><tr>
                     <?php echo  $datamember."birr"; ?>  

                </tr></table>    <?php }?>

     </td>

       <td>
<b><?php echo" Total = ".array_sum($datasy)." number of people sponsored" ;?> </b> </br> </br> 
<?php                  
        foreach ($datasy as $datasponsor){?>
                
                    <table><tr>
                
                   <?php echo $datasponsor; ?>

                    </tr></table>     <?php } ?>

      </td>

                    </tr>
                    </tbody>
                    </table>
<?php }


        } 
         ?>
   
  </div>
  </div>

</div>
</body>
</html>

