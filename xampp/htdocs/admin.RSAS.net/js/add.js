
setInterval(notifications,3000);

function _(id){
    return document.getElementById(id);
}

function notifications(){
    fetchNotification("feedback");
    fetchNotification("mail");
}

function fetchNotification(check){
    var ajax = new XMLHttpRequest();
    var text = "";
    if(check === "feedback"){
        text = "../RSAS.net/info.RSAS.net/request_management.php?check=mail";
        ajax.open("GET" , text, true);
        ajax.send();

        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var result = this.responseText;
                if(result === "0"){
                    _("mail_count").style.display = "none";
                }else{
                    _("mail_count").innerHTML = result;
                }

            }
        }
    }else if(check === "mail"){
        text = "../RSAS.net/info.RSAS.net/request_management.php?check=feedback";
        ajax.open("GET" , text, true);
        ajax.send();

        ajax.onreadystatechange = function(){
            if(this.readyState==4 && this.status == 200){
                var result = this.responseText;
                if(result === "0"){
                    _("feedback_count").style.display = "none";
                }else{
                    _("feedback_count").innerHTML = result;
                }
            }
        }
    }


}

function openPage(page){
    if(page === "message"){
        notifiction();
    }else if(page === "add_course"){
        addCourse();
    }else if(page === "new_academy"){
        newAcademy();
    }
}

function newAcademy(){
    _("inner_container").innerHTML = "<div class='wider_left_container' >" +
            "<p id='response' class='response'></p>"+
    "<input type='text' placeholder='Username' class='field_medium' name='username' id='academy_username' onkeyup='checkUsername()' required /><br/>"+
        "<input type='email' placeholder='Email Address' class='field_medium' name='email_address' id='email_address' required /> <br>"+
        "<input type='text' placeholder='Academy Name' class='field_medium' name='Full_name' id='Full_name' required/><br>"+
        "<button class='submit_medium' onclick='addAcademy()'>Add Academy</button>"+
    "</div>"+
    "<div class='right_small_side_bar' id='academy_side'></div>";
    var text = "../RSAS.net/accounts.RSAS.net/Administration/Account/for_admin.php?load_academy";
    var ajax = new XMLHttpRequest();
    ajax.open("GET", text, "true");
    ajax.send();
    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            _("academy_side").innerHTML = this.responseText;
        }
    };
}

function checkUsername(){
    var uname = _("academy_username");
    var text = "../RSAS.net/accounts.RSAS.net/Administration/Account/for_admin.php?check_username="+ uname.value;

    if(uname.value !== ""){
        var ajax = new XMLHttpRequest();
        ajax.open("GET", text, true);
        ajax.send();

        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var response = this.responseText;
                uname.style.border  = "3px solid "+response;
            }
        };
    }else{
        uname.style.border  = "3px solid red";
    }
}

function addAcademy(){
    var uname = _("academy_username");
    var email = _("email_address");
    var name = _("Full_name");
    var response = document.getElementById("response");

    if(uname.value !== "" && email.value !== "" && name.value !== ""){
        var ajax = new XMLHttpRequest();
        var text = "../RSAS.net/accounts.RSAS.net/Administration/Account/for_admin.php?username="+ uname.value +"& email_address="+ email.value +"& Full_name="+ name.value;
        ajax.open("GET" , text, true);
        ajax.send();

        ajax.onreadystatechange = function(){
            if(this.readyState==4 && this.status == 200){
                var result = this.responseText;
                if(result === "1"){
                    response.innerHTML = "operation successful";
                    response.style.background = "lightgreen";
                    response.style.color = "black";
                }else{
                    response.innerHTML = "operation failed";
                    response.style.background = "red";
                    response.style.color = "white";
                }
            }
        }
    }else{
        response.innerHTML = "first fill all the fields";
        response.style.color = "red";
    }
}

function addCourse(){
    _("inner_container").innerHTML = "<h1 class='add_course_title'>ADD NEW COURSE</h1>"+
    "<hr/><br/>"+
    "<div class='add_form'>"+
        "<p id='add_course_response' class='add_course_response'></p> <br/>"+
        "<input required type='text' id='add_course_title' class='add_course_field' placeholder='Course Title'/>"+
        "<textarea required id='add_course_description' class='add_course_description' placeholder='Course Description'></textarea>" +
        "<hr class='horizontal'/>"+
        "<input type='submit' class='create' value='Create'  onclick='addNewCourse()'/>"+
    "</div>" +
    "<br/><br/>";
}

function listing(view){
    var ajax = new XMLHttpRequest();
    var text = "";
    if(view === "feedback"){
        text = "../RSAS.net/info.RSAS.net/request_management.php?view=feedback";
    }else if(view === "mail"){
        text = "../RSAS.net/info.RSAS.net/request_management.php?view=mail";
    }

    ajax.open("GET" , text, true);
    ajax.send();
    ajax.onreadystatechange = function(){
        if(this.readyState==4 && this.status == 200){
            _("inner_container").innerHTML = this.responseText;
        }
    };

    /**
     * ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var data = JSON.parse(this.responseText);
                for(var i = 0; i < data.length; i++){
                    html = html +"<div class='feedback'>" +
                                        "<a href='javascript: readFeedback("+data[i].id+")'><p class='seen'>"+ data[i].seen +"</p> </a>" +
                                        "<div class='mail_subject'>" + data[i].message + "</div>" +
                                        "<div class='mail_narration'>" + data[i].time +" "+ data[i].date + "</div>" +
                                    "</div>";
                }
                _("inner_container").innerHTML = html;
            }
        }
     */


}

function addNewCourse(){
    var title = document.getElementById("add_course_title").value;
    var description = document.getElementById("add_course_description").value;
    var response = document.getElementById("add_course_response");
    var ajax = new XMLHttpRequest();
    var text = "../admin/for_admin.php?c_title ="+ title +"& c_description ="+ description;
    ajax.open("GET", text, "true");
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            response.innerHTML = this.responseText;
        }
    };
}

function readMails(id){
    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Administration/Jobs/admin_jb_request_manager.php?id="+ id +"&&read_mail";
    ajax.open("GET", text, true);
    ajax.send();

    ajax.open("GET" , text, true);
    ajax.send();
    ajax.onreadystatechange = function(){
        if(this.readyState==4 && this.status == 200){
            _("inner_container").innerHTML = this.responseText;
        }
    };
}

function readFeedback(id){
    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Administration/Jobs/admin_jb_request_manager.php?id="+ id +"&& read_feedback";
    ajax.open("GET" , text, true);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState==4 && this.status == 200){
            _("inner_container").innerHTML = this.responseText;
        }
    }
}


