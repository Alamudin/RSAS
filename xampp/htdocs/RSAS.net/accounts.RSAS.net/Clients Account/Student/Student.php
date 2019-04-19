<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 1/10/2019
 * Time: 3:39 PM
 */
class Student{

    function CreateAccount($username, $email, $fullname, $pass){
        try{
            $password = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "call add_user('$fullname','$email','user_pic.png', '$username', '$password','user', 'user_pic')";

            $con = new Database_connection();

            $query = $con->srvProcAlter($sql);
            if($query){
                return $query;
            }else{
                return -1;
            }
        }catch (Exception $e){
            return -2;
        }
    }

    function DeleteAccount(){

    }
}
include_once("D:/xampp/htdocs/DBLayer/Database_connection.php");
?>