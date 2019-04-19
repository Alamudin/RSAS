function changeUsername(){
    var pic = document.getElementById("new_pic");
    var result = document.getElementById("result_info");
    if(pic.value == null){
        result.innerHTML = "Image were selected ";
        result.style.background = "red";
        result.style.color = "white";
    }else{
        var ajax = new XMLHttpRequest();
        var text = "login_request_manager.php?picture="+ pic;
        ajax.open("GET", text,true);
        ajax.send();

    }
}

function hide_show(){
    var div = document.getElementById("result_info");
    div.style.display = "none";
}