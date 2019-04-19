<?php

class Mails{

    function sendMail(){

    }

    function viewMail($type){
        try{
            $con = new Database_connection();


            if($type == "mail"){
                $sql = "select * from mails";
            }else if($type == "feedback"){
                $sql = "select * from feedback";
            }

            $query = $con->srvExecute($sql);
            if($query){
                if(mysqli_num_rows($query) > 0){
                    return $query;
                }else{
                    return "empty";
                }
            }else{
                return 0;
            }

        }catch (Exception $e){
            return -1;
        }
    }

    function deleteMail(){

    }

    function ReplayMail(){

    }

    function searchMail(){

    }
}


?>