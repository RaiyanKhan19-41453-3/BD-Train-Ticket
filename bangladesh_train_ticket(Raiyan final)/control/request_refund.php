<?php
    session_start();
    include("../model/db.php");
    if(!isset($_SESSION["user"]))
    {
        header("Location: ../view/first_page.php");
    }
    $uname = $_SESSION['user'];

    $ticket_valid = "";
    
    $mydb = new db();
    $connobj = $mydb->openCon();
    $result = $mydb->searchTicket("ticket", $_POST["ida"], $_SESSION['user'], $connobj);
    $result2 = $mydb->searchTicket("customer_refund", $_POST["ida"], $_SESSION['user'], $connobj);
    $count2 = mysqli_num_rows($result2);
    
    $count = mysqli_num_rows($result);

    if($count>0)
    {
        while($row = $result->fetch_assoc())
        {
            $d = $row["_date"];

            $entered_year = date('Y',strtotime($d));
            $entered_month = date('m',strtotime($d));
            $entered_date = date('d',strtotime($d));
            $entered_days = ($entered_year-1)*365 + ($entered_month-1)*30 + $entered_date;

            $current_year = date('Y');
            $current_month = date('m');
            $current_date = date('d');
            $current_days = ($current_year-1)*365 + ($current_month-1)*30 + $current_date;

            $difference_in_days = $entered_days - $current_days;

            if($count2>0)
            {
                echo "get out";
            }
            else if($entered_days>=$current_days)
            {
                echo "You Are Qualified to Refund"."<br><br>";
                echo "Ticket ID: ".$row["ticket_id"]."<br>";
                echo "From: ".$row["_from"]."<br>";
                echo "To: ".$row["_to"]."<br>";
                echo "Date: ".$row["_date"]."<br>";
                echo "Quantity: ".$row["Printed"];
            }
            else
            {
                echo "You are late";
            }
        }
    }
    else
    {
        echo "You did not buy the ticket id you mentioned";
    }

    $mydb->connClose($connobj);
?>