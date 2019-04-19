<!DOCTYPE HTML>
<html>
<head>
    <title>Tutorials</title>
    <link rel="icon" href="../RSAS.net/images/logo4.png" />
    <link rel="stylesheet" href="../static/feedback.css">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../RSAS.net/css/header.css">
    <link rel="stylesheet" href="../RSAS.net/css/footer.css">
    <link rel="stylesheet" href="./css/tutorials.css" />
    <script type="text/javascript" src="js/feedback.js"></script>
</head>
<body>
<div id="container">
    <?php include("../static/header1.php")  ?>
    <div class="navigation">
        <button class="nav_buttons">
            Home
        </button>
        <button class="nav_buttons">
            Forums
        </button>
    
    </div>

    <div id="left">
        <h1 id="main_video_title">The title will be here</h1>
        <div id="video_container">
            <video id="main_video">
                
            </video>
            <div id="video_cover"></div>
        </div>

        <div id="video_info">
            <p>Uploaded by: <br>
                Uploaded on: </p>
        </div>
        <section id="comment_section">
            <div class="comments">
                <img src="../RSAS.net/profile_pictures/user_pic.png" alt="user image"> <b>username</b>
                <p class="main_comment">the comment goes here </p>
                <p class="narrator">date: dec 10 2018 time: 2:00 am</p>
            </div>
            <hr/>
            <br/>
            <div class="comments">
                <img src="../RSAS.net/profile_pictures/user_pic.png" alt="user image"> <b>username</b>
                <p class="main_comment">the comment goes here </p>
                <p class="narrator">date: dec 10 2018 time: 2:00 am</p>
            </div>
            <hr/>
            <br/>
        </section>
    </div>

    <div id="right_sidebar"><br/>
        <img class="advert" src="../RSAS.net/images/Animal-HD-wallpaper-1920x1080-46.jpg" alt="advertisement">
        <div id="related_title">Related Video</div><br/>
        <div class="related">
            <img class="video_poster" src="../RSAS.net/images/nice_black_wallpaper.jpg" alt="video"/>
            <div class="video_info_mini">
                <p class="video_title_mini">The title will be here</p>
                <p class="narration">uploaded on: uploader: </p>
            </div>
        </div>
    </div>
    <?php include_once("../static/footer.php") ?>
</div>
<?php include_once("../static/feedback_popup.php") ?>
</body>
</html>