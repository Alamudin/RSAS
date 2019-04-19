<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 3/30/2019
 * Time: 2:21 PM
 */
include_once("Update.php");
include_once("Server_Manager.php");
if(isset($_GET['update_all'])){
    $up = new Update();
    $result = $up->getForLater();
    if($result != -1){
        $up->gossip($result);
        echo "gossiped";
    }else{
        echo "not gossiping";
    }
}

if(isset($_GET['register'])){
    $name = $_GET['sname'];
    $ip = $_GET['sip'];
    $number = $_GET['snum'];
    $dbname = $_GET['dbname'];
    $pass = $_GET['pass'];
    $uname = $_GET['uname'];
    $srv = new Server_Manager();
    $result = $srv->registerServer($number, $name, $ip, $uname, $pass, $dbname);
    echo $result;
}

if(isset($_GET['wake_others'])){
    $srv = new Server_Manager();
    $srv->wakeUp();
}

?>