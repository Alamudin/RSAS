/**
 *
 * @param n
 * @returns {HTMLElement}
 * @private
 *
 * this javascript page help to send file to server side written document codes.
 * also used to see how the upload is going online.
 */

function _(n){
    return document.getElementById(n);
}

function setValue(value){
    _("progress").style.width = value+"%";
}

function upload(pic){
    var file = _(pic).files[0];
    _("window").style.display = "block";
    _("file_name").innerHTML = "File Name: "+ file.name;
    var formdata = new FormData();
    formdata.append("file", file);
    formdata.append("change_pic", "change");
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler , false);
    ajax.addEventListener("load", completHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort" , abortHandler, false);

    ajax.open("POST" , "../RSAS.net/accounts.RSAS.net/Account_management/manage_user_accounts/account_request_manager.php", "true");
    ajax.send(formdata);
}

function progressHandler(event){
    _("uploading_msg").innerHTML = "Uploading File";
    var percent = (event.loaded/event.total) * 100;
    percent = Math.round(percent);
    setValue(percent);
}

function completHandler(event){
    //setValue(0);
    _("uploading_msg").innerHTML = event.target.responseText;
    _("okbtn").style.display = "block";
}

function errorHandler(){
    _("uploading_msg").innerHTML = "Upload Failed";
}

function abortHandler(){
    _("uploading_msg").innerHTML = "Upload Aborted";
}

function hidewindow(){
    _("okbtn").style.display = "none";
    _("window").style.display = "none";
}