<?php

    session_start();
    include("../model/db.php");

    $dvalid = "";
    $from_valid = "";
    $to_valid = "";
    $_class_valid = "";
    $quantity_valid = "";
    $max_capacity_valid = "";

    $from = "";
    $to = "";
    $d = date('d-m-y');
    $_class = "";
    $quantity = "";

    $train_id = "";
    $train_time = "";
    $seat_availability = "";
    $price = "";
    $time = "";

    $flag = 1;
    $flag2 = 0;
    $flag3 = 0;
    $found_train = 0;


    if(!isset($_SESSION["user"]))
    {
        header("Location: ../view/first_page.php");
    }

    if(isset($_GET["find"]))
    {
        if(isset($_GET["from"]))
        {
            $from = $_GET["from"];
        }
        else
        {
            $flag = 0;
            $from_valid = "Select destination";
        }

        if(isset($_GET["to"]) && $_GET["from"] != $_GET["to"])
        {
            $to = $_GET["to"];
        }
        else
        {
            $flag = 0;
            $to_valid = "Select destination properly";
        }

        if($_GET["d"] != "")
        {
            $d = $_GET["d"];
            $str = $d;
            $i = 10;
            $d = substr_replace($str, '', $i, 6);

            $entered_year = date('Y',strtotime($d));
            $entered_month = date('m',strtotime($d));
            $entered_date = date('d',strtotime($d));
            $entered_days = ($entered_year-1)*365 + ($entered_month-1)*30 + $entered_date;

            $current_year = date('Y');
            $current_month = date('m');
            $current_date = date('d');
            $current_days = ($current_year-1)*365 + ($current_month-1)*30 + $current_date;

            $difference_in_days = $entered_days - $current_days;

            if(!($difference_in_days >=0 && $difference_in_days<=7))
            {
                $flag = 0;
                $dvalid = "you can only book 7 days ahead";
            }

        }
        else
        {
            $flag = 0;
            $dvalid = "Select date ";
        }
        if(isset($_GET["class"]))
        {
            $_class = $_GET["class"];
        }
        else
        {
            $flag = 0;
            $_class_valid = "Select Class";
        }
        if(empty($_GET["quantity"]))
        {
            $flag = 0;
            $quantity_valid = "Select ticket amount";
        }
        else
        {
            if($_GET["quantity"] > 5)
            {
                $flag = 0;
                $quantity_valid = "At most 5 ticket at a time";
            }
            else
            {
                $quantity = $_GET["quantity"];
            }
        }
        
        if($flag == 1)
        {
            $mydb1 = new db();
            $connobj = $mydb1->openCon();
            $result = $mydb1->getTrain("train", $from, $to, $_class, $connobj);
            $train_count = mysqli_num_rows($result);
            $train_count_check = 0;
            
            if($train_count>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    ++$train_count_check;
                    
                        $flag2 = 1;
                        $train_id = $row['train_id'];
                        $train_time = $row['_time'];
                        $seat_availability = $row['seat_availability'];
                        $price = $row['price'];
                        $time = $row['_time'];

                        $result2 = $mydb1->checkSeat("train_time", $train_id, $d, $connobj);
                        $count = mysqli_num_rows($result2);

                        if($count == 0)
                        {
                            $mydb1->insertTrain_time("train_time", $train_id, $train_time, $d, $quantity, $connobj);
                            $found_train = 1;

                            // neeed to insert in ticket database here
                            $mydb1->insertTicket("ticket", $_SESSION["user"], $from, $to, $d, $train_id, $quantity, "No", $connobj);
                            $last_ticket = $mydb1->getTicket("ticket", $_SESSION["user"], $connobj);
                            $last_ticket_num = mysqli_num_rows($last_ticket);
                            if($last_ticket_num>0)
                            {
                                while($row2 = mysqli_fetch_assoc($last_ticket))
                                {
                                    $ticket_id = $row2['ticket_id'];
                                }
                            }

                            $discount = $mydb1->getDiscount("customer_discount", $_SESSION["user"], $connobj);
                            $count2 = mysqli_num_rows($discount);
                            if($count2>0)
                            {
                                while($ro = mysqli_fetch_assoc($discount))
                                {
                                    $percent = $ro['discount'];
                                }
                            }

                            $bought_price = $price - ($price * ($percent/100));
                            $bought_price = $bought_price * $quantity;

                            $mydb1->insertTicket_bought("ticket_bought", $ticket_id, $_SESSION["user"], $bought_price, $connobj);
                            $max_capacity_valid = "Ticket found";

                            break;
                        }
                        else
                        {
                            while($row1 = mysqli_fetch_assoc($result2))
                            {
                                if(($row1['seat_taken']+$quantity) <= $seat_availability)
                                {
                                    $total = $row1['seat_taken']+$quantity;
                                    $mydb1->updateTrain_time("train_time", $train_id, $total, $d, $connobj);
                                    $found_train = 1;

                                    // neeed to insert in ticket database here
                                    $mydb1->insertTicket("ticket", $_SESSION["user"], $from, $to, $d, $train_id, $quantity, "No", $connobj);
                                    $last_ticket = $mydb1->getTicket("ticket", $_SESSION["user"], $connobj);
                                    $last_ticket_num = mysqli_num_rows($last_ticket);
                                    if($last_ticket_num>0)
                                    {
                                        while($row2 = mysqli_fetch_assoc($last_ticket))
                                        {
                                            $ticket_id = $row2['ticket_id'];
                                        }
                                    }

                                    $discount = $mydb1->getDiscount("customer_discount", $_SESSION["user"], $connobj);
                                    $count2 = mysqli_num_rows($discount);
                                    if($count2>0)
                                    {
                                        while($ro = mysqli_fetch_assoc($discount))
                                        {
                                            $percent = $ro['discount'];
                                        }
                                    }

                                    $bought_price = $price - ($price * ($percent/100));
                                    $bought_price = $bought_price * $quantity;
                                    //echo $ticket_id;
                                    $mydb1->insertTicket_bought("ticket_bought", $ticket_id, $_SESSION["user"], $bought_price, $connobj);
                                    break;
                                }
                                else
                                {
                                    $max_capacity_valid = "Please Choose less then $quantity seat for the destination, class and the date you chose";
                                    break;
                                }
                            }
                        }
                        if($found_train == 1)
                        {
                            $max_capacity_valid = "Ticket found";
                            break;
                        }
                }
                if(($train_count_check == $train_count) && $found_train == 0)
                {
                    $max_capacity_valid = "There is not enough seat for any train, Please select another date OR/AND Class";
                }
            }
            else
            {
                $max_capacity_valid = "There is no active train for the destination you chose";
            }            
            
            $mydb1->connClose($connobj);
            //header("Location: ../view/buy_ticket.php");
        }

    }

?>