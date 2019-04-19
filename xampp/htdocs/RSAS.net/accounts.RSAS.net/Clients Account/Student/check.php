<?php
session_start();
include_once("Student.php");

if(isset($_POST['submit'])){
    $filename = $_SESSION['username'].".png";
    $oname = basename($_FILES['new_pic']['name']);
    $tmp_place = $_FILES['new_pic']['tmp_name'];
    $new_place = "../profile_pictures/$filename";
    $type = pathinfo($oname,PATHINFO_EXTENSION);
    //explode('.', $oname);$ftype = strtolower($type);

    $allowed = array("jpg", "jpeg", "png", "ico");
    if(in_array($type, $allowed)){
        $manage = new EditProfile();
        $result = $manage->ChangeProfilePicture($filename, $_SESSION['username']);
        if($result == 1){
            if(move_uploaded_file($tmp_place, $new_place)){
                $_SESSION['picture'] = $filename;
                $msg = "Upload Successful";
            }else{
                unlink($tmp_place);
                $msg = "Upload file were not moved to the place where it supposed to be";
            }
            header("Location: user_page.php?edit= && message=$msg");
        }else{
            $error = "can't change the picture";
            unlink($tmp_place);
            header("Location: user_page.php?edit=ok && message=$error");
        }
    }else{
        unlink($tmp_place);
        $error = "the file type '$type'is not image";
        header("Location: user_page.php?edit= && message=$error");
    }
}

else if(isset($_SESSION['login']) && $_SESSION['login'] == "true" && isset($_SESSION['credential'])){
    $credential = $_SESSION['credential'];
    if($credential == 'user'){
        header("Location: ./Users/student_page.php");
    }else if($credential == 'admin'){
        header("Location: ./admin/admin.php");
    }else if($credential == 'academy') {
        header("Location: ./Users/student_page.php");
    }
}
?>