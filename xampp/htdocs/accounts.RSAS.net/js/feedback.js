function _(id){
    return document.getElementById(id);
}

function openFeedback(){
    _("popup_container").style.display = "block";
}

function hideFeedback(){
    _("popup_container").style.display = "none";
}

function sendFeedback(){
    var input = _("feedback").value;
    if(input.value !== ""){
        var ajax = new XMLHttpRequest();
        var text = "../RSAS.net/info.RSAS.net/request_management.php?feedback="+ input;

        ajax.open("GET", text, true);
        ajax.send();
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var response = this.responseText;
                if(response === "success"){
                    hideFeedback();
                }else{
                    _("feedback-response").innerHTML = response;
                }
            }
        };
    }

}