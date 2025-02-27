<?php
/*session_start();
if(isset($_SESSION["user"])){
    header("Location: index.php");
}*/
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
<nav class="navbar navbar-expand-lg p-1 bg-warning ">
      <a href="#about" target="_self" class="navbar-brand p-3">
          <h1 style="font-family: 'Times New Roman', Times, serif;"><span style="color: black;">Tigray</span> <span style="color: white;">Hotel</span></h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="main-navbar">
          <ul class="navbar-nav flex-lg-row text-center f-2">
              <li class="nav-item">
                <a class="nav-link" href="main.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
          </ul>
      </div>
 </nav>
<?php
    if (isset($_POST["submit"])){
        $fullName=$_POST["full_name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $confirmpassword=$_POST["confirmpassword"];

       $passwordhash = password_hash($password,PASSWORD_DEFAULT);

        $errors=array();

   if(empty($fullName) OR empty( $email) OR empty($password) OR empty($confirmpassword)){
         array_push($errors,"all variables are required");
        }
   if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        array_push($errors,"the email is not validate");
        }
   if (strlen($password)<8){
         array_push($errors,"password must be at least 8 long");
        }
   if($password!==$confirmpassword){
         array_push($errors,"the pass word is not match try again");
        }
    require_once "database.php";
        $sql="SELECT * FROM user  WHERE email='$email'";
        $result=mysqli_query($connection,$sql);
        $rowcount=mysqli_num_rows($result);
    if ($rowcount>0){
           array_push($errors," email already exist!");
    }
    if(count($errors)>0){
            foreach ($errors as $error) {
              echo "<div class='alert alert-danger'>$error</div>";
      }}
      else{
               $sql="INSERT INTO user (full_name , email, password) VALUES(?, ?, ?)"; 
               $stmt=mysqli_stmt_init($connection);
               $preparestmt=mysqli_stmt_prepare($stmt,$sql);
            if($preparestmt){
               mysqli_stmt_bind_param($stmt,"sss",$fullName,$email,$passwordhash);
               mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Records inserted successfully.</div>";
              }
              else{
           die("ERROR:there is something wrong!!!");
         }
      }
   }
    ?>
    <form action=""  method="post">
      <legend>registration page</legend>
        <div  class="form-group">
           <label for="name">name:</label><br>
           <input type="text" id="name" class="form-control" name="full_name" placeholder="fullname">
        </div>
        <div  class="form-group">
           <label for="email">email:</label><br>
           <input type="email" id="passward" class="form-control" name="email" placeholder="email">
        </div>
        <div  class="form-group">
           <label for="password">password:</label><br>
           <input type="password" id="password" class="form-control" name="password" placeholder="password">
        </div>
        <div class="form-group">
           <label for="confirmpassword">confirm password:</label><br>
           <input type="password" id="confirmpassword" class="form-control"  name="confirmpassword" placeholder="confirm password">
        </div>
        <div class="form-group">
          <input  type="submit" class="btn btn-warning" name="submit" value="register">
        </div>
    </form> 
    <div><p>already registered! <a href="login.php">login here</a></p></div>
    </div>
</div>
</body>
</html>