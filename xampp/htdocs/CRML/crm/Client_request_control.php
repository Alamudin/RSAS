<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 3/29/2019
 * Time: 4:16 PM
 */

session_start();
include_once("Server_Manager.php");
include_once("../../DBLayer/Database_connection.php");

if(isset($_GET['new_connection'])){
    $srv = new Server_Manager();
    $np = $srv->getNextServer();
    if($np == "localhost"){
        $_SESSION['assigned'] = "here";
        header("Location: ../../RSAS.net/homepage.php");
    }else if($np != null){
        header("Location: http://$np/rsas.net");
    }
}                   

if(isset($_GET['check_srv'])){
    $con = new Server_Manager();
    $servers = $con->getAvailableServers();
    foreach($servers as $name => $con_array){
        $db = $con->getOuterConnection($con_array);
        if($db){
            continue;
        }else{
            $con->removeServer($con_array[0]);
        }
    }
    try{
        $dt = new DateTime();
        echo "Last Check : ". $dt->format("H:i:s")."/". $dt->format("Y-m-j");
    }catch(Exception $e){
        echo "now";
    }
}

/**if(isset($_GET['available_srv'])){
    $con = new Server_Manager();
    $servers = $con->getAvailableServers();
    echo json_encode($servers);
}*/

if(isset($_GET['available_srv'])){
    $html = "";
    $con = new Server_Manager();
    $servers = $con->getAvailableServers();
    foreach($servers as $name => $con_array){
        $html = $html ."<button class='online_servers'>$name : ". $con_array[0] ."</button>";
    }
    echo $html;
}

if(isset($_GET['check_me'])){
    $i = 0;
    $con = new Database_connection();
    $servers = $con->getAvailableServers();
    foreach($servers as $value){
        $i = $i+1;
    }
    if($i > 0){
        echo 1;
    }else{
        echo 0;
    }
}

?>