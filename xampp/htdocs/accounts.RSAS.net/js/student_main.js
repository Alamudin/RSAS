/**
 * Created by Abnet on 2/5/2019.
 */


function pageOnLoad(){
    loadPageTitle();
    loadUserInfo();
}

function _(id){
    return document.getElementById(id);
}

function loadUserInfo(){
    var userinfo = _("user_info");
    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Clients%20Account/Student/rquest_manager.php?load_user_info";

    ajax.open("GET", text, "true");
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            userinfo.innerHTML = this.responseText;
        }
    }
}

function loadPageTitle(){
    var title = document.getElementById("title");
    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Clients%20Account/Student/rquest_manager.php?load_page_title";

    ajax.open("GET", text, "true");
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            title.innerHTML = this.responseText;
        }
    }
}

function logout(){
    var ajax = new XMLHttpRequest();
    var text = "../../RSAS.net/account.RSAS.net/Clients%20Account/Student/rquest_manager.php?logout";

    ajax.open("GET", text, "true");
    ajax.send();
}

function createPage(button,page_name){
    var older = document.getElementsByClassName("special_menu_items");
    var container = document.getElementById("inner_container");
    var text = "../RSAS.net/accounts.RSAS.net/Clients%20Account/Student/rquest_manager.php?page="+page_name;
    var ajax = new XMLHttpRequest();

    ajax.open("GET", text, "true");
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState==4 && this.status == 200){
            var response = this.responseText;
            if(response != ""){
                container.innerHTML = response;
                older.className = "menu_items";
                button.className = "special_menu_item";
            }
        }
    }
}


function hide_show(){
    var div = document.getElementById("result_info");
    div.style.display = "none";
}

