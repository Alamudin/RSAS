<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 3/16/2019
 * Time: 6:34 PM
 */
session_start();
include_once("EditProfile.php");
include_once("class.User.php");
include_once("D:/xampp/htdocs/DBLayer/Database_connection.php");

/**
 * this code will change the profile picture of the user
 */
if(isset($_POST['change_pic'])){
    $oname = basename($_FILES['file']['name']);
    $tmp_place = $_FILES['file']['tmp_name'];
    $type = pathinfo($oname,PATHINFO_EXTENSION);
    $filename = $_SESSION['username'].".$type";
    $new_place = "../../../profile_pictures/$filename";
    //explode('.', $oname);$ftype = strtolower($type);

    $allowed = array("jpg", "jpeg", "png", "ico");
    if(in_array($type, $allowed)){
        $manage = new EditProfile();
        $result = $manage->ChangeProfilePicture($filename, $_SESSION['username']);
        if($result == 1){
            if(move_uploaded_file($tmp_place, $new_place)){
                //$msg = "Upload Successful";
                echo "Operation Successful";
                $_SESSION['picture'] = $filename;
                $con = new Database_connection();
                $con->updateAllProfile($new_place, $filename);
            }else{
                unlink($tmp_place);
                //$msg = "Upload file were not moved to the place where it supposed to be";
                echo "The Uploaded file cannot move";
            }
            //header("Location: user_page.php?edit= && message=$msg");
        }else{
            //$error = "can't change the picture";
            echo "Operation failed 1";
            unlink($tmp_place);
            //header("Location: user_page.php?edit=ok && message=$error");
        }
    }else{
        unlink($tmp_place);
        echo "type not allowed, Operation failed";
        //$error = "the file type '$type'is not image";
        //header("Location: user_page.php?edit= && message=$error");
    }
}

/** this code will change the name of the user which request for this */
if(isset($_GET['change_name'])){
    $fname = $_GET['fname'];
    $username = $_SESSION['username'];
    $profile = new EditProfile();
    $res = $profile->ChangeName($fname, $username);
    if($res == 1){
        echo "Operation Successful";
        $_SESSION['fullname'] = $fname;
    }else{
        echo "Operation failed";
    }
}

/**
 *
 */
if(isset($_GET['change_pass'])){
    $cr_pass = $_GET['cr_pass'];
    $newpass = $_GET['newpass'];
    $uname = $_SESSION['username'];
    $edit = new EditProfile();
    $result = $edit->changePassword($cr_pass, $newpass, $uname);

    if($result == 1){
        echo "Operation Successful, use the new password on the next login";
    }else if($result == -1){
        echo "The current password does not match, Operation failed";
    }else{
        echo "Operation failed";
    }

}

/** manage request from academic office to logout */
if(isset($_GET['logout'])){
    $_SESSION['login'] = 'false';
    unset($_SESSION['username']);
    unset($_SESSION['fullname']);
    unset($_SESSION['picture']);
    unset($_SESSION['email']);
    header("Location: ../../../../RSAS.net/homepage.php");
}

/** this code will search users from the database
 * and it will send response back to where the request comes from
 */
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

if(isset($_GET["my_account"])){
    $pic = $_SESSION['picture'];
    $name = $_SESSION['fullname'];
    $email = $_SESSION['email'];
    $cred = $_SESSION['credential'];
    $uname = $_SESSION['username'];

    echo "<div class=\"top_user_profile\">
            <img src=\"../RSAS.net/profile_pictures/$pic\" alt=\"image\" class=\"user_pic\">
            <div class=\"user_top_info\">
                <p>Full Name: $name<br/>
                    Username: $uname</p>
            </div>
            <button class=\"exit_profile\">Delete Account</button>
        </div>
        <div class=\"user_profile_bottom_container\">
            <p>Email Address: $email<br>
                Account type: $cred <br>
                Class Attending: numbers <br>
                Forums Attending: numbers <br>
                head: head_user</p>
        </div>";
}