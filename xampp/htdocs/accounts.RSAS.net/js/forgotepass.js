function _(id){
    return document.getElementById(id);
}

function start_loading(){
    _("loading").style.display = "block";
}

function end_loading(){
    _("loading").style.display = "none";
}

function changepass(){
    var a = _("right");
    var b = _("quest");
    a.style.visibility = "visible";
    b.style.visibility = "hidden";
}

function changeonload(){
    var b = _("right");
    b.style.visibility = "hidden";
}

/*function changepassno(){
    var a = document.getElementById("change");
    var b = document.getElementById("main");
    a.style.visibility = "hidden";
    b.style.visibility = "hidden";
}*/

function changepasscancel(){
    var a = _("right");
    var b = _("quest");
    a.style.visibility = "hidden";
    b.style.visibility = "visible";

}

function searchByEmail(){
    start_loading();
    var display = _("inner_container");
    var email = _("email").value;
    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Account_management/Logins/forgotepass_request_manager.php?email="+ email +"&& search_user";

    ajax.open("GET", text, true);
    ajax.send();
    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            display.innerHTML = this.responseText;
        }
    };

    end_loading();
}

function myAccount(uname){
    var display = _("inner_container");
    display.innerHTML = "<div class=\"change_pass\" id=\"change_pass\">" +
        "            <span class=\"username\" id='changedisplay'>"+uname+"</span>" +
        "            <input type='password' placeholder='New Password' id='newpass' class='inputs'>\n" +
        "            <input type='password' placeholder='Confirm Password' id='confirm' class='inputs'/>\n" +
        "            <input type='submit' value='Change' class='changebtn' id=\"change\" onclick=\"changePassword('"+uname+"')\"/>" +
        "        </div>";
}

function changePassword(uname){
    var display = _("inner_container");
    var response = _("changedisplay");
    var npass = _("newpass").value;
    var confirm = _("confirm").value;
    var text = "../RSAS.net/accounts.RSAS.net/Account_management/Logins/forgotepass_request_manager.php?newpass="+ npass +"&&user_name="+uname+"&& change_pass";

    if(npass !== "" && confirm !== ""){
        if(npass === confirm){
            var ajax = new XMLHttpRequest();
            ajax.open("GET", text, "true");
            ajax.send();

            ajax.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    display.innerHTML = this.responseText;
                }
            }
        }else{
            response.innerHTML = "password is not confirmed";
        }
    }
}