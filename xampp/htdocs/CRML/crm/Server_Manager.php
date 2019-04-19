<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 3/29/2019
 * Time: 4:14 PM
 */

require("../../DBLayer/Database_connection.php");

class Server_Manager extends Database_connection {

    protected $server_number = 1;
    protected $server_name = "Lenovo";
    protected $server_ip = "192.168.43.200";
    protected $user_name = "root";
    protected $password = "babbik";
    protected $database_name = "rsas";

    /**
     * @return array
     * give the server info as array the first index is the server number
     * the second index is the server name and the third index is the server ip address
     */
    function getServerInfo(){
        $data = array($this->server_number, $this->server_name, $this->server_ip);
        return $data;
    }

    /**
     * this function will send this server access to all servers
     * that it was connected before it go offline
     */
    function wakeUp(){
        $servers = $this->getAvailableServers();
        $sql = "insert into servers values($this->server_number, '$this->server_name', '$this->server_ip', '$this->user_name', '$this->password', '$this->database_name')";

        foreach($servers as $name => $con_array){
            $db = $this->getOuterConnection($con_array);
            if($db){
                $query = mysqli_query($db, $sql);
                if($query){
                    continue;
                }else{
                    $this->removeServer($con_array[0]);
                }
            }else{
                $this->removeServer($con_array[0]);
            }
        }
    }

    function goOffline(){
        $servers = $this->getAvailableServers();
        $sql = "delete from servers where ip = '$this->server_ip'";

        foreach($servers as $name => $con_array){
            $db = $this->getOuterConnection($con_array);
            if($db){
                $query = mysqli_query($db, $sql);
                if($query){
                    continue;
                }else{
                    $this->removeServer($con_array[0]);
                }
            }else{
                $this->removeServer($con_array[0]);
            }
        }
    }

    /**
     * @param $num server number assigned by the manager
     * @param $name server name or host name
     * @param $ip server computer ip address
     * @param $username database access user name
     * @param $password database access password
     * @param $database database name
     * @return int
     */
    function registerServer($num, $name, $ip, $username, $password, $database){
        $db = $this->getConnection();
        $sql = "insert into servers values($num, '$name', '$ip', '$username', '$password', '$database')";
        if($db){
            $query = mysqli_query($db, $sql);
            if($query){
                return 1;
            }else{
                return 0;
            }
        }else{
            return -1;
        }
    }

    /**
     * @param $ip server ip address
     * @return int
     */
    function removeServer($ip){
        $sql = "delete from servers where ip = '$ip'";
        $db = $this->getConnection();
        if($db){
            mysqli_query($db, $sql);
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * @param $con_array connection array that contains ip address, and login information
     * @return int
     */
    function checkServer($con_array){
        $db = $this->getOuterConnection($con_array);
        if($db){
            return 1;
        }else{
            $this->removeServer($con_array[0]);
            return 0;
        }
    }

    /**
     * @return |null
     * return the available
     *
     * this function returns the next available server ip adress if there is no it return
     * localhost that means there is no available server
     */
    function getNextServer(){
        $db = $this->getConnection();
        $sql = "select * from srv_now";
        $query = mysqli_query($db, $sql);
        if($query){
            $row = mysqli_fetch_assoc($query);
            $max = $row['srv_n'];
            $now = $row['srv_now'];

            if($now == 0){
                return "localhost";
                $sql = "update srv_now set srv_now = srv_now + 1";
                mysqli_query($db, $sql);
            }else{
                /** check if there is any available server till it reach maximum number of servers assigned to this server */
                while($now<$max){
                    $sql1 = "select * from servers where srv_number = $now";
                    $query = mysqli_query($db, $sql1);
                    if($query){
                        $row = mysqli_fetch_assoc($query);
                        $con_array = array($row['ip'], $row['user'], $row['password'], $row['db_name']);
                        $new = $this->checkServer($con_array);
                        if($new == 1){
                            return $row['ip'];
                        }else{
                            $now = $now + 1;
                        }
                    }else{
                        $now = $now + 1;
                    }

                    if($now == $max){
                        $sql = "update srv_now set srv_now = 0";
                        mysqli_query($db, $sql);
                    }
                }
                return null;
            }
        }else{
            return null;
        }
    }


}