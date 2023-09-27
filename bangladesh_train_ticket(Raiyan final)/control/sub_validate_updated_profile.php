<?php
    session_start();
    include("../model/db.php");
    if(!isset($_SESSION["user"]))
    {
        header("Location: ../view/first_page.php");
    }

    //$_POST["name"]+" "+" "$_POST["age"]+" "$_POST["address"]+" "$_POST["email"]+" "$_POST["mobile"];
    $mydb = new db();
    $connobj = $mydb->openCon();
    $user = $mydb->getUser("users", $_SESSION['user'], $_SESSION['pas'], $connobj);
    $count = mysqli_num_rows($user);
    if($count>0)
    {
        while($row = mysqli_fetch_assoc($user))
            {
                $name = explode(" ",$row['full_name']);
                $_SESSION["sfn"] = $name;
                $age = $row['age'];
                $_SESSION["sa"] = $name;
                $address = $row['current_address'];
                $_SESSION["sadd"] = $address;
                $email = $row['email'];
                $_SESSION["sem"] = $email;
                $mobile = $row['mobile'];
                $_SESSION["smob"] = $mobile;
            }
    }
    $mydb->connClose($connobj);
?>