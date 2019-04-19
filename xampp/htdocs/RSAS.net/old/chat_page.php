<!DOCTYPE HTML>
<html>
<head>
    <title>Chatting</title>
    <link rel="icon" href="../images/rsas.png" />
    <link rel="stylesheet" href="../css/edit_profile.css" />
    <script type="text/javascript" src="../javascript/main.js"></script>
    <meta name="viewport" content="width=device-width" />
</head>
<body onload="onload_body()">
<div class="container">
    <header>
        <p id="heading"><b>RSAS</b>.net</p>
        <p id="av">Resource Sharing Academic Support</p>
        <form id="search_form">
            <input id="fields" type="text" name="search_word" placeholder="Search here..."/>
            <button id="submit" type="submit">
                <img id="s_image" src="../images/ic_search_category_default.png" width="100%" height="100%"/>
            </button>
        </form>
    </header>

    <section id="left">
        <br>
        <div id="user_info">
            <img id="user_image" src="../profile_pictures/user_pic.png" width="80%" height="400px"/>
            <p id="username">Mr Username</p>
        </div>
        <div id="menu">
            <button class="menu_items">
                <img class="item_image" src="../images/edit.png"/>  Edit Profile
            </button>
            <button class="menu_items">
                <img class="item_image" src="../images/notification_small.png"/> Notification
            </button>
            <button class="menu_items">
                <img class="item_image" src="../images/forum.png"/> My Forums
            </button>
            <button class="menu_items">
                <img class="item_image" src="../images/share.png"/> Share Docs
            </button>
            <button class="menu_items">
                <img class="item_image" src="../images/chat.png"/> Attending
            </button>
            <button class="menu_items">
                <img class="item_image" src="../images/forum.png"/>My account
            </button>
        </div><br/>
    </section>

    <section id="edit_profile">
        <article class="edit_container">
            <a href="javascript:for_name()"><h4 class="edit_small_titles">Change Username</h4></a>
            <form id="edit_change_name">
                <input required class="fields" type="text" placeholder="New Username" name="nusername"/>
                <input class="submit" type="submit" value="Save"/><br/>
            </form>
        </article><br/>
        <hr id="edit_horizontal">
        <article class="edit_container">
            <a href="javascript:for_pass()"><h4 class="edit_small_titles">Change Password</h4></a>
            <form id="edit_change_pass">
                <input required class="fields" type="password" placeholder="Current password" name="cr_password"/><br/>
                <input required class="fields" type="password" placeholder="New password" name="cr_password"/><br/>
                <input required class="fields" type="password" placeholder="Confirm password" name="cr_password"/>
                <input class="submit" type="submit" value="Save"/><br/>
            </form>
        </article><br/>
        <hr id="edit_horizontal">
        <article class="edit_container">
            <a href="javascript:for_pic()"><h4 class="edit_small_titles">Change Profile Picture</h4></a>
            <form id="edit_change_picture">
                <input required class="fields" type="file" name="new_pic"/>
                <input class="submit" type="submit" value="Save"/><br/>
            </form>
        </article>
        <br/>
    </section>
    <br/><br/>
    <footer>
        <br/>
        <div class="footer_info">
            Contact Us<br/>
            <ul>
                <li>tele: +2512345678</li>
                <li>Email:babbikebede21@gmail.com</li>
                <li>website: RSAS.net</li>
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
</body>
</html>