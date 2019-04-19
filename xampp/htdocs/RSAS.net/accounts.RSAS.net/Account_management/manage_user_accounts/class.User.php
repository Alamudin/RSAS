<?php

/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 1/10/2019
 * Time: 2:27 PM
 */
class User{

    protected $username;
    protected $full_name;
    protected $email;
    protected $picture;

    /**
     * User constructor.
     */
    function __construct(){
        if(isset($_SESSION['login']) && $_SESSION['login'] == 'true' && isset($_SESSION['username'])){
            $this->username = $_SESSION['username'];
            $this->login = $_SESSION['login'];
            $this->email = $_SESSION['email'];
            $this->credential = $_SESSION['credential'];
            $this->picture = $_SESSION['picture'];
            $this->full_name = $_SESSION['fullname'];
        }
    }

    /**
     * enables users to view their profile information
     */
    function ViewProfile(){


    }

    function WritePost(){

    }

    function ShareDocuments(){

    }

    /**
     * @param $username
     * @param $for
     * @return array|int|null
     */
    function searchUsers($username, $for){
        $con = new Database_connection();
        if($for != "default"){
            $sql = "select * from users U 
                    join resource R on U.profile_pic = R.rid 
                    join account A on U.Username = A.Username 
                    where U.Username = '$username'";
            //"select * from Users U join Account A on U.Username = A.Username where U.Username = ?";

            $query = $con->srvExecute($sql);
            if($query && mysqli_num_rows($query) > 0){
                $row = mysqli_fetch_assoc($query);
                return $row;
            }else{
                return -1;
            }
        }
        $sql = "select count(*) as exist from Users where Username = '$username'";

        $query = $con->srvExecute($sql);
        if($query){
            $row = mysqli_fetch_assoc($query);
            return $row['exist'];
        }else{
            return -1;
        }
    }

    /**
     * @param $email
     * @return bool|int|mysqli_result|string
     */
    function searchEmail($email){
        $sql = "select * from Users U join Resource R on U.profile_pic = R.Rid where U.email = '$email'";

        $con = new Database_connection();
        $query = $con->srvExecute($sql);
        if($query){
            return $query;
        }else{
            return -1;
        }
    }
}

include_once("D:/xampp/htdocs/DBLayer/Database_connection.php");

?>