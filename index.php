<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        #header{
            width: 100%;
            height: 80px;
            float: left;
            background-color: navy;
        }
        h1{
           font-size: 48px;
           background-color: navy;
           color: white;
        }
        #container{
        }
        .button{
            float: left;
        }
        #left{
            float: left;
        }
        #right{
            padding-top: 20px;
            padding-right: 30px;
            float: right;
            color: white;
        }
    </style>
    <title>Admin Menu</title>
</head>
<body>
    <div id="header">
        <div id="left">
            <h1>Bookstore</h1>
        </div>
        <a href="index.html">
        <div id="right">
            Home
        </div>
        </a>
    </div>

    <div id="container">
        <h2>Books</h2>
        <?php 
        
        $dbserver = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $db = 'bookdb';    
    
        $con = mysqli_connect($dbserver, $dbuser, $dbpass, $db);


        $sql = "SELECT * FROM books";

        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            
                while ($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $name = $row['bname'];
                    $author = $row['author'];
                    $publisher = $row['publisher'];
                    $price = $row['price'];
                    ?>
                    <div class="button">
                        <?php
                    echo " ID:". $id."  <br>Name:". $name ."<br> Author: ".$author ."<br> Publisher:". $publisher ."<br> Price:". $price ."<br> <hr>";

                }


        }

        ?> </div>
    </div>
   
</body>
</html>