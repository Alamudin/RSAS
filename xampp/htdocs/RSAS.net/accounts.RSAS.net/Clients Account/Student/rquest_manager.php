<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 3/16/2019
 * Time: 6:16 PM
 */
session_start();
include_once('student.php');
include_once('user_page_control.php');
include_once("dinamic_page_creator.php");
include_once('D:/xampp/htdocs/RSAS.net/accounts.RSAS.net/Account_management/manage_user_accounts/class.User.php');

if(isset($_GET['load_user_info'])){
    $userdisplay = new UserDisplay();
    $userdisplay->UserPicture();
    $userdisplay->printFullName();
}

if(isset($_GET['load_page_title'])){
    $userdisplay = new UserDisplay();
    $userdisplay->title();
}

if(isset($_GET['logout'])){
    $_SESSION['login'] = 'false';
    unset($_SESSION['username']);
    unset($_SESSION['fullname']);
    unset($_SESSION['picture']);
    unset($_SESSION['email']);
    header("Location: ../../../../RSAS.net/homepage.php");
}

if(isset($_GET['username']) && isset($_GET['fullname']) && isset($_GET['email']) && isset($_GET['npass'])){
    $uname = $_GET['username'];
    $fname = $_GET['fullname'];
    $email = $_GET['email'];
    $npass = $_GET['npass'];

    $st = new Student();
    $ur = new User();
    $result = $ur->searchUsers($uname,"default");
    if($result == 0){
        $result = $st->CreateAccount($uname, $email, $fname, $npass);
        if($result){
            echo 1;
        }
    }else if($result >0){
        echo "2";
    }else{
        echo "-3";
    }
}

if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page == "edit"){
        $pg = new Creator();
        $pg->EditProfile();
    }else if($page == "share"){
        $pg = new Creator();
        $pg->ShareDocs();
    }
}

if(isset($_GET['search'])){
    $uname = $_GET['search'];
    $st = new User();
    $result = $st->searchUsers($uname,"notdefault");
    if($result != -1){
        echo $result['Rcontent'];
    }else{
        echo "";
    }
}