<?php
error_reporting(0);
$error_fields = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //validation 
    if(!(isset($_POST['username'])&&filter_input(INPUT_POST,'username',FILTER_VALIDATE_EMAIL))){
        $error_fields[]="username";
    }
    if(!(isset($_POST['password']))){
        $error_fields[]="password";
    }
    if(!$error_fields){
        // connect to db
        include("connection.php");
        $user = mysqli_escape_string($conn,$_POST['username']);
        $pass = $_POST['password'];
        $query = "SELECT * FROM librarian  WHERE user_name='$user' AND pass ='$pass';";
        $result = mysqli_query($conn,$query);
        $row=mysqli_fetch_array($result);
        if($row['user_name']==$user && $row['pass']==$pass){
           
            header("location:add book.php"); 
            exit;
        }
        else{
           
            echo"<script>alert('Invalid login.')</script>";
            
        }
        mysqli_close($conn);
        }}

        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="Css/Admin Login.css"> 
    </head>
    <body>
        <header>
            <div class="menu-btn"><img src="img/4200ce3585a2d2565b334ce1c0a9df53s.jpg">  </div>
            <div class="navigation">
              <div class="navigation-items">
               <div class="btns">
               
      <a class="btn1" href="index.html  "><i class="fa fa-home"></i> Home</a>
      <a class="btn1" id="active" href="#"><i class="fa fa-folder"></i> Administration</a>
      <a class="btn1"  href="user.php"><i class="fa fa-user"></i> User</a>

              </div>
            </div>
          </header>
        <div id="tsparticles"></div>
        <form method="post" >
        <h3>Login As Admin</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email " name="username" id="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" id="password">

        <button>Log In</button>
        <div class="social">
            <p>Don't Have Account?</p>
            <div class="fb" > <a href="Admin sign up.php">Sign Up</a></div>
        </div>
        </form>
        
       
    </body>
</html>