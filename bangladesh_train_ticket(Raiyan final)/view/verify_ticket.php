<?php
    session_start();
?>
<html>
    <head><link rel="stylesheet" href="../css/mycss.css"><title></title></head>
    <body>
        <h1>Ticket Verification</h1>
        <h3>Try write "unknown" if it isn't recognizing User id, if it fails then the ticket isn't real</h3>
        <table class = "form form_verify">
            <tr></tr>
            <tr>
                <td>Other Ticket ID</td>
                <td><input type="text" name= "other_ticket_id" id = "other_ticket" onkeyup = "testingId()"></td>
            </tr>
            <tr>
                <td>Other User ID</td>
                <td><input type="text" name= "other_user_id" id = "other_user" onkeyup = "testingId()"></td>
            </tr>
        </table>
        <p id = "other_user_id_error" class ="form"></p>
        <script src="../js/myjs.js"></script>
    </body>
</html>