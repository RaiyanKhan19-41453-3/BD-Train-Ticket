<?php
    session_start();
    include("../model/db.php");
    if(!isset($_SESSION["user"]))
    {
        header("Location: ../view/first_page.php");
    }

    if(isset($_POST["password"]))
    {
        $mydb = new db();
        $connobj = $mydb->openCon();
        $result = $mydb->updateUserPassword("users", $_SESSION['user'], $_POST["password"], $connobj);
        if($result == "Pasword Updated")
        {
            $_SESSION['pas'] = $_POST["password"];
        }
        echo $result;
        $mydb->connClose($connobj);
    }
    
?>