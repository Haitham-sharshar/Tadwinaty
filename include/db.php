<?php 
  $host ='localhost';
  $user ='root';
  $pass = '';
  $db ='bloger';
 
  $conn = mysqli_connect($host,$user,$pass,$db);
  $conn-> set_charset("utf8"); 