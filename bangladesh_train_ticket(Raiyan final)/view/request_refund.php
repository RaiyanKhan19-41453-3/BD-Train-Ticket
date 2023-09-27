<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("Location: ../view/first_page.php");
    }
    //include("../control/validating_refund.php");
?>
<html>
    <head><link rel="stylesheet" href="../css/mycss.css">
        <title></title>
    </head>
    <body>
        <h1>Refund Section</h1>
        <form action="" method="POST" enctype="multipart/form-data" onsubmit = "return refundRequestajax()">
            <table class = "form">
                <thead>
                    <th>
                        <td>Search Ticket ID :- </td>
                        <td><input type="text" name= "ticket" id = "ticketid" onkeyup = "refundajax()"></td>
                        <td><input type="submit" name = "sub" value = "Send Request" class= "search_button"></td>
                    </th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            <p id = "ticketid-error" class ="form"></p>
        </form>
        <script src="../js/myjs.js"></script>
    </body>
</html>