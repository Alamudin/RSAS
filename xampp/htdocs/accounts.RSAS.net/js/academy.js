function pageOnLoad(){
    loadUserInfo();
    loadPageTitle();
    loadDefault();
}

/**
 * this function provide easy way of accessing elements of the html page by id.
 * */
function _(id){
    return document.getElementById(id);
}

/**
 * this function enable the page the title of the page form server using ajax xmlhttprequest.
 * "../RSAS.net/accounts.RSAS.net/Clients%20Account/First_Academics/request_manager.php?load_page_title"
 **/
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
    };
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

function loadDefault(){
}

function openPages(page){
    var board = _("inner-left");
    var heading = _("top_heading");
    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Clients%20Account/First_Academics/request_manager.php?page="+ page;

    ajax.open("GET", text, "true");
    ajax.send();
    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            board.innerHTML = this.responseText;
        }
    };

    if(page === "edit"){
        heading.innerHTML = "Edit Profile Information";
    }else if(page === "share"){
        heading.innerHTML = "Post Announcement or Information to All"
    }else if(page === "new_department"){
        heading.innerHTML = "Register Department";
    }
}
function Register_department(){
    var response = _("response-text");
    var duname = _("office_username").value;
    var demail = _("email_address").value;
    var dname = _("full_name").value;
    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Clients%20Account/First_Academics/request_manager.php?duname="+ duname +"&&demail="+demail+"&&dname="+dname +"&& register_dept";
    ajax.open("GET", text, "true");
    ajax.send();
    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            response.innerHTML = this.responseText;
        }
    };
}


function fileSelector(){
    var input = _("shared_input");
    input.click();
}

function loadDepartments(){
    var html = "<div class=\"add_office\">" +
                    "<p id=\"response-text\"></p>" +
                    "<div class=\"top_container\">" +
                        "<input type=\"text\" placeholder=\"Username\" class=\"field_medium\" name=\"username\" id=\"office_username\"/><br/>" +
                        "<input type=\"email\" placeholder=\"Email Address\" class=\"field_medium\" id=\"email_address\"/><br>" +
                        "<input type=\"text\" placeholder=\"Department Name\" class=\"field_medium\" id=\"full_name\"/><br>" +
                        "<button class=\"submit_medium\" type=\"submit\" onclick='Register_department()'>Add Department</button>" +
                    "</div>" +
                    "<div class=\"bottom_container\" id='registered_container'>" +
                        "<div class=\"add_dept_title\" >Registered Departments</div>";

    var container = _("inner-left");
    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Clients%20Account/First_Academics/request_manager.php?loadDept";

    ajax.open("GET", text, "true");
    ajax.send();
    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            html = html + this.responseText;
        }
    };

    html = html + "</div></div>";
    container.innerHTML = html;
}
