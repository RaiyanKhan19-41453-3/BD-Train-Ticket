<?php
    session_start();
    include("../model/db.php");

    $mydb = new db();
    $connobj = $mydb->openCon();
    
    $result2 = $mydb->insertRefund("customer_refund", $_POST["ticketid"], $_SESSION['user'], $connobj);
    echo "Request Submitted Successfully";

    $mydb->connClose($connobj);
?>