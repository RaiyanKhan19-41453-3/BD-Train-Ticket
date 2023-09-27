<?php 
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("Location: ../view/first_page.php");
    }
?>
<html>
    <head><link rel="stylesheet" href="../css/mycss.css">
        <title></title>
    </head>

    <body>
        <h1>Ticket History</h1>
        <hr>
        <table id = "ticket_table" class ="form form_history">
            <thead class = "">
                <tr class = "">
                    <th class = "">Date of Journey</th>
                    <th class = "">From</th>
                    <th class = "">TO</th>
                    <th class = "">Ticket ID</th>
                    <th class = "">Quantity</th>
                    <th class = "">Printed</th>
                </tr>
            </thead>
            
            <tbody id = "ticket_body" class = "">

            </tbody>
        </table>
        <button onclick = "getajax()" value="Show More Tickets" class = "button_reg histoy_button">Show More Tickets</button>
        <p id = "ticket_count">5</p>
        <script src="../js/myjs.js"></script>
    </body>
</html>