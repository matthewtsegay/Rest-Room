<?php
$hostName="localhost";
 $userName="root";
 $password="";
 $dbName="login-register";
//connect the database with server
 $connection=new mysqli($hostName,$userName,$password,$dbName);

 $room_number="";
 $type="";
 $price="";
 $availability="";

 $errorMessage="";
 $successMessage="";
 if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["id"] ) && isset($_GET["submit"])){
        header("Location: index.php");
        exit;
    }
    $id=$_GET['id'];

    $sql="SELECT * FROM guesthouse WHERE id='$id' ";
    $result=$connection->query($sql);
    $row=$result->fetch_assoc();

    if(!$row){
        header("Location: index.php");
        exit; 
    }

    $room_number=$row['Room_number'];
    $type=$row['type'];
    $price=$row['price'];
    $availability=$row['availability'];
 }else{

    $id=$_POST['id'];
    $room_number=$_POST['room_number'];
    $type=$_POST['type'];
    $price=$_POST['price'];
    $availability=$_POST['availability'];
    do{
        if(empty($room_number) || empty( $type) || empty($price) || empty($availability)){
            $emptyMessage="all the fields are required";
            break;
        }
      $sql = "UPDATE guesthouse SET Room_number='$room_number', type='$type', price='$price', availability='$availability' WHERE id=$id";

        $result=$connection->query($sql);

        if(!$result){
            $errorMessage="invalid query:".$connection->error;
            break;
        }
        $successMessage="client updated correctly!";

        header("location:update.php");
        exit;

        }while(false);
      /*  header("Location: update.php");
        exit;*/
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
    <div class="container my-5">
    ?>
      <h1>new client</h1>
      <?php
      if(!empty($errorMessage)) {
          echo " 
          <div class='alert alert-warning alert-dismissable fade show role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'>
           </div>
          ";
      }
          ?>
          
     <form  action="update.php" method="post">
     <legend> update data</legend>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
     <div class="form-group">
         <label for="roomno">room_number:</label><br>
         <input type="number" name="room_number" id="roomno" placeholder="room_number" class="form-control" value="<?php echo  $room_number; ?>">
     </div>
     <div>
         <label for="type">type:</label><br>
          <select name="type" id="type">
             <option value="single">single</option>
             <option value="double">double</option>
             <option value="vip">vip</option>                   
          </select>
     </div>   
   <div class="form-group">
        <label for="price">price:</label><br>
        <input type="number" name="price" id="price" placeholder="Enter price" class="form-control" value="<?php echo $price; ?>">
    </div>
    <div class="form-group">
         <label for="availability">availability:</label><br>
        <input type="boolean" id="availability" name="availability" class="form-control" value="<?php echo $availability; ?>">
    </div>
    <?php
       if(!empty($successMessage)){
         echo " 
            <div class='row mb-3'>
             <div>
             <div class='alert alert-success alert-dismissable fade show role='alert'>
               <strong>$successMessage</strong>
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'>
              </div> 
             </div>
         </div>";
       }
    ?>
    <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
          <button type="submit" name="submit" class="btn btn-primary">submit</button>
        </div>
        <div class="col-sm-3 d-grid">
            <a href="index.php" class="btn btn-outline-warning" role="button">cancel</a>
       </div>
    </div>
   </form>
 <div>
</div>
</body>
 </html>





















