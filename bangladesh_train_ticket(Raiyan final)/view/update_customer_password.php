<?php
    include("../control/update_customer_password.php");
?>
<html>
    <head><link rel="stylesheet" href="../css/mycss.css">
        <title></title>
    </head>

    <body>
    <h1>Update Password</h1>
    <hr>
        <?php 
            $mydb1 = new db();
            $connobj1 = $mydb1->openCon();
            $result1 = $mydb1->getDiscount("users", $_SESSION['user'], $connobj1);
            while($row = mysqli_fetch_assoc($result1))
            {
                $_SESSION['pas'] = $row["_password"];
            }
        ?>

        <p id = "hidden_password"><?php echo $_SESSION['pas'];?></p>


        
        <form action="" method="POST" enctype="multipart/form-data" onsubmit = "return passwordForm()">
            <table class = "form form_pass">
                <tr>
                    <td>Old Password:</td>
                    <td><input type="password" name = "old_password" id = "oldpassword" onkeyup = "validOldPassword()"></td>
                    <td>
                    <p id = "oldpassword-error">

                    </p></td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name = "newpassword" id = "new_password" onkeyup = "validPassword()"></td>
                    <td>
                    <p id = "new_password-error">

                    </p>
                    </td>
                </tr>

                <tr>
                    <td>New Confirmed Password:</td>
                    <td><input type="password" name = "confirmed_pass" id = "confirmed_password" onkeyup = "validConfirmedPassword()"></td>
                    <td>
                    <p id = "confirmed_password-error">

                    </p></td>
                </tr>

                <tr>
                    <td><input type="submit" name = "Change" class = "button buttton_spacing pass_button"></td>
                    <td>
                    <p id = "form_password_error"></p></td>
                </tr>
            </table>
        </form>
        <script src="../js/myjs.js"></script>
    </body>
</html>