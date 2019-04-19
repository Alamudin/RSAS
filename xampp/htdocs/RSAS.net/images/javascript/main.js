function onload_body(){
    var change_name = document.getElementById("edit_change_name");
    var change_pass = document.getElementById("edit_change_pass");
    var change_pic = document.getElementById("edit_change_picture");
    change_name.style.display="none";
    change_pass.style.display="none";
    change_pic.style.display="none";
}

function for_name(){
    var change_name = document.getElementById("edit_change_name");
    if(change_name.style.display=="none"){
        change_name.style.display="block";
    }else{
        change_name.style.display="none";
    }
}

function for_pass(){
    var change_pass = document.getElementById("edit_change_pass");
    if(change_pass.style.display=="none"){
        change_pass.style.display="block";
    }else{
        change_pass.style.display="none";
    }
}

function for_pic(){
    var change_pic = document.getElementById("edit_change_picture");
    if(change_pic.style.display=="none"){
        change_pic.style.display="block";
    }else{
        change_pic.style.display="none";
    }
}
