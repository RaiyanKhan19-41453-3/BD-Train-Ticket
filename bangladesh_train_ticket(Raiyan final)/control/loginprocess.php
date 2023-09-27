<?php
    include("../model/db.php");
    session_start();
    if(isset($_SESSION["user"]))
    {
        header("Location: ../view/buy_ticket.php");
    }
    $msg = "";

    if (isset($_POST["login"])) 
    {
        if(!empty($_POST["username"]))
        {
            if(!empty($_POST["pass"]) && preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?!.*[^A-Za-z0-9_\- ]).{8,}$/", $_POST["pass"]))
            {
                $mydb = new db();
                $connobj = $mydb->openCon();
                $available = $mydb->getUser("users", $_POST["username"], $_POST["pass"], $connobj);
                $available1 = $mydb->getEmail("users", $_POST["username"], $_POST["pass"], $connobj);
                $cib = mysqli_num_rows($available);
                $cem = mysqli_num_rows($available1);
                if($cib > 0)
                {
                    $_SESSION["user"] = $_POST["username"];
                    $_SESSION["pas"] = $_POST["pass"];
                    header("Location: ../view/buy_ticket.php");
                }
                else if($cem > 0)
                {
                    while($row = mysqli_fetch_assoc($available1))
                    {
                        $_SESSION["user"] = $row["user_name"];
                        $_SESSION["pas"] = $_POST["pass"];
                        header("Location: ../view/buy_ticket.php");
                    }
                }
                else
                {
                    $msg = "Username and password does not exist";
                }
                
                $mydb->connClose($connobj);
            }
            else
            {
                $msg = "Incorrect username and password";
            }
        }
        else
        {
            $msg = "Incorrect username and password";
        }






        /*
        $data = file_get_contents("../data/data.json");
        $data = json_decode($data, true);
        foreach($data as $row) 
        {
            if($row["UserName"] == $_POST["username"] && $row["Password"] == $_POST["pass"]) 
            {
                $_SESSION["user"] = $row["UserName"];
                $_SESSION["pas"] = $row["Password"];

                header("Location: ../view/buy_ticket.php");
            } 
            else
            {
                $msg = "Please check your user name and password again";
            }
        }
        */
    }
?>