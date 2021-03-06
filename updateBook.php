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
         $id = intval($_POST['id']);
         $name = $_POST['name'];
         $author = $_POST['author'];
         $publisher = $_POST['publisher'];
         $price = floatval($_POST['price']);

         $sql = "UPDATE books SET bname='$name', author='$author',publisher = '$publisher', price = '$price' WHERE id='$id';";
         if(mysqli_query($con, $sql)){
            echo "Record Successfully Updated";
         }else{
            echo "Enable to Update Data";
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
        
        #data{
            width: 100%;
            float:left;
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
        #form{
            margin-top: 50px;
            height: 500px;
            width: 35%;
            float:left;
            text-align: center;
            box-shadow: 0px 0px 5px 0px black;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: white;
            margin-left: 200px;
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
        <div class="button" id="clicked">
            <h3>Update Book</h3>
        </div></a>
        <a href="removeBook.php">
        <div class="button" >
            <h3>Remove Book</h3>
        </div></a>
        <a href="logout.php">
        <div class="button">
            <h3>Logout</h3>
        </div></a>

        
        <div id="form">
            <form action="" method="post">
                ID <br>
                <input type="number" name="id" class="input" required><br>
                Book Name <br>
                <input type="text" name="name" class="input" required><br>
                Book Author <br>
                <input type="text" name="author" class="input" required><br>
                Book Publisher <br>
                <input type="text" name="publisher" class="input" required><br>
                Book Price <br>
                <input type="number" step="0.01" name="price" class="input" required><br>
                <br>
                <input type="submit" value="Update Book" id="submit">
            </form>
        </div>
        
    </div>

    <div id="data">
        <?php    
    
            echo '<table border="0" cellspacing="20" cellpadding="1" style="border: 1px solid; background-color: lightgray ;margin-left:350px; margin-top:50px"> ';
            echo '<tr > 
                <td>'."ID".'</td> 
                <td>'."Book Name".'</td> 
                <td>'."Book Author".'</td> 
                <td>'."Publisher".'</td> 
                <td>'."Price".'</td> 
            
            </tr>';

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
                        
                        echo '<tr> 
                                    <td>'.$id.'</td> 
                                    <td>'.$name.'</td> 
                                    <td>'.$author.'</td> 
                                    <td>'.$publisher.'</td> 
                                    <td>'.$price.'</td> 
                                
                            </tr>';

                    }


            }

        ?>
        </div>

</body>
</html>