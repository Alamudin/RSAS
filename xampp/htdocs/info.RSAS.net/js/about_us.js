/**
 * Created by Abnet on 2/13/2019.
 */

function _(id){
    return document.getElementById(id);
}

function createPage(button, page_name){
    var container = _("inner_container");
    var text = "../RSAS.net/info.RSAS.net/pageCreator.php?page="+page_name;
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

function sendMail(){
    var display = _("contact_us_response");
    var email = _("email").value;
    var subject = _("subject").value;
    var body = _("email_body").value;
    var ajax = new XMLHttpRequest();

    email = ''+email+'';
    subject = '' +subject+'';
    body = '' +body+'';

    var text = "../RSAS.net/info.RSAS.net/request_management.php?user_email="+email +"&& subject="+ subject +"&& body="+body +"&& mail_email";

    if((email !== "") && (subject !== "") && (body !== "")){
        if(testInput("email")){
            if(testInput("subject")) {
                if (testBody()) {
                    ajax.open("GET", text, "true");
                    ajax.send();

                    ajax.onreadystatechange = function(){
                        if(this.readyState ==4 && this.status == 200){
                            display.innerHTML = this.responseText;
                        }
                    }
                }else{
                    display.innerHTML = "There is unacceptable character in body section";
                }
            }else{
                display.innerHTML = "There is unacceptable character in subject section";
            }
        }else{
            display.innerHTML = "There is unacceptable character in email address section";
        }
    }else{
        display.innerHTML = "Fill all the required fields first!!!";
    }



}

function testInput(id){
    var str = _(id).value;
    return (str.indexOf("<") === -1 && str.indexOf(">") === -1 && str.indexOf('"') === -1);

}

function testBody(){
    var str = _("email_body").value;
    return (str.indexOf("<") === -1 && str.indexOf(">") === -1 && str.indexOf('"') === -1);
}