<?php
session_start();
?>
<html>
<head>
	<title> forget password </title>
	<link rel="icon" href="../RSAS.net/images/logo4.png" />
    <link rel="stylesheet" href="../static/loading.css">
    <link rel="stylesheet" href="../static/feedback.css">
    <link rel="stylesheet" href="css/forgotepass.css">
    <link rel="stylesheet" href="../RSAS.net/css/footer.css">
    <script type="text/javascript" src="js/forgotepass.js"></script>
    <script type="text/javascript" src="js/feedback.js"></script>
    <meta name="viewport" content="width=device-width" />
</head>

<body onload="changeonload()">
<div class="container">
    <div class="inner_container" id="inner_container">
        Search Your Account Using You Email Address!!


        <!-- <div class="change_pass" id="confirmation">
            <span class="username">Confirm it's You</span>
            <input type='text' placeholder='Enter Confirmation Code' id='new' class='inputs'>
            <input type='submit' value='Send' class='changebtn' id="change" onclick="confirmAccount()"/>
        </div> -->
    </div>
    <?php
    include("../static/footer.php");
    ?>
</div>

<div class="top-container">
    <a href="../RSAS.net/homepage.php"><button class="home" >Home</button></a>
    <div class="sform">
        <input type="email" class="email" placeholder="Find your account" id="email"/>
        <button class="search" onclick="searchByEmail()">Find</button>
    </div>
</div>

<?php include_once("../static/feedback_popup.php");?>
<?php include("../static/loading.php"); ?>
</body>
</html>