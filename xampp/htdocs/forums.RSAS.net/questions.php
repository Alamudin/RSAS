<!DOCTYPE HTML>
<html>
<head>
    <title>Questions</title>
    <link rel="icon" href="../RSAS.net/images/logo4.png" />
    <link rel="stylesheet" href="./css/questions.css" />
    <link rel="stylesheet" href="../RSAS.net/css/header.css">
    <link rel="stylesheet" href="../RSAS.net/css/footer.css">
    <meta name="viewport" content="width=device-width" />
</head>
<body>
<div class="container">
    <?php include_once("../static/header1.php") ?>
    <section id="left"><br/>
        <div class="under_left">My Forum</div><br/>
        <div class="questions">
            <div class="under_q">
                <img src="../RSAS.net/profile_pictures/user_pic.png" alt="user image">
                <p class="user_name">My Forum</p>
            </div>
            <p class="question">here goes the question to be asked?</p><br/><br/>
            <p class="narration">2 Answers date: nov 20 2018 time: 10:33 am</p>
        </div><br/>

        <div class="answers">
            <div class="under_a">
                <img src="../RSAS.net/profile_pictures/user_pic.png" alt="user image">
                <p class="user_name">My Forum</p>
            </div>
            <p class="answering">here goes the answer to be replay</p><br/><br/>
            <p class="narration"> date: nov 20 2018 time: 10:33 am</p>
        </div>
        <br/>

        <div class="answers">
            <div class="under_a">
                <img src="../RSAS.net/profile_pictures/user_pic.png" alt="user image">
                <p class="user_name">My Forum</p>
            </div>
            <p class="answering">here goes the answer to be replay</p><br/><br/>
            <p class="narration">date: nov 20 2018 time: 10:33 am</p>
        </div><br/>

        <form id="add_answer">
            <textarea id="answer" name="answer" placeholder="Write your answer here"></textarea><br/><br/>
            <button id="post_answer" type="submit">Answer</button>
        </form><br/>
    </section>
    <section id="right">
        Advertisement<br/>
        this site will change you whole life get in to the site you won't regret instead you will thank me share share...
    </section>

    <?php include_once("../static/footer.php") ?>
</div>
</body>
</html>