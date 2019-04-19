<?php

/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 1/10/2019
 * Time: 3:21 PM
 */

class ManageMessages{


    function ViewMessage($id){
        try{
            $con = new Database_connection();
            $sql = "update mails set seen = 1 where id = $id";

            $query = $con->srvExecute("select * from mails where id = $id");

            if($query){
                if(mysqli_num_rows($query) > 0){
                    $con->srvProcAlter($sql);
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

    function readFeedback($id){
        try{
            $con = new Database_connection();
            $sql = "update feedback set seen = 1 where id = $id";

            $query = $con->srvExecute( "select * from feedback where id = $id");

            if($query){
                if(mysqli_num_rows($query) > 0){
                    $con->srvProcAlter($sql);
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

    function ReplayMessage(){

    }

    function DeleteMessages(){

    }

    function SearchMessages(){

    }
}