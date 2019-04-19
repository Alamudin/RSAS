<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 3/23/2019
 * Time: 10:52 AM
 */

include_once("class.courses.php");

if(isset($_GET['c_title']) && isset($_GET['c_description'])){
    $title = $_GET['c_title'];
    $description = $_GET['c_description'];
    $course = new Courses();
    $result = $course->CreateCourse($title, $description);
    if($result == 1){
        echo "operation successful";
    }else if($result < 1){
        echo "operation failed";
    }
}

?>