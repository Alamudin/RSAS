<?php

/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 1/16/2019
 * Time: 11:05 PM
 */
class Database_connection{

    //array("Toshiba" => array("192.168.43.233", array("Database"=>"RSAS", "UID"=>"Ellison", "PWD"=>"Alamudin87..")));

    /**
     * @return mysqli|string
     */
    function getConnection(){
        try{
            $db = mysqli_connect("localhost:3306", "root", "babbik", "rsas");
            return $db;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * @param $con_array
     * @return mysqli|string
     */
    function getOuterConnection($con_array){
        try{
            $db = mysqli_connect($con_array[0], $con_array[1], $con_array[2], $con_array[3]);
            return $db;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * @return array
     */
    function getAvailableServers(){
        $servers = array();
        $db = $this->getConnection();
        if($db){
            $query = mysqli_query($db, "select * from servers");
            if($query){
                while($row = mysqli_fetch_assoc($query)){
                    $servers[$row['srv_name']] = array($row['ip'], $row['user'], $row['password'], $row['db_name']);
                }
            }
        }
        return $servers;
    }

    /**
     * @param $sql
     * @return array|int|string
     */
    function srvFetched($sql){
        try{
            $data = array();
            $db = $this->getConnection();
            $query = mysqli_query($db, $sql);
            if($query){
                while($row = mysqli_fetch_row($query)){
                    $data[] = $row;
                }
                return $data;
            }else{
                $this->generateLog($sql, "localhost", "localhost");
                return 0;
            }
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * @param $sql
     * @return bool|int|mysqli_result|string
     */
    function srvProcAlter($sql){
        try{
            $db = $this->getConnection();
            $query = mysqli_query($db, $sql);
            if($query){
                $this->updateAll($sql);
                return $query;
            }else{
                $this->generateLog($sql, "localhost", "localhost");
                return 0;
            }
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * @param $sql
     * @return bool|mysqli_result|string
     */
    function srvExecute($sql){
        try{
            $db = $this->getConnection();
            $query = mysqli_query($db, $sql);
            if($query){
                return $query;
            }else{
                $this->generateLog($sql, "localhost", "localhost");
                return mysqli_error($db);
            }
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    /**
     *     function getsqlsrv($host){
    $connection = array("Database"=>"RSAS", "UID"=>"Abnet", "PWD"=>"abnetk");

    try{
    $db = sqlsrv_connect($host, $connection);
    if($db){
    return $db;
    }
    return 0;
    }catch(Exception $e){
    return $e->getMessage();
    }
    }
     *
     *
     * function srvExecute($sql){
    try{
    $db = $this->getConnection();
    $query = mysqli_query($db, $sql);
    if($query){
    return $query;
    }else{
    $this->generateLog($sql, "localhost", "localhost");
    return 0;
    }
    }catch (Exception $e){
    return $e->getMessage();
    }
    }
     *
     * **/

    function updateAll($sql){
        try{
            $servers = $this->getAvailableServers();
            if($servers != array()){
                foreach($servers as $name => $con_array){

                    $db = $this->getOuterConnection($con_array);
                    if($db){
                        $query = mysqli_query($db, $sql);
                        if(!$query){
                            $this->generateLog($sql, $name, $con_array[0]);
                        }
                    }else{
                        $this->generateLog($sql, $name, $con_array[0]);
                    }
                }
            }else{
                return 0;
            }

            return 1;
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    function updateAllProc($sql){
        $servers = $this->getAvailableServers();
        try{
            foreach($servers as $name => $array){

                $db = $this->getOuterConnection($array);
                if($db){
                    $query = mysqli_query($db, $sql);
                    if(!$query){
                        $this->generateLog($sql, $name, $array[0]);
                    }
                }else{
                    $this->generateLog($sql, $name, $array[0]);
                }
            }

            return 1;
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    function generateLog($sql, $srvname, $ip){
        try{
            $nd = new DateTime();
            $time = $nd->format("H:i:s");
            $date = $nd->format("Y-m-j");
            $log = "$ip, $srvname, $sql, $time, $date \n";
            file_put_contents("D:/xampp/htdocs/RSAS.net/failure_log.txt", $log, FILE_APPEND);
            return 1;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    function generateFileLog($srvname, $ip, $src, $dest){
        try{
            $nd = new DateTime();
            $time = $nd->format("H:i:s");
            $date = $nd->format("Y-m-j");
            $db = $this->getConnection();
            mysqli_query($db, "insert into file_transfer_log values($srvname', '$ip', '$src', '$dest', '$time', '$date')");
            return 1;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    function updateAllProfile($address, $flname){
        try{
            $servers = $this->getAvailableServers();
            foreach($servers as $name => $con_array){
                $dest = "http://".$con_array[0]."RSAS.net/profile_pic/$flname";
                if(copy($address, $dest)){
                    continue;
                }else{
                    $this->generateFileLog($name, $con_array[0], $address, $dest);
                }
            }

            return 1;
        }catch (Exception $e){
            return $e->getMessage();
        }
    }
}
?>