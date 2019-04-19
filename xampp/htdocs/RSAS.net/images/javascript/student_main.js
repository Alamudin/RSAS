/**
 * Created by Abnet on 2/5/2019.
 */

function pageOnLoad(){
    loadPageTitle();
    loadUserInfo();
}

function loadUserInfo(){
    var userinfo = document.getElementById("user_info");
    var ajax = new XMLHttpRequest();
    var text = "dinamic_page_creator.php?load_user_info";

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
    var text = "dinamic_page_creator.php?load_page_title";

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
    var text = "dinamic_page_creator.php?logout";

    ajax.open("GET", text, "true");
    ajax.send();
}

function createPage(button,page_name){
    var older = document.getElementsByClassName("special_menu_items");
    var container = document.getElementById("inner_container");
    var text = "dinamic_page_creator.php?page="+page_name;
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

function changeName(){
    var data = document.getElementById('edit_username').value;
    var info_panel = document.getElementById('result_info');
    var message = document.getElementById('result_message');
    var ajax = new XMLHttpRequest();
    var text = "dinamic_page_creator.php?new_fname="+ data;

    if(data != '' && data.length >5 && data.length < 50){
        ajax.open("GET", text , "true");
        ajax.send();

        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var response = this.responseText;
                if(response > 0){
                    info_panel.style.display = "block";
                    message.innerHTML = "User Full name has been changed successfully";
                }else if(response < 0){
                    info_panel.style.display = "block";
                    message.innerHTML = "Operation failed! <br/> it is due to some network error we are, working on it";
                }
            }
        }
    }else{
        info_panel.style.display = "block";
        message.innerHTML = "Operation failed! <br/> Users Name should be greater than 5 and less tha 50 characters";
    }
}

function hide_show(){
    var div = document.getElementById("result_info");
    div.style.display = "none";
}

