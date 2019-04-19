

function newAcademy(){
    document.getElementById("inner_container").innerHTML = "<div class='wider_left_container' >" +
            "<p id='response'></p>"+
    "<input type='text' placeholder='Username' class='field_medium' name='username' id='academy_username' onkeyup='checkUsername()' required /><br/>"+
        "<input type='email' placeholder='Email Address' class='field_medium' name='email_address' id='email_address' required /> <br>"+
        "<input type='text' placeholder='Academy Name' class='field_medium' name='Full_name' id='Full_name' required/><br>"+
        "<button class='submit_medium' onclick='addAcademy()'>Add Academy</button>"+
    "</div>"+
    "<div class='right_small_side_bar' id='academy_side'></div>";
    var bar = document.getElementById("academy_side");
    var html = "";
    var text = "for_admin.php?load_academy";
    var ajax = new XMLHttpRequest();
    ajax.open("GET", text, true);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var response = JSON.parse(this.responseText);
            for($i=0; $i<response.length; $i++){
                html += "<button class='small_longbutton_with_image'>"+
                            "<img src='../profile_pictures/user_pic.png' alt='academy' class='left_small_user_image'/>"+
                            "<strong class='name_bold'>"+ response[$i].Full_name +"</strong>"+
                        "</button>";
            }
            bar.innerHTML = html;
        }
    };

}

function checkUsername(){
    var uname = document.getElementById("academy_username");
    var text = "for_admin.php?check_username="+ uname.value;

    if(uname.value != ""){
        var ajax = new XMLHttpRequest();
        ajax.open("GET", text, true);
        ajax.send();

        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var response = parseInt(this.responseText);
                document.getElementById('email_address').value = response;
                if(response < 0){
                    uname.style.borderColor  = "pink";
                }else if(response === 0){
                    uname.style.bordercolor = "green";
                }else if(response > 0){
                    uname.style.bordercolor = "red";
                }
            }
        };
    }else{
        uname.style.borderColor  = "red";
    }
}

function addAcademy(){
    var uname = document.getElementById("academy_username");
    var email = document.getElementById("email_address");
    var name = document.getElementById("Full_name");
    var response = document.getElementById("response");

    if(uname.value != "" && email.value != "" && name.value != ""){
        var ajax = new XMLHttpRequest();
        var text = "../admin/for_admin.php?username="+ uname.value +"& email_address="+ email.value +"& Full_name="+ name.value;
        ajax.open("GET" , text, true);
        ajax.send();

        ajax.onreadystatechange = function(){
            if(this.readyState==4 && this.status == 200){
                var result = parseInt(this.responseText);
                if(result > 0){
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
    document.getElementById("inner_container").innerHTML = "<h1 class='add_course_title'>ADD NEW COURSE</h1>"+
    "<hr/><br/>"+
    "<div class='add_form'>"+
        "<p id='add_course_response'></p> <br/>"+
        "<label for='add_course_field'>Course Title</label><br/>"+
        "<input required type='text' id='add_course_title' class='add_course_field'/>"+
        "<label for='add_course_description'>Course Description</label><br/>"+
        "<textarea required id='add_course_description' class='add_course_description' ></textarea>" +
        "<hr/>"+
        "<input type='submit' class='create' value='Create' onclick='addNewCourse()'/>"+
    "</div>" +
    "<br/><br/>" +
    "<div class='add_courses_list'>" +
        "<h1 class='add_course_list_title'>Lists of Current Courses</h1>" +
        "<p class='courses'>course one</p><hr/></div><br/>";
}

function notifiction(){
    document.getElementById("inner_container").innerHTML = "<div class='feedback'>"+
    "<div class='feedback_header'>"+
        "<div class='feedback_state'>"+
        "<p>new</p>"+
        "</div>"+
        "<img class='feedback_user_image_mini' src='../profile_pictures/user_pic.png' alt='user'>"+
        "<p class='feedback_user_name_mini'>Username</p>"+
        "</div>"+
        "<p class='feedback_text'>the text will be written here...continue reading</p>"+
    "<p class='feedback_narration'>date:dec 2 2018 time: 3:33</p>"+
    "</div><br/>"+
    "<div class='feedback'>"+
        "<div class='feedback_header'>"+
        "<div class='feedback_state'>"+
        "<p>new</p>"+
        "</div>"+
        "<img class='feedback_user_image_mini' src='../profile_pictures/user_pic.png' alt='user'>"+
        "<p class='feedback_user_name_mini'>Username</p>"+
        "</div>"+
        "<p class='feedback_text'>the text will be written here...continue reading</p>"+
    "<p class='feedback_narration'>date:dec 2 2018 time: 3:33</p>"+
    "</div><br/>";
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

function test(){
    var uname = document.getElementById("academy_username");
    uname.style.borderColor  = "green";
}