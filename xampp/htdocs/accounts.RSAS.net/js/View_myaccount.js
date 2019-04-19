

function _(id){
    return document.getElementById(id);
}

function my_account(){
    _("view_profile").style.display = "block";
    var display = _("profile_container");
     var text = "../RSAS.net/accounts.RSAS.net/Account_management/manage_user_accounts/account_request_manager.php?my_account";
     var ajax = new XMLHttpRequest();

     ajax.open("GET", text, true);
     ajax.send();

     ajax.onreadystatechange = function(){
        if(this.readyState==4 && this.status == 200){
            display.innerHTML = this.responseText;
        }
    }
}

function closeProfileView(){
    _("view_profile").style.display = "none";
}