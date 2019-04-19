function onload_body(){
    var login = document.getElementById("login");
    var register = document.getElementById("register");
    login.style.display="block";
    register.style.display="none";
}

function show_register(){
    var login = document.getElementById("login");
    var register = document.getElementById("register");
    login.style.display="none";
    register.style.display="block";
}

function register(){
    var uname = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var name = document.getElementById("fullname").value;
    var npass = document.getElementById("npass").value;
    var response = document.getElementById("registerInfo");

    if(uname !== "" && email !== "" && name !== ""){
        if(confirmpassword()){
            if(testUsername()){
                if(testFullName()){
                    if(testemail()){
                        if(testpassword()){
                            var ajax = new XMLHttpRequest();
                            var text = "Users/dinamic_page_creator.php?username="+ uname +"& email="+ email +"& fullname="+ name +"& npass="+ npass;
                            ajax.open("GET", text, true);
                            ajax.send();

                            ajax.onreadystatechange = function(){
                                if(this.readyState == 4 && this.status == 200){
                                    var result = parseInt(this.responseText);
                                    if(result === 1){
                                        response.innerHTML = "User Account has been Created Successfully";
                                        response.style.background = "lightgreen";
                                        response.style.color = "black";
                                    }else if(result > 1){
                                        response.innerHTML = "There exist an other user with this username";
                                        response.style.background = "red";
                                        response.style.color = "white";
                                    }else{
                                        response.innerHTML = "operation failed";
                                        response.style.background = "red";
                                        response.style.color = "white";
                                    }
                                }
                            };
                        }else{
                            response.innerHTML = "The password should be greater than 5 and less than 16 character";
                            response.style.background = "red";
                            response.style.color = "white";
                        }
                    }else{
                        response.innerHTML = "The email should be less than 50 characters and it should contain '@' and '.'";
                        response.style.background = "red";
                        response.style.color = "white";
                    }
                }else{
                    response.innerHTML = "The name should be greater than 5 and less than 50 characters";
                    response.style.background = "red";
                    response.style.color = "white";
                }
            }else{
                response.innerHTML = "The Username should be less than 32 and greater than 5 characters and should contain @ at first";
                response.style.background = "red";
                response.style.color = "white";
            }
        }else{
            response.innerHTML = "The password were not confirmed";
            response.style.background = "red";
            response.style.color = "white";
        }
    }else{
        response.innerHTML = "first fill all the fields";
        response.style.background = "red";
        response.style.color = "white";
    }
}

function confirmpassword(){
    var npass = document.getElementById("npass").value;
    var cpass = document.getElementById("cpass").value;
    return (npass === cpass);
}

function testpassword(){
    var npass = document.getElementById("npass").value;
    var npasstr = new String(npass);

    return (npasstr.length > 6) && (npasstr.length < 16);
}

function search_user(){
    var user = document.getElementById("lusername");
    var image = document.getElementById("login_image");
    if(user.value != ""){
        var ajax = new XMLHttpRequest();
        var text = "Users/login_request_manager.php?search="+ user.value;

        ajax.open("GET", text, true);
        ajax.send();
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var result = this.responseText
                if(result != ""){
                    image.src = "profile_pictures/"+ result;
                }
            }
        };
    }
}

function testemail(){
    var email = document.getElementById("email").value;
    var emailstr = new String(email);
    return (emailstr.length < 50) && (emailstr.indexOf("@") !== -1) && (emailstr.indexOf(".") !== -1);
}

function testFullName(){
    var name = document.getElementById("fullname").value;
    var namestr = new String(name);
    return (namestr.length > 6) && (namestr.length < 50);
}

function testUsername(){
    var uname = document.getElementById("username").value;
    var unamestr = new String(uname);
    return (unamestr.length < 32) && (unamestr.length > 5) && (unamestr.indexOf("@") !== -1);
}
