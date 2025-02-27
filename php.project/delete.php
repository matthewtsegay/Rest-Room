<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];

        $hostName="localhost";
        $userName="root";
        $password="";
        $dbName="login-register";
//check the connection
        $connection=new mysqli($hostName,$userName,$password,$dbName);

        $sql="DELETE FROM guesthouse WHERE id='$id'";
        $connection->query($sql);

    }
  header("Location: index.php");
  exit;
?>