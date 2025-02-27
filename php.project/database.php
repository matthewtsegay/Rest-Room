<?php
   $hostName="localhost";
   $userName="root";
   $password="";
   $dbName="login-register";
   
   $connection=new mysqli($hostName,$userName,$password,$dbName);

   if(!$connection){
    die("ERROR:couldn't connect".mysqli_connect_error());
   }
?>
