<?php
    if(!isset($_COOKIE["logged"])) {
        header("location: admin-login.php");
    }

    $dbserver = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'bookdb';    

    $con = mysqli_connect($dbserver, $dbuser, $dbpass, $db);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $price = floatval($_POST['price']);
        
        if(is_float($price)){       
            $query = "INSERT INTO books (bname, author,publisher,price) VALUES ('$name','$author','$publisher','$price')";

            if(mysqli_query($con, $query))
            {
                echo "Record Successfully Inserted";
            }
            else
            {
            echo "Record not inserted";
            }
        }
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
        #clicked{
            background-color: coral;
        }
        #form{
            margin-top: 150px;
            height: 400px;
            width: 35%;
            text-align: center;
            box-shadow: 0px 0px 5px 0px black;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: white;
            margin-left: 200px;
        }
        .input {
            width: 80%;
            height: 40px;
            margin-bottom: 20px;
        }
        #submit{
            width: 80%;
            height: 40px;
            margin-bottom: 20px;
            background-color: #189AB4;
            font-size: 30px;
            border: 0px;
            color: red;
            border-radius: 10px;
        }
    </style>

    <title>Admin Menu</title>
</head>
<body>
    <div id="header">
        <h1><center>Bookstore</center></h1>
    </div>
    <div id="container">
        <a href="addBook.php" >
            <div class="button" id="clicked">
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


        <div id="form">
            <form action="" method="post">
                Book Name <br>
                <input type="text" name="name" class="input" required><br>
                Book Author <br>
                <input type="text" name="author" class="input" required><br>
                Book Publisher <br>
                <input type="text" name="publisher" class="input" required><br>
                Book Price <br>
                <input type="number" step="0.01" name="price" class="input" required><br>
                <br>
                <input type="submit" value="Add Book" id="submit">
            </form>
        </div>
    </div>
</body>
</html>