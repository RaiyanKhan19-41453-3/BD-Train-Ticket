<?php 
    //session_start();
    include("../control/buy_ticket.php");
    $uname = $_SESSION['user'];
    //include("../control/feedback.php");   
?>
<html>
    <head>
    <link rel="stylesheet" href="../css/mycss.css">
    </head>

    <body>
    <center><img src="../uploads/<?php echo $uname; ?>.jpg" width="100" height="100"></center>
    <div class = "bar">
        <center>
            <a href = "../view/provide_feedback.php" class = "bar_button">Feedback</a> 
            <?php echo"----"?>
            <a href = "../view/remove.php" class = "bar_button">Delete Account</a> 
            <?php echo"----"?>
            <a href = "../view/ticket_history.php" class = "bar_button">Ticket History</a> 
            <?php echo"----"?> 
            <a href = "../view/request_refund.php" class = "bar_button">Request Refund</a> 
            <?php echo"----"?> 
            <a href = "../view/verify_ticket.php" class = "bar_button">Verify Ticket</a> 
            <?php echo"----"?> 
            <a href = "../view/customer_profile.php" class = "bar_button">Profile</a> 
            <?php echo"----"?> 
            <a href = "../control/logout.php" class = "bar_button">Log Out</a> 
        </center>
    </div>
    <div class = "discount">
        Current Discount: 
        <?php
            $mydb = new db();
            $connobj = $mydb->openCon();
            $r = $mydb->getDiscount("customer_discount", $uname, $connobj);
            $count = mysqli_num_rows($r);
            if($count>0)
            {
                while($ro = mysqli_fetch_assoc($r))
                {
                    echo $ro['discount'];
                }
            }

            $mydb->connClose($connobj);
        ?>%</div>

        <form action="" method="GET">
            <fieldset class = "form form_reg">
                <legend> <?php echo "<b> User :"." ".$_SESSION["user"]."</b>" ?></legend><br>
                <table>
                    <tr>
                        <td>From:</td>
                        <td>
                            <select name="from" multiple>
                                <?php
                                    $mydb4 = new db();
                                    $connobj4 = $mydb4->openCon();
                                    $result4 = $mydb4->selectdistinctLocation("train", "_from", $connobj4);
                                    $result5 = $mydb4->selectdistinctLocation("train", "_to", $connobj4);
                                    $count4 = mysqli_num_rows($result4);
                                    $count5 = mysqli_num_rows($result5);
                                    if($count4>0)
                                    {
                                        while($row = $result4->fetch_assoc())
                                        {
                                            //echo "<option value='Dhaka'>Dhaka</option>";
                                            echo "<option value='".$row['_from']."'>".$row['_from']."</option>";
                                        }
                                    }
                                ?>
                                <!--
                                <option value="Dhaka">Dhaka</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Barisal">Barisal</option>
                                <option value="Sylhet">Sylhet</option> -->
                            </select>
                        </td>
                        <td>
                            <?php echo $from_valid ?>
                        </td>
                    </tr>
                    
                    <tr>   
                    
                        <td>To:</td>
                        <td>
                        <select name="to" multiple>
                            <?php 
                                if($count5>0)
                                {
                                    while($row = $result5->fetch_assoc())
                                    {
                                        echo "<option value='".$row['_to']."'>".$row['_to']."</option>";
                                    }
                                }
                            ?>
                            <!--
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Sylhet">Sylhet</option> -->
                        </select>
                        </td>
                        <td>
                            <?php echo $to_valid ?>
                        </td>
                    
                    </tr>
                    
                    <tr>    
                    
                        <td>Journey Date:</td>
                        <td><input type = "datetime-local" name = "d" value = "<?php echo $d ?>"></td>
                        <td>
                            <?php echo $dvalid ?>
                        </td>
                        
                    </tr>
                    
                    <tr>
                        <td>Choose your class:</td>
                        <td>
                            <input type="radio" name="class" value = "AC">AC Train
                            <input type="radio" name = "class" value = "Regular">Regular Train</td>
                        </td>
                        <td>
                            <?php echo $_class_valid ?>
                        </td>
                        
                    </tr>
                    
                    <tr>
                        <td>Amount of ticket : </td>
                        <td><input type="number" name = "quantity"></td>   
                        <td>
                            <?php echo $quantity_valid ?>
                        </td>                   
                    </tr>

                </table>
                    <input type = "submit" name = "find" value = "Find" class = "button_reg">
                    <?php echo $max_capacity_valid ?>
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

        <p class = "fixed_example">Powered BY:   ABC ltd, DEF ltd, Jomuna ltd</p>
        <script src="../js/myjs.js"></script>
    </body>
</html>