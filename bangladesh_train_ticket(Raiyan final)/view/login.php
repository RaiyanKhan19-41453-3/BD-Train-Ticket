<?php
   include("../control/loginprocess.php");
?>
<html>
    <head>
    <link rel="stylesheet" href="../css/mycss.css">
        <title>
            
        </title>
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <fieldset class = "form form_reg">
                <legend><b>Please provide information</b></legend><br>
                <table>
                    <tr>
                        <td>User Name or Email : </td>
                        <td><input type="text" name = "username"></td>
                    </tr>
                    <tr>
                        <td>Password : </td>
                        <td><input type="password" name = "pass"></td>
                    </tr>
                    <tr>
                        
                    </tr>
                </table>
                <input type="submit" name = "login" value = "LOG IN" class = "button_reg">
                        <?php echo $msg ?>
            </fieldset>
        </form>
        <fieldset class="form form_advice">
            <legend><b>CONTENTS</b></legend>
            <table>
                <tr>
                    <td>
                        <H2>CONTACT US</H2>
                        <h3>Owner Phone : 01111111111</h3>
                        <h3>Email : web@gmail.com</h3>
                        <h3>Admin Phone : 0222222222</h3>
                    </td>
                    <td>-------</td>
                    <td>
                        <img src="../t38w9p.jpg" alt="Train" width="400" height="230">
                    </td>
                    <td>--------</td>
                    <td>
                        <h2>WHY THIS WEBSITE???</h2>
                        <H3>1. It's easy to use.</H3>
                        <h3>2. Don't need to wait in a long line.</h3>
                        <h3>3. You are reminded of the availabilty.</h3>
                    </td>
                </tr>
            </table>    
        </fieldset>
    </body>
</html>