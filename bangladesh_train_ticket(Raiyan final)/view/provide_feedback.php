<?php
    //session_start();
    include("../control/feedback.php");
?>
<html>
    <head><link rel="stylesheet" href="../css/mycss.css"></head>
    <body>
        <h1>Feedback</h1>
    <fieldset class = "form">
    <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <thead>

                </thead>
                <tbody>
                    <tr>
                        <td><textarea name="comment" id="" cols="30" rows="10" class="form_comment"></textarea></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            
            <input type="submit" name = "submit_feedback" value = "Post Feddback"  class = "button_reg">
            <?php echo $writ; ?>
        </form>
        </fieldset>
        <script src="../js/myjs.js"></script>
    </body>
</html>