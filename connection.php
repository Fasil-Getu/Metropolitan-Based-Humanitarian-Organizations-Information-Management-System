<?php
$conn=mysqli_connect("localhost","root","");

if(!$conn){
  echo " unable to connect ".mysql.error();
};
$dbconn=mysqli_select_db($conn,"project");

if($dbconn){
echo " ";
};

?>