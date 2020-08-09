<?php
    if(isset($_COOKIE["logged"])) {
        header("location: menu.php");
    }
    $dbserver = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'bookdb';    

    $con = mysqli_connect($dbserver, $dbuser, $dbpass, $db);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $query = "SELECT user from login WHERE user='" .$user . "' and password = '" .$pass."'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        header('location:menu.php');
        setcookie("logged", "logged in", time() + (86400 * 30), "/"); 
    }
    else{
        echo "<center>Username Or Password is incorrect</center>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-color: #D4F1F4;
        }
        #f{
            height: 450px;
            width: 25%;
            text-align: center;
            box-shadow: 0px 0px 5px 0px black;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: white;
        }
        #f h1{
           font-size: 48px;
           background-color: navy;
           color: white;
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
    <title>Admin Login - Bookstore</title>
</head>
<body>
    <center>
    <div id="f">
        <h1>Bookstore</h1>
        <h2>Admin Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" class="input" placeholder="Username" required> <br>
            <input type="password" name="pass" class="input" placeholder="Password" required> <br>
            <input type="submit" value="login" id="submit">
        </form>
    </div>
    </center>
</body>
</html>