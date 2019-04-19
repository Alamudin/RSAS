<?php
session_start();
include_once("class.Administrator.php");
include_once("D:/xampp/htdocs/DBLayer/Database_connection.php");

if(isset($_GET['check_username'])){
    $username = $_GET['check_username'];
    $admin = new Administrator();
    $admin->searchByUsername($username);
}

if(isset($_REQUEST['username']) && isset($_REQUEST['email_address']) && isset($_REQUEST['Full_name'])){
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email_address'];
    $name = $_REQUEST['Full_name'];
    $admin = new Administrator();
    $result = $admin->RegisterAcademy($username, $email, $name);
    echo $result;
}

if(isset($_REQUEST['load_academy'])){
    $result = array();
    $admin = new Administrator();
    $result = $admin->loadAcademy();
    echo $result;
}

if(isset($_GET['logout'])){
    $_SESSION['login'] = 'false';
    unset($_SESSION['username']);
    unset($_SESSION['fullname']);
    unset($_SESSION['picture']);
    unset($_SESSION['email']);
    header("Location: ../homepage.php");
}

?>