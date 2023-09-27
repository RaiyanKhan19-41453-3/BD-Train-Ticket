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
    $result = $mydb->searchTicket("ticket", $_POST["ticketid"], $_POST['userid'], $connobj);
    
    $count = mysqli_num_rows($result);

    if($count>0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "It is Legit. Infos are down below,"."<br><br>";
            echo "Ticket ID: ".$row["ticket_id"]."<br>";
            echo "From: ".$row["_from"]."<br>";
            echo "To: ".$row["_to"]."<br>";
            echo "Date: ".$row["_date"]."<br>";
            echo "Quantity: ".$row["Printed"];
        }
    }
    else
    {
        echo "You did not buy the ticket id you mentioned";
    }

    $mydb->connClose($connobj);
?>