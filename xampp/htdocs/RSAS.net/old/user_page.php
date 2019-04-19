<?php
session_start();
include_once("user_page_control.php");
include_once("dinamic_page_creator.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <?php $userdisplay = new UserDisplay();
    $userdisplay->title();
    ?>
    <link rel="icon" href="../images/logo4.png" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/user_page.css" />
    <link rel="stylesheet" href="../css/chat_page.css" />
    <link rel="stylesheet" href="../css/shared.css" />
    <link rel="stylesheet" href="../css/edit_profile.css" />
    <script type="text/javascript" src="../javascript/main.js"></script>
    <script type="text/javascript" src="../javascript/user.js"></script>
    <meta name="viewport" content="width=device-width" />
</head>
<body onload="onload_body()">
<div class="container">
    <?php include("../static/header1.php") ?>
    <section id="left">
        <br/>
        <div id="user_info">
            <?php $userdisplay = new UserDisplay();
            $userdisplay->UserPicture();
            ?>
            <p id="username">
                <?php $userdisplay = new UserDisplay();
                $userdisplay->printFullName();
                ?>
            </p>
        </div>
        <div id="menu">
            <a href="user_page.php?edit"><button class="menu_items" >
                <img class="item_image" src="../images/edit.png"/>  Edit Profile
            </button></a>
            <a href="user_page.php?notification">
                <button class="menu_items">
                    <img class="item_image" src="../images/notification_small.png"/> Notification
                </button></a>
            <a href="user_page.php?forums"><button class="menu_items">
                <img class="item_image" src="../images/forum.png"/> My Forums
                </button></a>
            <a href="user_page.php?share"><button class="menu_items">
                <img class="item_image" src="../images/share.png"/> Share Docs
                </button></a>
            <a href="user_page.php?attending"><button class="menu_items">
                <img class="item_image" src="../images/chat.png"/> Attending
                </button></a>
            <a href="user_page.php?my_account"><button class="menu_items">
                <img class="item_image" src="../images/forum.png"/>My account
                </button></a>
            <a href="check.php?logout"><button class="menu_items">
                    <img class="item_image" src="../images/forum.png"/>Logout
                </button></a>
        </div><br/>
    </section>
    <?php
    if(isset($_GET['attending'])){
        $printer = new Creator();
        $printer->AttendingPage();
    }else if(isset($_GET['chat'])){
        $printer = new Creator();
        $printer->ChatPage();
    }else if(isset($_GET['share'])){
        $printer = new Creator();
        $printer->ShareDocs();
    }else if(isset($_GET['edit'])){
        $printer = new Creator();
        $printer->EditProfile();
    }

    ?>
    <footer>
        <br/>
        <div class="footer_info">
            Contact Us<br/>
            <ul>
                <li>tele: +2512345678</li>
                <li>Email:babbikebede21@gmail.com</li>
                <li>website: RSAS.net</li>
            </ul>
        </div>
        <div class="footer_info">
            Forums<br/>
            <ul>
                <li>Electronics</li>
                <li>Electrical</li>
                <li>programming</li>
                <li>Python</li>
                <li>Java</li>
                <li>Php</li>
                <li>Web Designers</li>
                <li>More</li>
            </ul>
        </div>
        <div class="footer_info">
            About Us<br/>
            <ul>
                <li>Company</li>
                <li>RSAS Team</li>
                <li>Privacy Policy</li>
                <li>Developers</li>
            </ul>
        </div>
        <p id="copy_right">RSAS.net<sup>&copy;</sup> 2018G.C/2011E.C All Right Reserved</p>
    </footer>

    <?php
    if(isset($_GET['message'])){
        $msg = $_GET['message'];
    print "<div id=\"result_info\" class=\"result_info\">
                <p id=\"message\">$msg</p>
                <button class=\"exit_left\" onclick=\"hide_show()\">X</button>
            </div>";
    }
    ?>


</div>
</body>
</html>