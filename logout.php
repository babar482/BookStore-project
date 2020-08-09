<?php
    if(isset($_COOKIE["logged"])) {
        setcookie("logged", "logged in", time() - 86400, "/"); 
        header("location: menu.php");
    }
?>