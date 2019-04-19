<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 3/22/2019
 * Time: 11:52 PM
 */

include_once("Teacher_display.php");
session_start();
/** this code will help to open requested page */
if(isset($_GET['page'])){
    $page = $_GET['page'];
    $cred = $_SESSION['credential'];
    $pg = new Teacher_display();
    if($page == "edit"){
        $pg->EditProfile();
    }else if($page == "share"){
        $pg->ShareDocs();
    }else if($page == "assign" && $cred == "course_admin"){
        echo "TO ASSIGN TEACHERS TO COURSES";
    }
}

/** request from academic office page to load user info to the top right corner of the page */
if(isset($_GET["load_user_info"])){
    $academy = new Teacher_display();
    $academy->UserPicture();
    $academy->printAcademyName();
}

/** this code receive request from academic office page to load page title */
if(isset($_GET['load_page_title'])){
    $userdisplay = new Teacher_display();
    $userdisplay->title();
}

?>