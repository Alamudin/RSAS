<?php
session_start();
include_once("AcademicOffice.php");
include_once("Academy_display.php");
include_once("Department.php");
include_once("D:/xampp/htdocs/DBLayer/Database_connection.php");

/** request from academic office page to load user info to the top right corner of the page */
if(isset($_GET["load_user_info"])){
    $academy = new AcademyDisplay();
    $academy->UserPicture();
    $academy->printAcademyName();
}

/** request from academic office to register Department into the system */
if(isset($_GET["register_dept"])){
    $duname = $_GET["duname"];
    $demail = $_GET["demail"];
    $dname = $_GET["dname"];
    $departmentRegst = new AcademicOffice();
    $result = $departmentRegst->RegisterDepartment($dname, $duname , $demail);
    if($result == 1){
        echo "Operation Successful";
    }else if($result == -1){
        echo "Operation failed -1";
    }else if($result == 2){
        echo "there exist an other department with the same username";
    }else if($result == 0){
        echo "Operation Failed 0";
    }
}

/** this code receive request from academic office page to load page title */
if(isset($_GET['load_page_title'])){
    $userdisplay = new AcademyDisplay();
    $userdisplay->title();
}

/** this code receive request from academic office page to load requested page
 * which will be displayed on the left side of the page body
 */
if(isset($_GET['page'])){
    $page = $_GET['page'];
    $cred = $_SESSION['credential'];
    $pg = new AcademyDisplay();
    if($page == "edit"){
        $pg->EditProfile();
    }else if($page == "share"){
        $pg->ShareDocs();
    }else if($page == "new_department" && $cred == "academy"){
        $pg->addDepartment();
    }else if($page == "new_teacher" && $cred == "dept"){
        $pg->addTeachers();
    }
}

/**
 * this code will departments to add/register their teachers
 * this code will get its parameters through get request method
 */
if(isset($_GET['new_teacher'])){
    $tr_uname = $_GET['tr_uname'];
    $tr_email = $_GET['tr_email'];
    $tr_name = $_GET['tr_name'];

    $dept = new Department();
    $result = $dept->registerTeacher($tr_uname, $tr_email, $tr_name);
    if($result == 1){
        echo "Operation Successful";
    }else if($result == 0){
        echo "Operation failed 1";
    }else if($result == -1){
        echo "Operation failed 2";
    }
}

if(isset($_GET['load_departments'])){
    $admin = new AcademicOffice();
    $result = $admin->viewDepartments();
    echo $result;
}

if(isset($_GET['loadDept'])){
    echo "hi its me";
}

if(isset($_GET['load_teachers'])){
    $result = array();
    $admin = new Department();
    $result = $admin->viewTeachers();
    echo $result;
}

?>