<?php
include_once("../RSAS.net/accounts.RSAS.net/Account_management/Logins/login_request_manager.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Login</title>
    <link rel="icon" href="../RSAS.net/images/logo4.png" />
    <link rel="stylesheet" href="../static/feedback.css">
    <link rel="stylesheet" href="css/loading.css">
    <link rel="stylesheet" href="../RSAS.net/css/header.css" />
    <link rel="stylesheet" href="../RSAS.net/css/footer.css" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/loading.css">
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/feedback.js"></script>
    <meta name="viewport" content="width=device-width" />
</head>
<body onload="onload_body()">
<div class="container">
    <?php include("../static/header.php") ?>
    <br/>
    <section class="middle_container">
        <form id="login" action="../RSAS.net/accounts.RSAS.net/Account_management/Logins/login_request_manager.php" method="post">
            <br/>
            <h2 class="title">Login Here</h2>
            <img id="login_image" src="../RSAS.net/profile_pictures/user_pic.png" width="128px" height="128px"/><br/><br/>
            <?php
            if(isset($_GET['err'])){
                $msg = $_GET['err'];
                print "<div class='error_msg'>$msg</div>";
            }
            ?>
            <br/><br/><br/><br/><br/><br/>
            <input required class="fields" type="text" placeholder="Username" name="username" id="lusername" onkeyup="search_user()"/>
            <hr/>
            <input required class="fields" type="password" placeholder="Password" name="pass" id="pass"/><br/><br/>
            <input class="submit" type="submit" value="Login"/><br/>
            <a href="forgottpassword.php"><p class="bottom_links">forgot password?</p></a>
            <a href="javascript:show_register()"><p class="bottom_links">I don't have Account</p></a><br/>
        </form>
        <div id="register">
            <br/>
            <h2 class="title">Register Here</h2>
            <p id="registerInfo"></p>
            <input required class="fields" type="text" placeholder="Username" name="username" id="username"/><br/>
            <p class="register_username_rules">
                The username you are going to fill should not be less than 3 and greater than 10 characters,
                and also it should contain '@' on the first.
            </p>
            <br/>
            <input required class="fields" type="text" placeholder="FullName" name="fullname" id="fullname"/><br/><br/>
            <input required class="fields" type="email" placeholder="Email" name="email" id="email"/><br/><br/>
            <p class="register_username_rules">
                in order to secure your account you have to create new password for your account that you are
                going to create, the password should not be greater than 16 and less than 5 character.
            </p><br/>
            <input required class="fields" type="password" placeholder="New Password" name="npass" id="npass"/><br/><br/>
            <input required class="fields" type="password" placeholder="Confirm-Password" name="cpass" id="cpass" /><br/><br/>
            <p class="register_username_rules">
                By signing up you are agreed to our terms and privacy policies
                you can read our terms and privacy policies
            </p>
            <button class="submit" onclick="register()" >Sign Up</button><br/>
            <a href="javascript:onload_body()"><p class="bottom_links">I have Account</p></a><br/>
        </div>
    </section>
    <br/>
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
</div>

<?php include_once("../static/feedback_popup.php"); ?>

<div class="loading" id="loading">
    <div class="loading_inner_container">
        <img src="../RSAS.net/images/loading.gif" alt="loading" class="loading_image">
        <p class="loading_message">LOADING</p>
    </div>
</div>
</body>
</html>