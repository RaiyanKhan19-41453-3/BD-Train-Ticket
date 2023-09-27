<?php
    include("../control/sub_validate_updated_profile.php");
?>

<html>
    <head><link rel="stylesheet" href="../css/mycss.css">
    </head>

    <body>
        <center>

        <h1>Update Information</h1>

        <form action="" method="POST" enctype="multipart/form-data" onsubmit = "return validateForm()">
            <fieldset class = "form form_reg">
                <legend><b>Please provide information</b></legend><br>
                <table>
                    <tr>
                        <td>First Name:</td>
                        <td><input type = "text" name = "fnam" onkeyup = "validFname()" id = "fname" value = "<?php echo $name[0]; ?>"></td>
                        <td><p id = "fname-error">
                            
                        </p></td>
                    </tr>

                    <tr>
                        <td>Last Name:</td>
                        <td><input type = "text" name = "lnam" onkeyup = "validLname()" id = "lname" value = "<?php echo $name[1]; ?>">
                    </td>
                    <td><p id = "lname-error">
                            
                        </p></td>
                    </tr>

                    <!---<tr>
                        <td>User Name:</td>
                        <td><input type = "text" name = "uname">
                    </td>
                    <td><?php
                            //echo $uvalid;
                        ?></td>
                    </tr> !--->

                    <tr>
                        <td>Age:</td>
                        <td><input type = "number" name = "ag" onkeyup = "validAge()" id = "age" value = "<?php echo $age; ?>"></td>
                        <td><p id = "age-error">
                            
                        </p></td>
                    </tr>

                    <tr>
                        <td>Current Addres:</td>
                        <td><input type="text" name = "current_addres" onkeyup = "validAddress()" id = "address" value = "<?php echo $address; ?>"></td>
                        <td><p id = "address-error">
                            
                        </p></td>
                    </tr>

                    <tr>
                        <td>E-mail:</td>
                        <td><input type="text" name = "emai" onkeyup = "validEmail()" id = "email" value = "<?php echo $email; ?>"></td>
                        
                        <td><p id = "email-error">
                            
                        </p></td>
                    </tr>

                    

                    <tr>
                        <td>Mobile Number:</td>
                        <td><input type="text" name = "mobil" onkeyup = "validMobile()" id = "mobile" value = "<?php echo $mobile; ?>"></td>
                        
                        <td><p id = "mobile-error">
                            
                        </p></td>
                    </tr>

                    <tr>
                        <td>Confirmed Mobile Number:</td>
                        <td><input type="text" name = "confirmed_mobil" onkeyup = "validConfirmedMobile()" id = "confirmed_mobile" value = "<?php echo $mobile; ?>"></td>
                        
                        <td><p id = "confirmedMobile-error">
                            
                        </p></td>
                    </tr> 
                
                    <!---<tr>
                        <td>Please choose a Profile photo</td>
                        <td><input type="file" name="filetoupload">
                    </td>
                    <td>
                        <?php
                            //echo $filvalid;
                        ?></td>
                    </tr> !--->

                    <!---<tr>
                        <td>Choose your preference of train</td>
                        <td><input type="radio" name="ac" value = "AC">AC Train
                        <input type="radio" name = "regular" value = "Regular">Regular Train</td>
                    </td>
                    <td>
                        <?php
                            //echo $trainvalid;
                        ?></td>
                    </tr> !--->

                    <tr>
                        <td><input type = "submit" name = "sub" class = "button buttton_spacing">
                        <input type="reset" class = "button buttton_spacing"></td>
                        <td><p id = "submit-error" class = "changing">
                            
                        </p></td>
                    </tr>

                </table>
            </fieldset>
        </form>
        <a href="../view/buy_ticket.php" class = "search_button">Go to main Page</a>
        </center>
        <script src="../js/myjs.js"></script>
    </body>

</html>