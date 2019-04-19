<!DOCTYPE HTML>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/contact_us.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<div class="container">
    <?php
    include("../static/header.php");
    ?>
    <section id="menu">
        <br>
        <a href="about_us.php?company"><button class="menu_items" >
                <img class="item_image" src="../images/edit.png"/>  Company
            </button></a>
        <a href="about_us.php?privacy"><button class="menu_items">
                <img class="item_image" src="../images/notification_small.png"/> Privacy
            </button></a>
        <a href="about_us.php?contact_us"><button class="menu_items">
                <img class="item_image" src="../images/forum.png"/> Contact_us
            </button></a>
        <a href="about_us.php?team"><button class="menu_items">
                <img class="item_image" src="../images/share.png"/> RSAS Team
            </button></a>
    </section>
    <section id="contact_us">
        <h1 class="contact_us_title">Contact Us</h1><hr/>
        <br/>
        <article class="contact_us_info">
            <p class="contact_us_text">
                you can contact us using telephone in all over Ethiopia<br/>
                tele: +251 91-234-5678 <br/>
                or in our website: http://www.rsas.net
            </p>
        </article>
        <hr>
        <form id="contact_us_form">
            <input required type="text" class="contact_us_fields" placeholder="Email" name="email"><br><br>
            <input required type="text" class="contact_us_fields" placeholder="Subject" name="subject"><br><br>
            <textarea required name="body" id="email_body" placeholder="Body of the message"></textarea><br/><br>
            <button id="send_mail" type="submit">Send</button><br><br>
        </form>
    </section>
    <?php
    include("../static/footer.php");
    ?>
</div>
</body>
</html>