function _(id){
    return document.getElementById(id);
}

function closeProfileView(){
    _("view_profile").style.display("none");
}

function viewProfile(){
    _("view_profile").style.display("block");
}