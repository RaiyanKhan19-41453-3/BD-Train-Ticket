<?php
    session_start();
    include("../model/db.php");
    if(!isset($_SESSION["user"]))
    {
        header("Location: ../view/first_page.php");
    }

    $rem = new db();
    $remconn = $rem->openCon();

    //updating important infos
    $updateTicket = $rem->updateTicket("customer_refund", $_SESSION["user"], "user_name", $remconn);
    $updateFeedback = $rem->updateTicket("customer_feedback", $_SESSION["user"], "user_name", $remconn);
    $updateRefund = $rem->updateTicket("ticket", $_SESSION["user"], "user_name", $remconn);
    $updateBought = $rem->updateTicket("ticket_bought", $_SESSION["user"], "user_name", $remconn);

    //deleting the datas
    $removeDiscount = $rem->remove("customer_discount", $_SESSION["user"], $remconn);
    $removeUser = $rem->remove("users", $_SESSION["user"], $remconn);

    $rem->connClose($remconn);
    header("Location: ../view/first_page.php");
?>