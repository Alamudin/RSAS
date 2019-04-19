<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Resource Sharing and Academic Support</title>
    <link rel="icon" href="images/logo4.png" />
    <link rel="stylesheet" href="./css/homepage.css" />
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="../static/feedback.css">
    <meta name="viewport" content="width=device-width" />
    <script type="text/javascript" src="../accounts.RSAS.net/js/feedback.js"></script>
</head>
<body>
<div class="container">
    <img id="header" src="images/book_near.jpg" />
    <nav>
        <button class="nav_home">Home</button>
        <a href="../forums.RSAS.net/forums.php"><button class="nav_btn">Forums</button></a>
        <a href="../tutorials.RSAS.net/tutorials.php"><button class="nav_btn">Tutorials</button></a>
    </nav>
    <form id="search_form">
        <input class="fields" type="text" name="search_word" placeholder="Search here..."/>
        <button id="submit" type="submit"><img id="s_image" src="images/ic_search_category_default.png" width="100%" height="100%"/></button>
    </form>
    <p id="heading"><b>RSAS</b>.net</p><br/>
    <p id="av">Resource sharing and Academic Support</p>
    <?php
    if(!isset($_SESSION['login']) || $_SESSION['login'] != "true"){
        print "<a href=\"../accounts.RSAS.net/login.php\"><button id=\"login\">Login</button></a>
                <p id=\"login_slogan\">Login to your account and share your knowledge with us</p>";
    }else{
        $name = $_SESSION['fullname'];
        $pic = $_SESSION['picture'];
        print "<div class='logged'>
                    <div class='logged_image'>
                        <a href='../accounts.RSAS.net/login.php'><img  src='profile_pictures/$pic' width='100%' height='100%'/></a>
                    </div>
                    <div class='logged_name'>$name</div>
               </div>";
    }
    ?>

    <?php include_once("../static/footer.php"); ?>
</div>
<?php include_once("../static/feedback_popup.php") ?>
</body>
</html>

<!--  -->