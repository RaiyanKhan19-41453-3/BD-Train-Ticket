<?php
    session_start();
    include("../model/db.php");
    

    $uvalid = "";
    $fullnamevalid = "";
    $agevalid = "";
    $address_valid = "";
    $evalid = "";
    $pvalid = "";
    $dvalid = "";
    $filvalid = "";
    $trainvalid = "";
    $mobilevalid = "";

    $u = "";
    $e = "";
    $p = "";
    $m = "";

    $fn = "";
    $ln = "";
    $fullname = "";
    $uname = "a";
    $a = "";
    $address = "";
    $em = "";
    $pass = "";
    $file_name = "";
    $phone = "";
    $train = "";

    $flag = 1;


    if(isset($_POST["sub"]))
    {
        // VALIDATING NAMES
        $fn = $_POST["fname"];
        $ln = $_POST["lname"];
        $uname = $_POST["uname"];
        //!preg_match("/^(?=.*[a-zA-Z])(?!.*[^a-zA-Z_]).+$/", $fn) || !preg_match("/^(?=.*[a-zA-Z])(?!.*[^a-zA-Z_]).+$/", $ln)
        if(!preg_match("/^(?=.*[a-zA-Z])(?!.*[^a-zA-Z_]).+$/", $fn) || !preg_match("/^(?=.*[a-zA-Z])(?!.*[^a-zA-Z_]).+$/", $ln))
        {
            $flag = 0;
            $fullnamevalid = "First name and Last Name should not contain numeric value and must be filled.";  
        }
        elseif((!empty($fn) || !empty($ln)))
        {
            $fullname = $fn." ".$ln."";
        }
        else
        {
            $flag = 0;
            $fullnamevalid = "First name, Last Name should not be empty."; 
        }

        //  VALIDATING USER NAME
        if(!preg_match("/^(?=.*[a-zA-Z])(?!.*[^a-zA-Z0-9_]).+$/", $uname))
        {
            $flag = 0;
            $uvalid = "User name shouldn't be empty must not contain special characters";
        }

        //VALIDATION AGE
        $a = $_POST["age"];
        if(empty($_POST["age"]) || !preg_match("/^(?!.*[^0-9]+).{1,3}$/", $a))
        {
            $flag = 0;
            $agevalid = "Age should not be empty, number only and max is 999";
        }
   

        //VALIDATING ADDRESS /^[A-Za-z0-9:\.\-_]+$/
        $address = $_POST["current_address"];
        if(!preg_match("/^[A-Za-z0-9:\.\-_]+$/", $address))
        {
            $flag = 0;
            $address_valid = "Acceptable symbols are capital,small letters, ':', '.', '-', '_' and can't be empty";
        }



        //VALIDATING EMAIL
        $em = $_POST["email"];
        if(empty($em))
        {
            $flag = 0;
            $evalid = "Email should not be empty";
        }
        else if(!preg_match("/^[A-Za-z0-9_]+@[A-Za-z]+\.com$/", $em)) 
        {
            $flag = 0;
            $evalid = "Invalid email format";
        }

        
        //VALIDATING PASSWORD
        if(preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?!.*[^A-Za-z0-9_\- ]).{8,}$/", $_POST["password"]) && preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?!.*[^A-Za-z0-9_\- ]).{8,}$/", $_POST["confirmed_password"]) && $_POST["password"] == $_POST["confirmed_password"])
        {
            $pass = $_POST["password"];
        }
        else
        {
            $flag = 0;
            $pvalid = "It's length should be greater than 8 with minimum 1 capital and small letter and number, but no special characters and both box must be filled out";
        }



        //VALIDATING MOBILE NUMBER
        $phone = $_POST["confirmed_mobile"];
        if(preg_match("/^[0-9]{11}+$/", $phone)) 
        {
            if($_POST["mobile"] != $_POST["confirmed_mobile"])
            {
                $flag = 0;
                $mobilevalid = "Mobile numbers aren't simmilar";
            }
        } 
        else 
        {
            $flag = 0;
            $mobilevalid = "Numbers only and must have length of 11";
        }
        


        //VALIDATING FILE
        $target_dir = "../uploads/";
        $target_file = $target_dir . $uname.".jpg";

        $file_extention = explode(".",$_FILES["filetoupload"]["name"]);
        $file_extention = strtolower(end($file_extention));
        $allowed = array("jpg", "jpeg", "png");

        if(!empty($_FILES["filetoupload"]["name"]))
        {
            if(in_array($file_extention, $allowed))
            {
                if(move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file))
                {
                    $file_name = $uname;
                } 
                else 
                {
                    $flag = 0;
                    $filvalid = "Sorry, there was an error uploading your file.";
                }
            }
            else
            {
                $flag = 0;
                $filvalid = "Selected file must be photo";
            }
        }
        else
        {
            $flag = 0;
            $filvalid = "Must select a photo";
        }




        //VALIDATING TRAIN
        if(!isset($_POST["tr"]))
        {
            $flag = 0;
            $trainvalid = "Must select 1 option";
        }
        elseif(isset($_POST["tr"]))
        {
            $train = $_POST["tr"];
        }


        //INSERTING DATAS
        if($flag == 1) 
        {

            $mydb = new db();
            $connobj = $mydb->openCon();
            $checkUsername = $mydb->checkDuplicate("users", "user_name", $uname, $connobj);
            $checkEmail = $mydb->checkDuplicate("users", "email", $em, $connobj);
            $checkPhone = $mydb->checkDuplicate("users", "mobile", $phone, $connobj);
            $checkPassword = $mydb->checkDuplicate("users", "_password", $pass, $connobj);

            if($checkUsername || $checkEmail || $checkPhone || $checkPassword)
            {
                if($checkUsername)
                {
                    $u = "User Name already exist";
                }
                if($checkEmail)
                {
                    $e = "Email already exist";
                }
                if($checkPhone)
                {
                    $p = "Phone already exist";
                }
                if($checkPassword)
                {
                    $m = "Pasword already exist";
                }
            }
            else
            {
                $mydb->insertUser("users", $fullname, $uname, $a, $address, $em, $train, $phone, $pass, $connobj);
                $mydb->insertDiscount("customer_discount", $uname, $connobj);
            }

            $mydb->connClose($connobj);
            header("Location: ../view/login.php");

        } 
        else 
        {
            $dvalid = 'Incorrect input datas';
        }





        /*
        $file_pointer = "../data/data.json";

        if(file_exists($file_pointer) && $flag == 1) 
        {
            $current_data = file_get_contents($file_pointer);
            $array_data = json_decode($current_data, true);

            $extra = array( "UserName"=>$uname,
                            "Age"=>$a,
                            "Current Address"=>$address,
                            "E-Mail"=>$em,
                            "Password"=>$pass,
                            "File_Name"=>$file_name);

            $array_data[] = $extra;
            $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
            if (file_put_contents($file_pointer, $final_data)) 
            {
                $dvalid = "File registered Successfully";
            }
            header("Location: ../view/login.php");

        } 
        else 
        {
            $dvalid = 'Incorrect input datas';
        }
        */      
    }
?>