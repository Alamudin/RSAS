<?php

if(!isset($_SESSION['login']) || $_SESSION['login'] == "false"){
    header("Location: ../login.php");
}

class AdminDisplay{

    private $username;
    private $fullname;
    private $email;
    private $picture;
    private $credential;
    private $login;

    function __construct(){
        if(isset($_SESSION['login']) && $_SESSION['login'] == 'true' && isset($_SESSION['username'])){
            $this->username = $_SESSION['username'];
            $this->login = $_SESSION['login'];
            $this->email = $_SESSION['email'];
            $this->credential = $_SESSION['credential'];
            $this->picture = $_SESSION['picture'];
            $this->fullname = $_SESSION['fullname'];
        }
    }

    function getFullName(){
        return $this->fullname;
    }

    function printFullName(){
        print $this->fullname;
    }

    function getUsername(){
        return $this->username;
    }

    function printUsername(){
        print $this->username;
    }

    function UserPicture(){
        print "<img id='user_image' src='../profile_pictures/$this->picture' width='80%' height='400px' />";
    }

    function getPicture(){
        return $this->picture;
    }
}
?>