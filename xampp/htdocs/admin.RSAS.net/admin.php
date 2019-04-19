<?php
session_start();
include_once("../RSAS.net/accounts.RSAS.net/Administration/Account/admindisplay.php");
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Administrator</title>
    <link rel="icon" href="../RSAS.net/images/logo4.png" />
    <link rel="stylesheet" href="../RSAS.net/css/header.css">
    <link rel="stylesheet" href="../RSAS.net/css/footer.css">
    <link rel="stylesheet" href="css/message.css"/>
    <link rel="stylesheet" href="css/admin.css"/>
    <link rel="stylesheet" href= "css/add_course.css">
    <meta name="viewport" content="width=device-width" />
    <script type="text/javascript" src="js/add.js"></script>
</head>
<body>
<div class="container">

    <?php  include("../static/header1.php"); ?>

    <div class="nav">
        <button onclick="listing('feedback')">
            Feedback
            <div class="count" id="feedback_count"></div>
        </button>
        <button onclick="listing('mail')">
            Message
            <div class="count" id="mail_count"></div>
        </button>
        <button onclick="openPage('add_course')">
            Add Course
        </button>

        <button onclick="openPage('new_academy')">
            New Academy
        </button>

        <a href="../RSAS.net/accounts.RSAS.net/Account_management/manage_user_accounts/account_request_manager.php?logout">
            <button id="logout">
                Logout
            </button>
        </a>

        <a href="../CRML/Manager_view/manager.php">
            <button>
                Server
            </button>
        </a>

    </div>

    <section class="inner_container" id="inner_container">
        <?php echo $_SESSION['credential']; ?>
    </section>


    <footer>
        <p id="copy_right">RSAS.net<sup>&copy;</sup> 2018G.C/2011E.C All Right Reserved</p>
    </footer>
</div>
</body>
</html>