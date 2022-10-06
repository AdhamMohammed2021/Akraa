<?php   
   $error_fields = array();
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
       //validation 
       if(!(isset($_POST['bk_t'])&&!empty($_POST['bk_t']))){ 
           $error_fields[]="bk_t";
       }
       if(!(isset($_POST['a_n'])&&!empty($_POST['a_n']))){ 
           $error_fields[]="a_n";
       }
       if(!(isset($_POST['ed'])&&!empty($_POST['ed']))){ 
        $error_fields[]="ed";
       }
       if(!(isset($_POST['su_da'])&&!empty($_POST['su_da']))){ 
        $error_fields[]="su_da";
       } 
       if(!(isset($_POST['L_id'])&&!empty($_POST['L_id']))){ 
        $error_fields[]="L_id";
       } 
       // connect to db
include("connection.php");
$book_title = mysqli_escape_string($conn,$_POST['bk_t']);
$author_name = mysqli_escape_string($conn,$_POST['a_n']);
$edition = $_POST['ed'];
$submission_date = $_POST['su_da'];
$librarian_id = $_POST['L_id'];

$query ="INSERT INTO books(book_title,author_name,edition,submission_date,LiId) 
VALUES('$book_title','$author_name','$edition','$submission_date','$librarian_id');";
if(mysqli_query($conn,$query)==true){
    $last_id_doc = mysqli_insert_id($conn);
    header("Location:modification books.php");
    exit;
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
        <link rel="stylesheet" href="Css/add book.css"> 
    </head>
    <body>
        <header>
            <div class="menu-btn"><img src="img/4200ce3585a2d2565b334ce1c0a9df53s.jpg">  </div>
            <div class="navigation">
              <div class="navigation-items">
               <div class="btns">
               
      <a class="btn1" href="index.html  "><i class="fa fa-home"></i> Home</a>
      <a class="btn1" href="Admin Login.php"><i class="fa fa-folder"></i> Administration</a>
      <a class="btn1" id="active" href="#"><i class="fa fa-book"></i> Add Books</a>
      <a class="btn1" href="modification books.php"><i class="fa fa-edit"></i> Edit Book</a>
              </div>
            </div>
          </header>
        <div id="tsparticles"></div>
        <form method="post" >
        <h3>Add New Book</h3>

        <label for="bk_t">Book Title</label>
        <input type="text" placeholder="Book Title" name="bk_t" id="bk_t"><?php if(in_array("bk_t",$error_fields))echo"<script>alert('please enter book title.')</script>";?>

        <label for="a_n">Author Name</label>
        <input type="text" placeholder="Author Name" name="a_n" id="a_n"><?php if(in_array("a_n",$error_fields))echo"<script>alert('please enter author name.')</script>";?>


        <label for="ed">Edition</label>
        <input type="text" placeholder="Edition of the book" name="ed" id="ed"><?php if(in_array("ed",$error_fields))echo"<script>alert('please enter edition of the book.')</script>";?>

        <label for="su_da">Submission Date</label>
        <input type="date" placeholder="Submission Date" name="su_da" id="su_da"><?php if(in_array("su_da",$error_fields))echo"<script>alert('please enter submission date.')</script>";?>

        <label for="L_id">Librarian ID</label>
        <input type="number" placeholder="Librarian Id" name="L_id" id="L_id"><?php if(in_array("L_id",$error_fields))echo"<script>alert('please enter librarian id.')</script>";?>

        <button>Confirm</button>
        
        </form>
        
       
    </body>
</html>