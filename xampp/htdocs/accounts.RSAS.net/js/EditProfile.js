function _(id){
    return document.getElementById(id);
}

function changeFullName(inname){
    var name = _(inname).value;
    var display = _("response-text");

    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Account_management/manage_user_accounts/account_request_manager.php?fname="+name +"&& change_name";

    ajax.open("GET", text, true);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            display.innerHTML = this.responseText;
        }
    }

}
function changePassword(currentpassword, newpassword, confirmpassword){
    var display = _("response-text");
    var crpass = _(currentpassword).value;
    var newpass = _(newpassword).value;
    var cnpass = _(confirmpassword).value;

    var ajax = new XMLHttpRequest();
    var text = "../RSAS.net/accounts.RSAS.net/Account_management/manage_user_accounts/account_request_manager.php?cr_pass="+crpass + "&& newpass="+newpass +"&& change_pass";

    if(newpass === cnpass){
        ajax.open("GET", text, "true");
        ajax.send();
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                display.innerHTML = this.responseText;
            }
        };
    }else {
        display.innerHTML = "The new password is not confirmed! , it have to be the same";
    }


    /**
     * function changeName(){
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
     */

}