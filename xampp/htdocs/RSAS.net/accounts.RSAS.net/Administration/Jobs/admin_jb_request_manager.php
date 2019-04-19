<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 3/26/2019
 * Time: 3:21 PM
 */

require ("D:/xampp/htdocs/DBLayer/Database_connection.php");
include_once("ManageMessages.php");

/**
if(isset($_GET['read_mail'])) {

    $id = $_GET['id'];

    echo "this is the id you clicked $id";
}*/

if(isset($_GET['read_mail'])){

    $id = $_GET['id'];

    $manage = new ManageMessages();
    $result = $manage->ViewMessage($id);
    if($result){
        if($result == "empty"){
            echo "there is no message";
        }else{
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $message = $row['body'];
            $subj = $row['subject'];
            $email = $row['sender'];
            $time = $row['time'];
            $date = $row['date'];

            echo "<div class='message'>
                        <div class='message_header'>
                            <p class='sender_email'>
                                <b>$email</b><br/>
                                $date $time
                            </p>
                        </div>
                        <div id='message_view'>
                            <p id='message_text'>$subj <br/> $message</p>
                        </div>
                        <button class='actions' >Replay</button> <button class='actions' onclick='deleteMessage(\"$id\")'>Delete</button>
                    </div>";
        }
    }else{
        echo "Opration failed";
    }
}

if(isset($_GET["read_feedback"])){
    $id = $_GET['id'];


    $manage = new ManageMessages();
    $result = $manage->readFeedback($id);

    if($result){

        if($result == "empty"){
            echo "there is no message";
        }else{
            $row = mysqli_fetch_assoc($result);

            $message = $row['message'];
            $time = $row['time'];
            $date = $row['date'];
            echo "<div class='message'>
                    <div class='message_header'>
                        <p class='sender_email'>
                            <b>Unknown Visitor</b><br/>
                            $date $time
                        </p>
                    </div>
                    <div id='message_view'>
                        <p id='message_text'>$message</p>
                    </div>
                    <button class='actions'>Replay</button> <button class='actions'>Delete</button>
                </div>";
        }
    }else{
        echo "Operation failed";
    }

}

?>