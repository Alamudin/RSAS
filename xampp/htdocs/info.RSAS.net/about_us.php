<!DOCTYPE HTML>
<html>
<head>
    <title>About Us</title>
    <link rel="icon" href="../RSAS.net/images/logo4.png" />
    <link rel="stylesheet" href="../static/feedback.css">
    <link rel="stylesheet" href="css/rsasteam.css">
    <link rel="stylesheet" href="css/about_us.css">
    <script src="js/about_us.js"></script>
    <meta name="viewport" content="width=device-width">
</head>
<body>
<div class="container">
    <header>
        <a href="../RSAS.net/homepage.php"><p id="heading"><b>RSAS</b>.net</p></a>
        <p id="av">Resource Sharing Academic Support</p>
        <form id="search_form">
            <input id="fields" type="text" name="search_word" placeholder="Search here..."/>
            <button id="submit" type="submit">
                <img id="s_image" src="../RSAS.net/images/ic_search_category_default.png" width="100%" height="100%"/>
            </button>
        </form>
    </header>
    <nav class="menu">
        <a href="../RSAS.net/homepage.php"><button class="menu_items">
            Home
        </button></a>
        <button class="menu_items" onclick="createPage(this, 'privacy')">
            Privacy
        </button>
        <button class="menu_items" onclick="createPage(this, 'contact us')">
            Contact us
        </button>
        <button class="menu_items" onclick="createPage(this, 'team')">
            RSAS Team
        </button>
    </nav>

    <div id="inner_container" class="inner_container">

    </div>
    <footer>
        <br/>
        <div class="footer_info">
            Contact Us<br/>
            <ul>
                <li>tele: +2512345678</li>
                <li>Email: <a href="#">go</a></li>
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


    <!--
    -->

</div>
<?php include_once("../static/feedback_popup.php") ?>
</body>
</html>