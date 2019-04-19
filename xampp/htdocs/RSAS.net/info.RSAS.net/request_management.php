<?php
include_once("D:/xampp/htdocs/DBLayer/Database_connection.php");
require("messaging.php");

if(isset($_GET["mail_email"])){
    $uemail = $_GET["user_email"];
    $subject = $_GET["subject"];
    $body = $_GET["body"];
    try{
        $d = new DateTime();
        $time = $d->format("H:i:s");
        $date = $d->format("Y-m-j");
        $sql = "insert into mails(sender, subject, body, time, date, seen) 
                values('$uemail', '$subject', '$body', '$time', '$date', 0)";

        $con = new Database_connection();
        $query = $con->srvProcAlter($sql);
        if($query){
            print "Send Successfully";
        }else{
            print "Operation failed";
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

if(isset($_GET['feedback'])){
    $fd = $_GET['feedback'];
    try{
        $d = new DateTime();
        $time = $d->format("H:i:s");
        $date = $d->format("Y-m-j");
        $sql = "insert into feedback(message, time, date, seen) values('$fd', '$time', '$date', 0)";

        $con = new Database_connection();
        $query = $con->srvProcAlter($sql);
        if($query){
            echo "success";
        }else{
            echo "can't send now pleas try again later";
        }
    }catch(Exception $ex){
        echo $e->getMessage();
    }
}

if(isset($_GET['check'])){
    $check = $_GET['check'];
    $con = new Database_connection();

    try{
        if($check == "mail"){
            $sql = "select count(*) as exist from mails where seen = 0";
            $query = $con->srvExecute($sql);
            if($query){
                $row = mysqli_fetch_assoc($query);
                echo $row['exist'];
            }else{
                echo "x";
            }
        }else if($check == "feedback"){
            $sql = "select count(*) as exist from feedback where seen = 0";
            $query = $con->srvExecute($sql);
            if($query){
                $row = mysqli_fetch_assoc($query);
                echo $row['exist'];
            }else{
                echo "x";
            }
        }
    }catch(Exception $ex){
        echo "x";
    }
}

if(isset($_GET['view'])){
    $view = $_GET['view'];
    $response = "";

    $ms = new Mails();
    $result = $ms->viewMail($view);

    if($result){
        if($result == "empty"){
            echo "There is no Message";
        }else{
            if($view == "mail"){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $subj = $row['subject'];
                    $email = $row['sender'];
                    $time = $row['time'];
                    $date = $row['date'];
                    $delivery = $row['seen'];
                    if($delivery > 0){
                        $delivery = "seen";
                    }else{
                        $delivery = "new";
                    }

                    $response = $response . "<button class='feedback' onclick='readMails(\"$id\")'>
                                                <p class='seen'>$delivery</p>
                                                <div class='sender_add'> $email</div>
                                                <div class='mail_subject'>$subj</div>
                                                <div class='mail_narration'>$date $time</div>
                                            </button>";
                }
                echo $response;
            }else if($view == "feedback"){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $subj = $row['message'];
                    $time = $row['time'];
                    $date = $row['date'];
                    $delivery = $row['seen'];

                    if($delivery > 0){
                        $delivery = "seen";
                    }else{
                        $delivery = "new";
                    }

                    $response = $response . "<button class='feedback' onclick='readFeedback(\"$id\")'>
                                            <p class='seen'>$delivery</p>
                                            <div class='mail_subject'>$subj</div>
                                            <div class='mail_narration'>$date $time</div>
                                        </button>";
                }

                echo $response;
            }
        }

    }else{
        echo "SORRY THERE WAS AN ERROR PLEASE TRY AGAIN LATER";
    }
}

?>