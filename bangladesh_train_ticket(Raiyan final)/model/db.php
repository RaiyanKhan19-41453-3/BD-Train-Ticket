<?php

    class db
    {

        function openCon()
        {
            $dbservername = "localhost";
            $dbusername = "root";
            $password = "";
            $dbname = "bangladesh_train_ticket";
            $conn = new mysqli($dbservername, $dbusername, $password, $dbname);
            if($conn->connect_error)
            {
                echo "Can't create connection object";
            }
            return $conn;
        }

        function insertUser($tablename, $full_name, $uname, $age, $current_address, $email, $train, $mobile, $password, $conn)
        {
            $sqlstr = "insert into $tablename (full_name, user_name, age, current_address, email, train, mobile, _password) values ('$full_name', '$uname', '$age', '$current_address', '$email', '$train', '$mobile', '$password')";
            if($conn->query($sqlstr))
            {
                echo "Succesfully Data Inserted";
            }
            else
            {
                echo $conn->error;
            }
        }

        function insertDiscount($tablename1, $uname, $conn)
        {
            $sqlstr = "insert into $tablename1 (user_name, discount) values ('$uname', '0')";
            if($conn->query($sqlstr))
            {
                echo "Succesfully Data Inserted";
            }
            else
            {
                echo $conn->error;
            }
        }

        function insertComments($tablename1, $uname, $date, $comment, $conn)
        {
            $sqlstr = "insert into $tablename1 (user_name, comment, _date) values ('$uname','$comment','$date')";
            if($conn->query($sqlstr))
            {
                //echo "Succesfully Data Inserted";
            }
            else
            {
                echo $conn->error;
            }

        }

        function checkDuplicate($tablename, $cell, $cell_value, $conn)
        {
            $sqlstr = "select * from $tablename where $cell = '$cell_value'";
            $result = $conn->query($sqlstr);
            $count = mysqli_num_rows($result);
            if($count>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        function getUser($tablename, $uname, $password, $conn)
        {
            $sqlstr = "select * from $tablename where user_name = '$uname' and _password = '$password'";
            $result = $conn->query($sqlstr);
            $count = mysqli_num_rows($result);
            return $result;
        }

        function getEmail($tablename, $uname, $password, $conn)
        {
            $sqlstr = "select * from $tablename where email = '$uname' and _password = '$password'";
            $result = $conn->query($sqlstr);
            $count = mysqli_num_rows($result);
            return $result;
        }

        function grabData($tablename, $uname, $conn)
        {
            $sqlstr = "select * from $tablename where user_name = '$uname' or email = '$uname'";
            $result = $conn->query($sqlstr);
            $count = mysqli_num_rows($result);
            if($count>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo"<center>";
                    echo "Full Name: ".$row['full_name']."<br>"."<br>";
                    echo "User Name: ".$row['user_name']."<br>"."<br>";
                    echo "Age: ".$row['age']."<br>"."<br>";
                    echo "Current Address: ".$row['current_address']."<br>"."<br>";
                    echo "Email: ".$row['email']."<br>"."<br>";
                    echo "Mobile: ".$row['mobile']."<br>"."<br>";
                    echo"</center>";
                }
                return true;
            }
            else
            {
                return false;
            }
        }

        function updateUser($tablename, $uname, $full_name, $age, $address, $email, $mobile, $conn)
        {
            try
            {
            $sqlstr = "update $tablename set full_name = '$full_name', age = '$age', current_address = '$address', email = '$email', mobile = '$mobile'  where user_name = '$uname'";
            $result = $conn->query($sqlstr);
            return "Record Updated";
            }catch(Exception $e){
                return "Mobile and email need to be unique";
            }
        }

        function updateUserPassword($tablename, $uname, $pass, $conn)
        {
            try
            {
            $sqlstr = "update $tablename set _password = '$pass'  where user_name = '$uname'";
            //update users set _password = '123' where user_name = 'Robi1982';
            $result = $conn->query($sqlstr);
            return "Pasword Updated";
            }catch(Exception $e){
                return "Please change it there is similar one exist";
            }
        }

        function getDiscount($tablename, $uname, $conn)
        {
            $sqlstr = "select * from $tablename where user_name = '$uname'";
            $result = $conn->query($sqlstr);
            $count = mysqli_num_rows($result);
            return $result;     
        }

        function getTrain($tablename, $_from, $_to, $class, $conn)
        {
            $sqlstr = "select * from $tablename where _from = '$_from' and _to = '$_to' and class = '$class' and active = 'Yes'";
            $result = $conn->query($sqlstr);

            return $result;

            /*
            if($count>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    if($row['active'] == "Yes")
                    {
                        return true;
                    }
                }
            }
            else
            {
                return false;
            }
            */  
        }

        function checkSeat($tablename, $train_id, $d, $conn)
        {
            $sqlstr = "select * from $tablename where train_id = '$train_id' and _date = '$d'";
            $result = $conn->query($sqlstr);
            return $result;
        }

        function insertTrain_time($tablename, $train_id, $time, $date, $seat_taken, $conn)
        {
            $sqlstr = "insert into $tablename (train_id, _time, _date, seat_taken) values ('$train_id', '$time', '$date', '$seat_taken')";
            $result = $conn->query($sqlstr);
            return $result;
        }

        function updateTrain_time($tablename, $train_id, $seat_taken, $date, $conn)
        {
            $sqlstr = "update $tablename set seat_taken = '$seat_taken' where train_id = '$train_id' and _date = '$date'";
            $result = $conn->query($sqlstr);
            return $result;
        }

        function insertTicket($tablename, $user_name, $_from, $_to, $_date, $train_id, $quantity, $printed, $conn)
        {
            $sqlstr = "insert into $tablename (user_name, _from, _to, _date, train_id, quantity, Printed) values ('$user_name', '$_from', '$_to', '$_date', '$train_id', '$quantity', '$printed')";
            $result = $conn->query($sqlstr);
            return $result;
        }

        function getTicket($tablename, $user_name, $conn)
        {
            $sqlstr = "SELECT * FROM $tablename where user_name = '$user_name' order by ticket_id desc limit 1";
            $result = $conn->query($sqlstr);
            return $result;
        }

        function insertTicket_bought($tablename, $ticket_id, $user_name, $bought_price, $conn)
        {
            //insert into ticket_bought (ticket_id, user_name, bought_price) values ('100', 'sumo', '70')
            $sqlstr = "insert into $tablename (ticket_id, user_name, bought_price) values ('$ticket_id', '$user_name', '$bought_price')";
            $result = $conn->query($sqlstr);
            return $result;
        }

        function showAllTicket($tablename, $user_name, $ticket_count, $conn)
        {
            //SELECT * FROM $tablename WHERE user_name = '$user_name' order by _date desc LIMIT $ticket_count
            $sqlstr = "SELECT * FROM $tablename WHERE user_name = '$user_name' order by _date desc LIMIT $ticket_count";
            $result = $conn->query($sqlstr);
            return $result;
        }

        function searchTicket($tablename, $ticket_id, $user_name, $conn)
        {
            //SELECT * FROM ticket WHERE user_name = 'Robi1982' and ticket_id = '2'
            $sqlstr = "SELECT * FROM $tablename WHERE user_name = '$user_name' and ticket_id = '$ticket_id'";
            $result = $conn->query($sqlstr);
            return $result;
        }

        function insertRefund($tablename, $ticket_id, $user_name, $conn)
        {
            $sqlstr = "insert into $tablename (ticket_id, user_name) values ('$ticket_id', '$user_name')";
            $result = $conn->query($sqlstr);
            return $result;
        }

        function selectdistinctLocation($tablename, $location, $conn)
        {
            $sqlstr = "SELECT DISTINCT $location FROM $tablename;";
            $result = $conn->query($sqlstr);
            return $result;
        }

        function remove($tablename, $user_name, $conn)
        {
            $sqlstr = "delete from $tablename where user_name = '$user_name'";
            //$result = $conn->query($sqlstr);
            if($conn->query($sqlstr))
            {
                echo "Succesfully Data deleted";
            }
            else
            {
                echo $conn->error;
            }
        }

        function updateTicket($tablename, $user_name, $cell, $remconn)
        {
            $sqlstr = "update $tablename set $cell = 'unknown' where user_name = '$user_name'";
            $result = $remconn->query($sqlstr);
        }

        function connClose($conn)
        {
            $conn->close();
        }

    }