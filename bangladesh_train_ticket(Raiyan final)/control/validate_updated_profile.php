<?php
    session_start();
    include("../model/db.php");
    

    //$_POST["name"]+" "+" "$_POST["age"]+" "$_POST["address"]+" "$_POST["email"]+" "$_POST["mobile"];
    $mydb = new db();
    $connobj = $mydb->openCon();
    $user = $mydb->updateUser("users", $_SESSION['user'],$_POST["name"], $_POST["age"], $_POST["address"], $_POST["email"], $_POST["mobile"], $connobj);
    echo $user;
    $mydb->connClose($connobj);
?>