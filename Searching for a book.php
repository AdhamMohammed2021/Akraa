<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `books` WHERE CONCAT(`bId`, `book_title`, `author_name`, `edition`, `submission_date`, `LiId`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `books`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost","Adham","root","akr2");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Searching for a book</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
           
            body
            {
                background-image: url('img/reservation.jpg');
                height:96hv;
                width:97wv;
                background-repeat:no-repeat;
                background-size: 100%;
	            background-position:center;
                margin-top: 10%;
                margin-bottom:10%;
                
            }
            table
            {
                background-color:black;
                color:white;
                border-radius:20px;
                margin:  auto;
                padding: 40px;
            }
            table th{
                text-align:center;
                padding:10px;
            }
            table tr td{
                text-align:center;
                padding:10px;
            }
            h1{
                text-align:center;
                font-size:64px;
                
                text-shadow: 2px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
            }
            input[type="text"]{
				cursor: pointer;
                position: absolute;
                left: 42%;
                width:200px;
                height: 30px;
               padding-bottom: 10px;
               color:white;
                background-color: #000;
                border-color: #000;
                border-radius: 5px;
                top:7%;
                margin-bottom: 8px;
                font-size: 14px;
                font-weight: 300;
			}
            input[type="submit"]{
                background-color:green;
                position: absolute;
                left: 45%;
                top:17%;
                color:white;
                width:130px;
                font-size:18px;
                height:35px;
            }
            .btn1{
  margin-left:20px;
  float:right;
  text-decoration:none;
    color:#fff;
    font-size: 29px;
    font-weight: 500;
    padding: -1px 5%;
    font-weight:bold;
    border-radius: 2px;
    margin:-60px 5px;
    transition:  0.4s;
    border-bottom: 2px solid transparent;
    font-weight: bolder;
}
.btn1:hover{
  color:#1abc9c;
       
  }
        </style>
    </head>
    <body>
    
    <a class="btn1" href="index.html">exit<i class="fa fa-power-off"></i></a>

    <form action="Searching for a book.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Author Name</th>
                <th>Edition</th>
                <th>Submission Date</th>
                <th>Librarian ID</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['bId'];?></td>
                    <td><?php echo $row['book_title'];?></td>
                    <td><?php echo $row['author_name'];?></td>
                    <td><?php echo $row['edition'];?></td>
                    <td><?php echo $row['submission_date'];?></td>
                    <td><?php echo $row['LiId'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
        
    </body>
</html>