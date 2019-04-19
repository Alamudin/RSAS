<?php
class PageCreator{
    function PrintPrivacy(){
        print "<div id='privacy'> 
                <br/>
                <div id=\"privacy_title\">RSAS PRIVACY POLICY</div>
                <div id=\"privacy_container\">
                    <p id=\"privacy_policy_text\">Our privacy policy is simple enough to understand 'No registration no service from this website'. This
                   means If you don't register for this site then you are not the user of this website.We only provide
                   services to our users so you can't get any service from this website. If you register to this site your 
                   information that we collect from you will not be disclose to another third party unless it's required
                   by the law. This informations are used in this website to identify your self. And also you will be able
                   to get the services of this website. If you register then I want you to be sure that you are at the 
                   right place to ENTERTAIN YOUR SELF!!! </p>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/></div>";
    }

    function PrintContactUs(){
        print"<div id='contact_us'>
                <br/>
                <div class=\"contact_us_title\">Contact Us</div>
                <br/>
                <article class=\"contact_us_info\">
                    <p class=\"contact_us_text\">
                        you can contact us using telephone in all over Ethiopia<br/>
                        tele: +251 91-234-5678 <br/>
                        or in our website: http://www.rsas.net
                    </p>
                </article>
                <hr>
                <div id=\"contact_us_form\">
                    <div class='contact_us_response' id='contact_us_response'></div>
                    <input required type=\"text\" class=\"contact_us_fields\" placeholder=\"Email\" id=\"email\"><br><br>
                    <input required type=\"text\" class=\"contact_us_fields\" placeholder=\"Subject\" id=\"subject\"><br><br>
                    <textarea required name=\"body\" id=\"email_body\" placeholder=\"Body of the message\" ></textarea><br/><br>
                    <button id=\"send_mail\" type=\"submit\" onclick='sendMail()'>Send</button><br><br>
                </div></div>";
    }

    function rsasTeam(){
        print "<div class=\"team_container\">
            <div class=\"team-inner-container\">

                <div class=\"member-container\">
                    <img src=\"../RSAS.net/images/Frew.jpg\" alt=\"member\" class=\"member-image\">
                    <div class=\"about-member\">
                        <p class=\"member-detail\">
                            <b>Frew Mohammed</b><br>
                            helps majorly on Database design and supportive ideas on coding.
                        </p>
                    </div>
                </div>

                <div class=\"member-container\">
                    <img src=\"../RSAS.net/images/Aaaaa.jpg\" alt=\"member\" class=\"member-image\">
                    <div class=\"about-member\">
                        <p class=\"member-detail\">
                            <b>Alamudin Ahmed</b><br>
                            helps majorly on documentation and database and coding.
                        </p>
                    </div>
                </div>

                <div class=\"member-container\">
                    <img src=\"../RSAS.net/images/abnet.jpg\" alt=\"member\" class=\"member-image\">
                    <div class=\"about-member\">
                        <p class=\"member-detail\">
                            <b>Abnet Kebede</b><br>
                            helps majorly on coding and database and system architecture design.
                        </p>
                    </div>
                </div>

                <div class=\"member-container\">
                    <img src=\"../RSAS.net/images/amanuel.jpg\" alt=\"member\" class=\"member-image\">
                    <div class=\"about-member\">
                        <p class=\"member-detail\">
                            <b>Amanuel Girma</b><br>
                            Help on documentation.
                        </p>
                    </div>
                </div>

                <div class=\"member-container\">
                    <img src=\"../RSAS.net/images/habtish.png\" alt=\"member\" class=\"member-image\">
                    <div class=\"about-member\">
                        <p class=\"member-detail\">
                            <b>Habtamu Demelash</b><br>
                            he help in the team on documentaion.
                        </p>
                    </div>
                </div>

            </div>
        </div>";
    }
}

if(isset($_GET['page'])){
    $pg = new PageCreator();
    $page = $_GET['page'];
    if($page == "privacy"){
        $pg->PrintPrivacy();
    }else if($page == "contact us"){
        $pg->PrintContactUs();
    }else if($page == "team"){
        $pg->rsasTeam();
    }
}