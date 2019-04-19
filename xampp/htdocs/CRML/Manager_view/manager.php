<?php
/**if(!isset($_SESSION['login']) || ($_SESSION['login'] == "false") || ($_SESSION['credential'] != "admin")){
    header("Location: ../../accounts.RSAS.net");
}*/
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>This Server</title>
    <link rel="stylesheet" href="manager.css">
    <<script type="text/javascript" src="manager.js"></script>
</head>
<body>
<div class="container">
    <div class="top_container">
        <img src="../../RSAS.net/images/logo4.png" alt="image" class="logo_top">
    </div>
    <button class="server_state" id="server_state">ONLINE</button>
    <div class="columns">
        <div class="inner_column">
            <div class="servers">
                my_Servername: Lenovo<br/>
                my Serverip: 21.23.243.34 <br>
                state: <p id="state"></p> <br>
                <p class="servers_label" id="last_check">Online Servers</p>
            </div>
            <div class="servers" id="o_servers">
                <button class="online_servers">Server one</button>
                <button class="online_servers">Server two</button>
                <button class="online_servers">Server two</button>
                <button class="online_servers">Server two</button>
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="inner_column">
            <div class="left_column_top">
                <button class="left_buttons" onclick="popupRegisterFolder()">Register srv</button>
                <button class="left_buttons" onclick="wakeOthers()">wakeOthers</button>
            </div>
            <div class="control_display" id="control_display">

            </div>
        </div>

    </div>
</div>

<div class="rcontainer" id="rcontainer">
    <div class="register_container">
        Register New Server
        <p id="register_response"></p>
        <div class="r_inner_container">
            <input type="text" placeholder="Server number" class="input-field" id="snum">
            <input type="text" placeholder="Server name" class="input-field" id="sname">
            <input type="text" placeholder="Server ip Address" class="input-field" id="sip">
            <input type="text" placeholder="database username" class="input-field" id="uname">
            <input type="password" placeholder="database password" class="input-field" id="pass">
            <input type="text" placeholder="database name" class="input-field" id="dbname">
            <button class="register_btn" onclick="registerSRV()">Register</button>
            <button class="register_btn" onclick="close_registration()">Cancel</button>
        </div>
    </div>
</div>
</body>
</html>