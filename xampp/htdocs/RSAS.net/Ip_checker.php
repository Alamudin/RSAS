<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 3/22/2019
 * Time: 1:40 AM
 */
session_start();

include_once("D:/xampp/htdocs/RSAS.net/accounts.RSAS.net/Account_management/manage_user_accounts/Database_connection.php");

if(isset($_GET['check'])){
    $conn = new Database_connection();
    $db = $conn->getConnection();
    $query = mysqli_query($db, "select server_ip from servers where available = 1 order by now_serving asc");
    if($query){
        while($row = mysqli_fetch_array($query)){
            $sip = $row['server_ip'];
            header("Location: http://$sip/rsas.net");
        }
    }
}

if(isset($_GET['ping'])){

    print get_client_ip();
    /**
     *$_SESSION['user_online'] = "online";
    $con = new Database_connection();
    $db = $con->getConnection();

    $query = mysqli_query($db, "insert into online_users values('@goshu', 'online')");
    if($query){
    while(null !== $_SESSION['user_online']){
    echo "";
    }
    mysqli_query($db, "delete from online_user where username = '@goshu'");
    }
     */
}

function get_client_ip()
{
    // Nothing to do without any reliable information
    if ( ! isset( $_SERVER[ 'REMOTE_ADDR' ] ) ) {
        return NULL;
    }
    // Header that is used by the trusted proxy to refer to
    // the original IP
    $proxy_header = "HTTP_X_FORWARDED_FOR" ;
    // List of all the proxies that are known to handle 'proxy_header'
    // in known, safe manner
    $trusted_proxies = array( "2001:db8::1" , "192.168.50.1" ) ;
    if ( in_array( $_SERVER[ 'REMOTE_ADDR' ] , $trusted_proxies) ) {
        // Get IP of the client behind trusted proxy
        if ( array_key_exists( $proxy_header, $_SERVER) ) {
            // Header can contain multiple IP-s of proxies that are passed through.
            // Only the IP added by the last proxy (last IP in the list) can be trusted.
            $client_ip = trim( end( explode( "," , $_SERVER[ $proxy_header] ) ) ) ;
            // Validate just in case
            if ( filter_var( $client_ip,  FILTER_VALIDATE_IP) ) {
                return $client_ip;
            } else {
                // Validation failed - beat the guy who configured the proxy or
                // the guy who created the trusted proxy list?
                // TODO: some error handling to notify about the need of punishment
            }
        }
    }
    // In all other cases, REMOTE_ADDR is the ONLY IP we can trust.
    return $_SERVER[ 'REMOTE_ADDR' ] ;
}
?>