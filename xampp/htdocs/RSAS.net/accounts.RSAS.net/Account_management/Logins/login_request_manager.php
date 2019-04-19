<?php
session_start();
include_once("class.login.php");
include_once('D:/xampp/htdocs/RSAS.net/accounts.RSAS.net/Account_management/manage_user_accounts/class.User.php');

if(isset($_POST['username']) && isset($_POST['pass'])){
    $user = $_POST['username'];
    $pas = $_POST['pass'];
    $st = new login($user, $pas);
    $result = $st->login();
    $st->Authenticate($result);
}
else if(isset($_SESSION['login']) && $_SESSION['login'] == "true" && isset($_SESSION['credential'])){
    $credential = $_SESSION['credential'];
    if($credential == 'user'){
        header("Location: ./student_page.php");
    }else if($credential == 'admin'){
        header("Location: ../admin.RSAS.net/admin.php");
    }else if($credential == 'academy') {
        header("Location: ./academic_page.php");
    }else if($credential == 'dept') {
        header("Location: ./department_page.php");
    }else if($credential == 'teacher') {
        header("Location: ./teachers.php");
    }
}
?>