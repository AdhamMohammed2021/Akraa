<?php
include("connection.php"); 
error_reporting(0);
$bId             = $_GET['bId'];
$book_title      = $_GET['book_title'];
$author_name     = $_GET['author_name'];
$edition         = $_GET['edition'];
$submission_date = $_GET['submission_date'];
$librarian_id    = $_GET['librarian_id'];
?>
<html>
    <head>
        <title></title>
        <style>
            table
            {
                background-color:black;
                color:white;
                border-radius:20px;
                margin:  auto;
                padding: 40px;
            }
            #button
            {
                background-color:green;
                color:white;
                height:39px;
                width:225;
                border-radius:25px;
                font-size:16px;
                margin-top:20px;
            }
            #button:hover{
                background-color:blue;
            }
            body
            {
                background:linear-gradient(red,blue);
            }
            .btn1{
                    margin-left:20px;
                    float:right;
                    text-decoration:none;
                    color:#000;
                    font-size: 29px;
                    font-weight: 500;
                    padding: -1px 5%;
                    font-weight:bold;
                    border-radius: 2px;
                    margin:0 5px;
                    transition:  0.4s;
                    border-bottom: 2px solid transparent;
                    font-weight: bolder;
                }
            .btn1:hover{
            color:#1abc9c;
            }
            input
            {
                width:225;
                border-top: none;
                border-left: none;
                border-right: none;
                outline: none;
                background: transparent;
                color:#fff;
                border-bottom: 2px solid #3399ff;
            }
            td{
                padding: 5px;
                
            }
        </style>
    </head>
    <body>
    <a class="btn1" href="modification books.php"><i class="fa fa-back"></i> Back</a>

        <br><br><br><br><br><br><br>
        
        <form action="" method="GET">
            <table border:"0" bgcolor:"black" align:"center" cellspacing:"20">
                
                <tr>
                    <td>Book ID</td>
                    <td><input type="hidden" value="<?php echo "$bId"?>" name="bId"></td>
                </tr>
                <tr>
                    <td>Book Title</td>
                    <td><input type="text" value="<?php echo "$book_title"?>" name="book_title" required></td>
                </tr>
                <tr>
                    <td>Author Name</td>
                    <td><input type="text" value="<?php echo "$author_name"?>" name="author_name" required></td>
                </tr>
                <tr>
                    <td>Edition</td>
                    <td><input type="text" value="<?php echo "$edition"?>" name="edition"></td>
                </tr>
                <tr>
                    <td>Submission Date</td>
                    <td><input type="date" value="<?php echo "$submission_date"?>" name="submission_date"></td>
                </tr>
                <tr>
                    <td>Librarian ID</td>
                    <td><input type="number" value="<?php echo "$librarian_id"?>" name="librarian_id"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" id="button" name="submit"  value="Update Details"></td>
                </tr>
        </form>
            </table>
    </body>
</html>    
<?php
    if($_GET['submit']) 
    {
        $bId             = $_GET['bId'];
        $book_title      = $_GET['book_title'];
        $author_name     = $_GET['author_name'];
        $edition         = $_GET['edition'];
        $submission_date = $_GET['submission_date'];
        $librarian_id    = $_GET['librarian_id'];
        $sql = "UPDATE books SET bId='$bId', book_title='$book_title',author_name='$author_name',edition='$edition',submission_date='$submission_date',LiId='$librarian_id' WHERE bId='$bId' ;";
        $data = mysqli_query($conn,$sql);
        if($data){
            echo "<script>alert('Record Updated')</script>";
        }
        else{
            echo "Failed To Update Record";
        }
    }    

?>