<html>
    <head>
        <title>Edit books</title>
        <style>
            #editbtn{
                background-color:green;
                color:white;
                width:130px;
                font-size:18px;
                height:35px;
            }
            #deletebtn{
                background-color:red;
                color:white;
                width:130px;
                font-size:18px;
                height:35px;
            }
            body
            {
                font-family: "Montserrat", sans-serif;
                background-image: url('img/reservation.jpg');
                height:96hv;
                width:97wv;
                background-repeat:no-repeat;
                background-size: 100%;
	            background-position:center;
                margin-top: 10%;
                margin-bottom:10%;
                
            }
            header{
    z-index: 999;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    box-sizing: border-box;
  
  }
  
  header .brand{
    color: #000;
    font-size: 30px;
    font-weight: 700;
    text-transform: uppercase;
    text-decoration: none;
  }
  
  header .navigation{
    position: relative;
  }
  
  header .navigation .navigation-items a{
    position: relative;
    color: #000;
    font-size: 20px;
    font-weight: 500;
    text-decoration: none;
    border-bottom: 2px solid transparent;
    font-weight: bolder;
    
  }
  
  header .btns a {
      text-decoration:none;
      color:#fff;
      padding: 15px 20px;
      font-weight:bold;
      border-radius: 2px;
      margin:0px 15 px;
      margin-right: 30px;
      transition:  0.4s;
     

  }
   #active{
      border-bottom: 2px solid #1abc9c;
      color:#1abc9c;
  }
  header .btns a:hover{
    border-bottom: 2px solid #1abc9c;
      color:#1abc9c;
  }
img{
    width:74px;
    margin-left: 30px;
   margin-top: -5px;
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
            input{
				cursor: pointer;
			}
        </style>
    </head>
    <body>
    <header>
            <div class="menu-btn"><img src="img/4200ce3585a2d2565b334ce1c0a9df53s.jpg">  </div>
            <div class="navigation">
              <div class="navigation-items">
               <div class="btns">
               
      <a class="btn1" href="index.html  "><i class="fa fa-home"></i> Home</a>
      <a class="btn1" href="Admin Login.php"><i class="fa fa-folder"></i> Administration</a>
      <a class="btn1"  href="#"><i class="fa fa-book"></i> Add Books</a>
      <a class="btn1" id="active" href="modification books.php"><i class="fa fa-edit"></i> Edit Book</a>
              </div>
            </div>
          </header>
        <h1>Books</h1>
        <table border="2" cellspacing="7">
            <tr>
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Author Name</th>
                <th>Edition</th>
                <th>Submission Date</th>
                <th>Librarian ID</th>
                <th colspan="2" align="center">Operation</th>
            </tr>
<?php
include("connection.php");
$sql = "SELECT * FROM books;";
$data = mysqli_query($conn,$sql);
$total = mysqli_num_rows($data);
if ($total!=0) {
    // output data of each row
    while($result = mysqli_fetch_assoc($data)) {  
      echo "
          <tr>
          <td>".$result['bId']. "</td>
          <td>".$result['book_title']. "</td>
          <td>".$result['author_name']. "</td>
          <td>".$result['edition']. "</td>
          <td>".$result['submission_date']. "</td>
          <td>".$result['LiId']. "</td>
          <td><a href = 'update.php?bId=$result[bId]&book_title=$result[book_title]&author_name=$result[author_name]&edition=$result[edition]&submission_date=$result[submission_date]&librarian_id=$result[LiId]'onclick='return checkeupdate()'><input type='submit' value='Edit/Update' id='editbtn'></td>
          <td><a href ='delete.php?bId=$result[bId]&book_title=$result[book_title]&author_name=$result[author_name]&edition=$result[edition]&submission_date=$result[submission_date]&librarian_id=$result[LiId]'onclick='return checkedelete()'><input type='submit' value='Delete' id='deletebtn'></td>
          </tr>
                ";

    }
  }
  else{
      echo "No Records Found";
  }
  mysqli_close($conn);
?>
        </table>
    <script>
        function checkedelete(){
            return confirm('Are You Sure You Want To Delete This Record');
        }
        function checkeupdate(){
            return confirm('Are You Sure You Want To update This Record');
        }
    </script>    
    </body>
</html>