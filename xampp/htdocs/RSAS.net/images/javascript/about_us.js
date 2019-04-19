/**
 * Created by Abnet on 2/13/2019.
 */
function createPage(button, page_name){
    var container = document.getElementById("inner_container");
    var text = "pageCreator.php?page="+page_name;
    var ajax = new XMLHttpRequest();

    ajax.open("GET", text, "true");
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState ==4 && this.status == 200){
            var response = this.responseText;
            if(response !== ""){
                container.innerHTML = response;
                button.style.fontWeight = "bold";
            }
        }
    }
}