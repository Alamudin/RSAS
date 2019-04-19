<!DOCTYPE HTML>
<html>
<head>
    <title>Upload Tutorials</title>
    <link rel="stylesheet" href="./css/upload_tutorial.css">
    <link rel="stylesheet" href="../static/feedback.css">
    <link rel="stylesheet" href="../RSAS.net/css/footer.css">
    <link rel="stylesheet" href="../RSAS.net/css/header.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<div class="container">
    <?php
    include("../static/header.php");
    ?>

    <section class="sections">
        <h1 class="upload_title">UPLOAD TUTORIAL</h1><hr/><br/>
        <form action="" id="video_uploads">
            <label for="upload_field">Video File</label><br/>
            <input type="file" class="upload_field" name="file"><br/><br/>
            <label for="description">Video Description</label><br/>
            <textarea name="description" id="description" cols="30" rows="30"></textarea>
            <br/><br/>
            <button type="submit" id="upload"> Upload </button>
        </form>
    </section><br/>
    <section class="sections">
        <h1 class="upload_title">PREVIOUSLY UPLOADED TUTORIALS</h1><hr/>
        <br>
        <article>
            <video src="" class="small_view"></video>
            <div class="about_video">
                <p class="video_title">the title will be here</p>
                <p class="video_narration">date: dec 2 2018 time: 1:25</p>
                <p class="statistics">views:200 downloads:143</p>
            </div>
        </article>
        <br>
        <article>
            <video src="" class="small_view"></video>
            <div class="about_video">
                <p class="video_title">the title will be here</p>
                <p class="video_narration">date: dec 2 2018 time: 1:25</p>
                <p class="statistics">views:200 downloads:143</p>
            </div>
        </article><br/>
    </section>

    <?php
    include("../static/footer.php");
    ?>
</div>
</body>
</html>


