<?php
$error_fields = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //validation 
    if(!(isset($_POST['name'])&&!empty($_POST['name']))){ 
        $error_fields[]="name";
    }
    if(!(isset($_POST['phone'])&&!empty($_POST['phone']))){ 
        $error_fields[]="phone";
    }
    if(!(isset($_POST['username'])&&filter_input(INPUT_POST,'username',FILTER_VALIDATE_EMAIL))){
        $error_fields[]="username";
    }
    if(!(isset($_POST['password']))){
        $error_fields[]="password";
    }
    // connect to db
include("connection.php");
$name = mysqli_escape_string($conn,$_POST['name']);
$phone = $_POST['phone'];
$username = mysqli_escape_string($conn,$_POST['username']);
$password = $_POST['password'];

$query = "INSERT INTO librarian(name,phone,user_name,pass)VALUES('$name','$phone','$username','$password');";
if(mysqli_query($conn,$query)==true){
    $last_id_doc = mysqli_insert_id($conn);
    echo"<script>alert('Your account is created.')</script>";
}
else{
    echo mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="Css/Admin sign up.css"> 
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
        <h3>Sign Up As Admin</h3>

        <label for="name">Name</label>
        <input type="text" placeholder="Name" name="name" id="name"><?php if(in_array("name",$error_fields))echo"<script>alert('please enter name.')</script>";?>

        <label for="phone">Phone</label>
        <input type="phone" placeholder="Phone" name="phone" id="phone"><?php if(in_array("phone",$error_fields))echo"<script>alert('please enter phone number.')</script>";?>


        <label for="username">Username</label>
        <input type="email" placeholder="Email" name="username" id="username"><?php if(in_array("username",$error_fields))echo"<script>alert('please enter valid email.')</script>";?>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" id="password"><?php if(in_array("password",$error_fields))echo"<script>alert('please enter valid password.')</script>";?>

        <button>Sign Up</button>
        <div class="social">
            <p>I Have Already Account</p>
            <div class="fb" > <a href="Admin Login.php">Login</a></div>
        </div>
        </form>
        
       
    </body>
</html>