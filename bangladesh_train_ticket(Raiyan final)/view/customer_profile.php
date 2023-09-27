<?php
    include("../control/change_photo.php");
    include("../model/db.php");
    $uname = $_SESSION['user'];      
?>

<center>
    <img src="../uploads/<?php echo $uname; ?>.jpg" width="100" height="100">
    <html><head><link rel="stylesheet" href="../css/mycss.css"></head><body>
        <form action="" method = "post" enctype="multipart/form-data" class = "form">
            Change photo:
            <input type="file" name= "file">
            <input type="submit" name = "change" value = "Change">
            <?php echo $filvalid."<br>" ?>
        </form>
    </body></html>
</center>
<br>

<fieldset class= "form">
    <?php
        $mydb = new db();
        $connobj = $mydb->openCon();
        $mydb->grabData("users", $uname, $connobj);
        $mydb->connClose($connobj);        
    ?>
</fieldset>
<center><a href = "update_customer_profile.php" class = "search_button">Please click here to Update your whole Profile</a> </center>
<center><a href = "update_customer_password.php" class = "search_button">Please click here to Update your password</a> </center>