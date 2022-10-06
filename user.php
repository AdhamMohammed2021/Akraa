<?php
$error_fields = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //validation 
    if(!(isset($_POST['name'])&&!empty($_POST['name']))){ 
        $error_fields[]="name";
    }
    if(!(isset($_POST['age'])&&!empty($_POST['age']))){ 
      $error_fields[]="age";
    }
    if(!(isset($_POST['phone'])&&!empty($_POST['phone']))){ 
        $error_fields[]="phone";
    }
    // connect to db
include("connection.php");
$name = mysqli_escape_string($conn,$_POST['name']);
$age = $_POST['age'];
$phone = $_POST['phone'];

$query = "INSERT INTO users(name,age,phone)VALUES('$name','$age','$phone');";
if(mysqli_query($conn,$query)==true){
    $last_id_doc = mysqli_insert_id($conn);
    header("Location:Searching for a book.php");
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
        <link rel="stylesheet" href="Css/user.css"> 
    </head>
    <body>
        <header>
            <div class="menu-btn"><img src="img/4200ce3585a2d2565b334ce1c0a9df53s.jpg">  </div>
            <div class="navigation">
              <div class="navigation-items">
               <div class="btns">
               
      <a class="btn1"  href="index.html  "><i class="fa fa-home"></i> Home</a>
      <a class="btn1"  href="Admin Login.php"><i class="fa fa-folder"></i> Administration</a>
      <a class="btn1" id="active" href="#"><i class="fa fa-user"></i> User</a>
      <a class="btn1"  href="Searching for a book.php "><i class="fa fa-search"></i> Searching for a book</a>
              </div>
            </div>
          </header>
        <div id="tsparticles"></div>
        <form method="post" >
            <h3>Sign Up As User</h3>
    
            <label for="name">Name</label>
            <input type="text" placeholder="Name" name="name" id="name"><?php if(in_array("name",$error_fields))echo"<script>alert('please enter name.')</script>";?>
    
            <label for="age">Age</label>
            <input type="number" placeholder="Age" name="age" id="age"><?php if(in_array("age",$error_fields))echo"<script>alert('please enter age.')</script>";?>

            <label for="phone">Phone</label>
            <input type="phone" placeholder="Phone" name="phone" id="phone"><?php if(in_array("phone",$error_fields))echo"<script>alert('please enter phone number.')</script>";?>
    
            <button>Registration</button>
            
            </form>
        </body>
        </html>