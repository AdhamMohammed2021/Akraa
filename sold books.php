<?php
error_reporting(0);

        // connect to db
        include("connection.php");
        $book_id = $_POST['bId'];
        $user_id = $_POST['uId'];
        $query = "INSERT INTO sold_books(bId,uId)VALUES('$book_id','$user_id');";
        
        if(mysqli_query($conn,$query)==true){
            echo"<script>alert('Registration Successfully.')</script>";
           
        }
        else{
           
            echo"<script>alert('Registration Failed.')</script>";
            
        }
        mysqli_close($conn);
    

        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="Css/sold books.css"> 
    </head>
    <body>
        <header>
            <div class="menu-btn"><img src="img/4200ce3585a2d2565b334ce1c0a9df53s.jpg">  </div>
            <div class="navigation">
              <div class="navigation-items">
               <div class="btns">
               
      
      <a class="btn1"  href="Searching for a book.php"><i class="fa fa-search"></i> Searching for a book</a>
      <a class="btn1" id="active" href="#"><i class="fa fa-book"></i> The books you searched for</a>
      <a class="btn1" href="index.html  "><i class="fa fa-logout"></i> exit</a>
              </div>
            </div>
          </header>
        <div id="tsparticles"></div>
        <form action="sold books.php" method="post" >
        <h3>Registration the searching for books</h3>

        <label for="Book ID">Book ID</label>
        <input type="number" placeholder="Book ID" name="book_id" id="book_id">

        <label for="User ID">User ID</label>
        <input type="number" placeholder="User ID" name="user_id" id="user_id">

        <button>Registration</button>
       
        </form>
        
       
    </body>
</html>