<?php
    class UserDisplay{

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

        function title(){
            echo $this->fullname;
        }

        function getFullName(){
            return $this->fullname;
        }

        function printFullName(){
            echo "<p class='username' id='username'>$this->fullname </p>";
        }

        function getUsername(){
            return $this->username;
        }

        function printUsername(){
            print $this->username;
        }

        function UserPicture(){
            echo "<img class='user_image' id='user_image' src='../RSAS.net/profile_pictures/$this->picture' />";
        }

        function getPicture(){
            return $this->picture;
        }
    }
?>