<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 3/30/2019
 * Time: 2:48 PM
 */

class Update{

    /**
     * @return array|int
     */
    function getForLater(){
        $con = new Database_connection();
        $db = $con->getConnection();
        $sql = "select * from for_later";
        $data = array();

        $query = mysqli_query($db, $sql);
        if($query){
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    $data[] = $row;
                }
            }
        }else{
            return -1;
        }

        return $data;
    }

    /**
     * @param $for_later
     * @return int
     */
    function gossip($for_later){
        $con = new Database_connection();
        foreach($for_later as $sql){
            $res = $con->updateAll($sql['sql_query']);
            if($res == 1){
                $this->deleteForLater($sql['qr_id']);
            }
        }
        return 1;
    }

    /**
     * @param $id
     */
    function deleteForLater($id){
        $con = new Database_connection();
        $db = $con->getConnection();
        $sql = "delete from for_later where qr_id = $id";

        mysqli_query($db, $sql);
    }
}