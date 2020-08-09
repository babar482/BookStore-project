<?php
    if(!isset($_COOKIE["logged"])) {
        header("location: admin-login.php");
    }
?>

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
            padding-top: 50px;
            padding-left: 300px;
            align-items: center;
        }
        .button{
            width: 15%;
            height: 30px;
            float: left;
            margin: 5px;
            box-shadow: 0px 0px 5px 0px black;
            padding-left: 40px;
            color: black;
        }
    </style>
    <title>Admin Menu</title>
</head>
<body>
    <div id="header">
        <h1><center>Bookstore</center></h1>
    </div>
    <div id="container">
        <a href="addBook.php"><div class="button">
            <h3>Add Book</h3>
        </div></a>
        <a href="updateBook.php">
        <div class="button">
            <h3>Update Book</h3>
        </div></a>
        <a href="removeBook.php">
        <div class="button">
            <h3>Remove Book</h3>
        </div></a>
        <a href="logout.php">
        <div class="button">
            <h3>Logout</h3>
        </div></a>
    </div>
</body>
</html>