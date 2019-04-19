
function _(id){
    return document.getElementById(id);
}

function pageOnLoad(){
    loadUserInfo();
    loadPageTitle();
}

function loadPageTitle(){
    var title = _("title");
    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Clients%20Account/First_Academics/request_manager.php?load_page_title";

    ajax.open("GET", text, "true");
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            title.innerHTML = this.responseText;
        }
    }
}

function loadUserInfo(){
    var userinfo = _("user_info");
    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Clients%20Account/First_Academics/request_manager.php?load_user_info";

    ajax.open("GET", text, "true");
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            userinfo.innerHTML = this.responseText;
        }
    }
}

function openPages(page){
    var board = _("inner-left");
    var heading = _("top_heading");
    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Clients%20Account/First_Academics/request_manager.php?page="+ page;

    if(page === "edit"){
        heading.innerHTML = "Edit Profile Information";
    }else if(page === "share"){
        heading.innerHTML = "Post Announcement or Information to All"
    }else if(page === "new_teacher"){
        heading.innerHTML = "Register Your Teachers";
    }

    ajax.open("GET", text, "true");
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            board.innerHTML = this.responseText;
        }
    };

    if(page === "new_teacher"){
        loadTeachers();
    }
}

function registerTeacher(username, email, teachername){
    var display = _('response-text');
    var uname = _(username).value;
    var uemail = _(email).value;
    var tname = _(teachername).value;
    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Clients%20Account/First_Academics/request_manager.php?tr_uname="+ uname +"&&tr_email="+ uemail +"&&tr_name=" + tname +"&&new_teacher";

    ajax.open("GET", text, "true");
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            display.innerHTML = this.responseText;
        }
    }
}

function loadTeachers(){
    var text = "../RSAS.net/accounts.RSAS.net/Clients%20Account/First_Academics/request_manager.php?load_teachers";
    var ajax = new XMLHttpRequest();
    ajax.open("GET", text, "true");
    ajax.send();
    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            _("registered_container").innerHTML = this.responseText;
        }
    };
}