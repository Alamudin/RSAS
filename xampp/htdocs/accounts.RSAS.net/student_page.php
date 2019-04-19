<?php
session_start();
if(!isset($_SESSION['login']) || ($_SESSION['login'] == "false") || ($_SESSION['credential'] != "user")){
    header("Location: ./login.php");
}
?>
<!DOCTYPE HTML>
<html >
<head>
    <title id="title"></title>
    <link rel="icon" href="../RSAS.net/images/logo4.png" />
    <link rel="stylesheet" href="../static/feedback.css">
    <link rel="stylesheet" href="css/upload_popup.css">
    <link rel="stylesheet" href="css/user_profile_view.css">
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="js/student_main.js"></script>
    <script type="text/javascript" src="js/upload.js"></script>
    <script type="text/javascript" src="js/EditProfile.js"></script>
    <script type="text/javascript" src="js/feedback.js"></script>
    <script type="text/javascript" src="js/View_myaccount.js"></script>
    <meta name="viewport" content="width=device-width" />
</head>
<body onload="pageOnLoad()">
<div class="container">
    <header>
        <p id="heading"><b>RSAS</b>.net</p>
        <p id="av">Resource Sharing Academic Support</p>
        <form id="search_form">
            <input id="fields" type="text" name="search_word" placeholder="Search here..."/>
            <button id="submit" type="submit">
                <img id="s_image" src="../RSAS.net/images/ic_search_category_default.png" width="100%" height="100%"/>
            </button>
        </form>
    </header>
    <section id="left" class="left">
        <div id="user_info" class="user_ifo">
            <img class="user_image" id='user_image' src='../RSAS.net/images/user_pic.png' />
            <p class="username" id="username"> Username</p>
        </div>
        <div id="menu" class="menu">
            <button class="menu_items" onclick='my_account()'>
                My Account
            </button>
            <button class="menu_items" onclick="createPage(this,'edit')">
                 Edit Profile
            </button>
            <button class="menu_items" onclick="createPage(this,'notification')">
                 Notification
            </button>
            <button class="menu_items" onclick="createPage(this,'forums')">
                 My Forums
            </button>
            <button class="menu_items" onclick="createPage(this,'share')">
                 Share Docs
            </button>
            <a href="../RSAS.net/accounts.RSAS.net/Clients%20Account/Student/rquest_manager.php?logout">
                <button class="menu_items">
                Logout
            </button></a>
        </div>
    </section>
    <div class="inner_container" id="inner_container">

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
    <footer>
        <br/>
        <div class="footer_info">
            Contact Us<br/>
            <ul>
                <li>tele: +2512345678</li>
                <li>Email:babbikebede21@gmail.com</li>
                <li>website: RSAS.net</li>
                <a href="javascript:openFeedback()">
                    <li>feedback</li>
                </a>
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
    <div class="result_info" id="result_info">
        <p id="result_message">hello</p>
        <button class="exit_left" onclick="hide_show()">X</button>
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


<!--<div id="popup_background">
    <div id="popup_container">
        <div class="popup_title">
            Feedback
        </div>
        <label for="main_feedback_text" class="feedback_text">
            your feedback will help us to improve our services
        </label>
        <textarea name="feedback_text" id="main_feedback_text" ></textarea><br>
        <button id="send_feedback" type="submit">Send</button>
    </div>
</div>-->