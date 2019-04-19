<?php
session_start();
if(!isset($_SESSION['login']) || ($_SESSION['login'] == "false") || ($_SESSION['credential'] != "teacher")){
    header("Location: ./login.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Teachers</title>
    <link rel="icon" href="../RSAS.net/images/logo4.png" />
    <link rel="stylesheet" href="../static/feedback.css">
    <link rel="stylesheet" href="css/upload_popup.css">
    <link rel="stylesheet" href="css/new_shared.css">
    <link rel="stylesheet" href="css/user_profile_view.css">
    <link rel="stylesheet" href="./css/teacher.css">
    <script type="text/javascript" src="./js/teachers.js"></script>
    <script type="text/javascript" src="./js/EditProfile.js"></script>
    <script type="text/javascript" src="./js/upload.js"></script>
    <script type="text/javascript" src="js/feedback.js"></script>
    <script type="text/javascript" src="js/View_myaccount.js"></script>
    <meta name="viewport" content="width=device-width" />
</head>
<body onload="pageOnLoad()">
<div class="container">
    <header>
        <p id="top_heading" class="heading" >Resource Sharing Academic Support</p>
    </header>
    <div class="menu">
        <a href="../RSAS.net/homepage.php">
            <button class="menu-items">
                Home
            </button>
        </a>
        <button class="menu-items" onclick="openPages('edit')">
            EditProfile
        </button>
        <button class="menu-items" onclick="openPages('classchat')">
            Class Chats
        </button>
        <button class="menu-items" onclick="openPages('share')">
            Post
        </button>
        <a href="../RSAS.net/accounts.RSAS.net/Account_management/manage_user_accounts/account_request_manager.php?logout">
            <button class="menu-items" onclick="openPages('share')">
                Logout
            </button>
        </a>
    </div>
    <div class="inner-container">
        <div class="inner-left" id="inner-left">
            <section class="default_page_section">
                <p class="default_page_section_title">Here you have many courses to attend</p>
                <article class="default_courses">
                    <img src="../RSAS.net/images/user_pic.png" alt="image" class="default_page_image">
                    <div class="default_page_bottom_buttons_container">
                        <button class="default_bottom_buttons">
                            course 1
                        </button>
                        <button class="default_bottom_buttons">
                            2 Universities
                        </button>
                    </div>
                </article>
            </section>

            <section class="default_page_section">
                <p class="default_page_section_title">Here you have many courses to attend</p>
                <article class="default_courses">
                    <img src="../RSAS.net/images/user_pic.png" alt="image" class="default_page_image">
                    <div class="default_page_bottom_buttons_container">
                        <button class="default_bottom_buttons">
                            course 1
                        </button>
                        <button class="default_bottom_buttons">
                            Join
                        </button>
                    </div>
                </article>
            </section>
        </div>
        <div class="inner-right" id="inner-right">
            <footer>
                <a href="javascript:openFeedback()">
                    <li>feedback</li>
                </a>
                <p id="copy_right">RSAS.net<sup>&copy;</sup> 2018G.C/2011E.C All Right Reserved</p>
            </footer>
        </div>
    </div>
</div>
<div id="left" class="fixed-header">
    <div class="logo-container">
        <img src="../RSAS.net/images/logo4.png" alt="website" class="site-logo">
        <div class="website-name">
            RSAS.net
        </div>
    </div>
    <div class="other">
        <form id="search_form">
            <input id="fields" type="text" name="search_word" placeholder="Search here..."/>
            <button id="submit" type="submit">
                <img id="s_image" src="../RSAS.net/images/ic_search_category_default.png" width="100%" height="100%"/>
            </button>
        </form>
        <div id="user_info" class="user_ifo">
            <img class="user_image" id='user_image' src='../RSAS.net/images/user_pic.png' />
            <p class="username" id="username"> Username</p>
        </div>
    </div>
</div>
<div id="window" class="window">
    <div id="popup" class="popup">
        <p class="uploading_msg" id="uploading_msg">Uploading File...</p>
        <div id="progressbar" class="progressbar">
            <div id="progress" class="progress"></div>
        </div>
        <button id="okbtn" class="startbtn" onclick="hidewindow()">OK</button>
        <p class="file_name" id="file_name">file name: </p>
    </div>
</div>
<div class="view_profile" id="view_profile">
    <button class="exit_profile" onclick="closeProfileView()">close</button>
    <div class="inner_profile_container" id="profile_container">

    </div>
</div>
<?php include_once("../static/feedback_popup.php") ?>
</body>
</html>