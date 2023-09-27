<?php
    session_start();
    include("../model/db.php");
    //$_SESSION['user']

    $mydb = new db();
    $connobj = $mydb->openCon();
    $result = $mydb->showAllTicket("ticket", $_SESSION['user'], $_POST["ticket_count"], $connobj);
    $count = mysqli_num_rows($result);

    if($count>0)
    {
        while($row = $result->fetch_assoc())
        {
            $ticket_data[] = $row;
        }
        echo json_encode($ticket_data, JSON_PRETTY_PRINT);
    }

    $mydb->connClose($connobj);
?>