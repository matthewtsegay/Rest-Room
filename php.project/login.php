<?php
  session_start();
if(isset($_SESSION["login"])){
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--<script>
        function message(){
            window.alert('welcome to the login form please fill it properly!');
        }
    </script>-->
    <title>login page</title>
</head>
<body>
    <div class="container">
       <?php  /*
        if(isset($_POST["user"])){
               $email = trim($_POST["email"]);
               $password = trim($_POST["password"]);
                require_once "database.php"; 
                
                $sql ="SELECT * FROM user WHERE email='$email'";
                $result= mysqli_query($connection,$sql);
                $user=mysqli_fetch_assoc($result);
      if($user){
             if(password_verify($password,$user["password"])){
                  session_start();
                 $_SESSION["user"]="yes";
                  header("Location: index.php");
                  die();
             }
        else{
              echo "<div class='alert alert-danger'>password doesn't match</div>";
             }
            }
            else{
                echo "<div class='alert alert-danger'>email doesn't match</div>";
            }
        }*/
/*session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}*/

require_once "database.php"; // Ensure this file correctly connects to the database

$errorMessage = "";

if (isset($_POST["login"])) { // Change 'user' to 'login' to match the form submit button name
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Prepare statement to prevent SQL injection
    $stmt = $connection->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user["id"]; // Store user ID or some unique identifier in session
            header("Location: index.php");
            exit;
        } else {
            $errorMessage = "Password doesn't match.";
        }
    } else {
        $errorMessage = "Email doesn't match.";
    }
}
        ?>
         <form action="login.php" method="post">
            <legend>login</legend>
            <div class="form-group">
                <input type="email" name="email" placeholder="email"  class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="password" class="form-control">
            </div>
            <div class="form-btn">
               <input type="submit" class="btn btn-warning" name="login" value="login" >
            </div>
         </form>
         <div><p>you are not registered yet! <a href="login-register.php">Register here</a></p></div>
    </div>
</body>
</html>