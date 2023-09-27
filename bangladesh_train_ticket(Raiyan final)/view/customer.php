<?php
include("../control/customer.php");
?>

<html>
    <head>
    <link rel="stylesheet" href="../css/mycss.css">
            <title>
                my page
            </title>
    </head>

    <body>
        

        <h1>Customer Registration Form</h1>
        <hr>

        <form action="" method="POST" enctype="multipart/form-data">
            <fieldset class = "form form_reg">
                <legend><b>Please provide information</b></legend><br>
                <table>
                    <tr>
                        <td>First Name:</td>
                        <td><input type = "text" name = "fname"></td>
                        <td><?php
                            echo $fullnamevalid;
                        ?></td>
                    </tr>

                    <tr>
                        <td>Last Name:</td>
                        <td><input type = "text" name = "lname">
                    </td>
                    </tr>

                    <tr>
                        <td>User Name:</td>
                        <td><input type = "text" name = "uname">
                    </td>
                    <td><?php
                            echo $uvalid;
                        ?></td>
                    </tr>

                    <tr>
                        <td>Age:</td>
                        <td><input type = "number" name = "age"></td>
                        <td>
                        <?php
                            echo $agevalid;
                        ?></td>
                    </tr>

                    <tr>
                        <td>Current Addres:</td>
                        <td><input type="text" name = "current_address"></td>
                        <td>
                        <?php
                            echo $address_valid;
                        ?></td>
                    </tr>

                    <tr>
                        <td>E-mail:</td>
                        <td><input type="text" name = "email"></td>
                        <td>
                        <?php
                            echo $evalid;
                        ?></td>
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name = "password"></td>
                        <td>
                        <?php
                            //echo $pvalid;
                        ?></td>
                    </tr>

                    <tr>
                        <td>Confirmed Password:</td>
                        <td><input type="password" name = "confirmed_password"></td>
                        <td>
                        <?php
                            echo $pvalid;
                        ?></td>
                    </tr>

                    <tr>
                        <td>Mobile Number:</td>
                        <td><input type="text" name = "mobile"></td>
                        <td>
                        <?php
                            //echo $mobilevalid;
                        ?></td>
                    </tr>

                    <tr>
                        <td>Confirmed Mobile Number:</td>
                        <td><input type="text" name = "confirmed_mobile"></td>
                        <td>
                        <?php
                            echo $mobilevalid;
                        ?></td>
                    </tr>
                
                    <tr>
                        <td>Please choose a Profile photo:</td>
                        <td><input type="file" name="filetoupload">
                    </td>
                    <td>
                        <?php
                            echo $filvalid;
                        ?></td>
                    </tr>

                    <tr>
                        <td>Choose your preference of train:</td>
                        <td><input type="radio" name="tr" value = "AC">AC Train
                        <input type="radio" name = "tr" value = "Regular">Regular Train</td>
                    </td>
                    <td>
                        <?php
                            echo $trainvalid;
                        ?></td>
                    </tr>

                    <tr>
                    
                    </tr>

                </table>
                <input type = "submit" name = "sub" class="button_reg">
                <input type="reset" class="button_reg">
                <?php
                        echo $dvalid."<br>";
                        echo $u."<br>";
                        echo $e."<br>";
                        echo $p."<br>";
                        echo $m;
                    ?>
                    
            </fieldset>

        </form>
        
        <script src="../js/myjs.js"></script>
    </body>

</html>