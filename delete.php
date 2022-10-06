<?php
include("connection.php");   
$bId = $_GET['bId'];

$sql = "DELETE FROM books WHERE bId = '$bId';";
$data = mysqli_query($conn,$sql);

$sql = "DELETE FROM sold_books WHERE bId = '$bId';";
$data = mysqli_query($conn,$sql);
if($data)
{
    header("Location:modification books.php");
    exit;
}
else
{
    echo "<font color ='red'>Failed Record From Database";
}
mysqli_close($conn);
?>