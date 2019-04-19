function start(){
    var display = _("begin");
    var text = "Ip_checker.php?ping";
    var ajax = new XMLHttpRequest();
    ajax.open("GET", text, "true");
    ajax.send();


    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            display.innerHTML = this.responseText;
        }
    }
}