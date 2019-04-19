setInterval(checking, 2000);

function _(id){
    return document.getElementById(id);
}

function checking(){
    check_me();
    check_srv();
    checkOnServers();
}

function update_all(){
    var display = _("control_display");
    var ajax = new XMLHttpRequest();
    var text = "../server_controler.php?update_all";

    ajax.open("GET", text, true);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            display.innerHTML = this.responseText;
        }
    };
}

function check_me(){
    var me = _("server_state");
    var tell = _("state");
    var ajax = new XMLHttpRequest();
    var text = "../crm/Client_request_control.php?check_me";

    ajax.open("GET", text, true);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var response = this.responseText;
            if(response === "0"){
                me.style.background = "red";
                me.style.color = "white";
                me.innerHTML = "OFFLINE";
                tell.innerHTML = "offline";
            }else if(response === "1"){
                me.style.background = "green";
                me.style.color = "black";
                me.innerHTML = "ONLINE";
                tell.innerHTML = "online";
            }
        }
    };
}

function check_srv(){
    var display = _("last_check");
    var ajax = new XMLHttpRequest();
    var text = "../crm/Client_request_control.php?check_srv";

    ajax.open("GET", text, true);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            display.innerHTML = this.responseText;
        }
    };
}

function checkOnServers(){
    var display = _("o_servers");
    var ajax = new XMLHttpRequest();
    var text = "../crm/Client_request_control.php?available_srv";

    ajax.open("GET", text, true);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            display.innerHTML = this.responseText;
        }
    };

}

function popupRegisterFolder(){
    _("rcontainer").style.display = "block";
}

function close_registration(){
    _("rcontainer").style.display = "none";
}

function registerSRV(){
    var display = _("register_response");
    var snum = _("snum").value;
    var sname = _("sname").value;
    var sip = _("sip").value;
    var uname = _("uname").value;
    var pass = _("pass").value;
    var dbname = _("dbname").value;

    if(snum !== "" && sname !== "" && sip !== "" && uname !== "" && pass !== "" && dbname !== ""){
        var ajax = new XMLHttpRequest();
        var text = "../crm/server_controler.php?snum="+snum+"&& sname="+sname+"&& sip="+sip+"&& uname="+uname+"&& pass="+pass+"&& dbname="+dbname+"&& register";

        ajax.open("GET", text, true);
        ajax.send();

        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                display.innerHTML = this.responseText;
            }
        };
    }
}

function test(){
    var me = _("server_state");

    if(me.style.background === "red"){
        me.style.background = "green";
    }else{
        me.style.background = "red";
    }
}

function wakeOthers(){
    var display = _("o_servers");
    var ajax = new XMLHttpRequest();
    var text = "../crm/server_controler.php?wake_others";

    ajax.open("GET", text, true);
    ajax.send();
}