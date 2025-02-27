<?php 
 session_start();
  if(isset($_SESSION["login"])){
     header("Location: login-register.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>user DASHBORD</title>
</head>
<body>
<div class="container my-5">
   <div>
      <a href="login.php" id="logout.php"class="btn btn-warning mx-400px;">logout</a><br><br>
    </div>
     <h1>rooms list</h1>
     <div>
         <a href="login-register.php" class="btn btn-primary">create client</a><br><br>
     </div>
     <table class="table">
     <thead>
        <tr>
            <th>id</th>
            <th>full_name</th>
            <th>email</th>
            <th>password</th>
            <th></th>
            <th>Action</th>
        </tr>
     </thead>
     <?php
         $hostName="localhost";
         $userName="root";
         $password="";
         $dbName="login-register";
     //connect the database with server
         $connection=new mysqli($hostName,$userName,$password,$dbName);
     //check connection
         if($connection->connect_error){
             die("ERROR:couldn't connect".$connection->connect_error);
            }  
      //read all from database table  
         $sql=" SELECT * FROM `user`";
         $result=$connection->query($sql);
         if(!$result){
            die("invalid query".$connection->error);
         }
         while($row=$result->fetch_assoc()){
             echo "
         <tbody>
            <tr>
               <td>$row[id]</td>
               <td>$row[full_name]</td>
               <td>$row[email]</td>
               <td>$row[password]</td>
                <td></td>
               <td>
                 <a href='update1.php?id=$row[id]' class='btn btn-primary'>Edit</a>
                 <a href='delete1.php?id=$row[id]' class='btn btn-danger'>Delete</a>
               </td>
             </tr>  
           </tbody>"; }
         ?>        
        </table>     
 </div>
    <div class="container my-5">
        <h1>rooms list</h1>
        <div>
            <a href="add_room.php" class="btn btn-primary">rooms list</a><br><br>
        </div>
        <table class="table">
        <thead>
           <tr>
               <th>id</th>
               <th>Room_number</th>
               <th>type</th>
               <th>price</th>
               <th>availability</th>
               <th>Action</th>
           </tr>
        </thead>
        <?php
            $hostName="localhost";
            $userName="root";
            $password="";
            $dbName="login-register";
        //connect the database with server
            $connection=new mysqli($hostName,$userName,$password,$dbName);
        //check connection
            if($connection->connect_error){
                die("ERROR:couldn't connect".$connection->connect_error);
               }  
         //read all from database table  
            $sql=" SELECT * FROM `guesthouse`";
            $result=$connection->query($sql);
            if(!$result){
               die("invalid query".$connection->error);
            }
            while($row=$result->fetch_assoc()){
                echo "
            <tbody>
               <tr>
                  <td>$row[id]</td>
                  <td>$row[Room_number]</td>
                  <td>$row[type]</td>
                  <td>$row[price]</td>
                  <td>$row[availability]</td>
                  <td>
                    <a href='update.php?id=$row[id]' class='btn btn-primary'>Edit</a>
                    <a href='delete.php?id=$row[id]' class='btn btn-danger'>Delete</a>
                  </td>
                </tr>  
              </tbody>"; }
            ?>        
           </table>     
    </div>
</body>
</html>






































































































