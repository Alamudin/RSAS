<?php

class Creator{
    function ChatPage(){
        print ">Older messages</button>
                    <br/>\"";

        for($i=0;$i<3;$i++){
            print "> date: nov 20 2018 time: 10:33 am</p>
                    </div><br/>\"";
        }

        print "<div class=\"chats\">
                    <form class=\"new_message\" method=\"post\">
                        <textarea id=\"message\" placeholder=\"Write New Message\" ></textarea>
                        <button id=\"send\" type=\"submit\">Send</button>
                    </form>
                    <br/>
                </div>
                <br/>
            </section>
            <br/><br/>";
    }

    function AttendingPage(){
        print "<section id=\"attending_page\">
                    <br/>";
        for($i=0;$i<4;$i++){
            print ">Stop Attending</button>
                        </div><br/><br/>
                    </div><br/><br/>\"";
        }
        print "</section>";
    }

    function ShareDocs(){
        echo "<section id=\"share_page\">
                    <div class=\"shared_page_uploader\">
                        <h2 class=\"shared_before_title\">Share Your Files With Us</h2>
                        <form >
                            <input class=\"shared_input\" type=\"file\" Placeholder=\"Choose your File\" name=\"document_shared\"/>
                            <hr class='shared_horizontal' id=\"shared_horizontal\"/>
                            <textarea class=\"shared_text_area\" placeholder=\"Write File Description\" name=\"document_description\"></textarea><br/><br/>
                            <button type=\"submit\" class=\"shared_submit\" id=\"shared_submit\">Share File</button>
                        </form><br/>
                    </div>
                    <hr id=\"shared_horizontal\"/>
                    <div class=\"shared_files_before\" id=\"shared_files_before\">
                        <h2 class=\"shared_before_title\">Files shared before</h2><br/>
                        <article class=\"shared_before\">
                            <img src='../RSAS.net/images/user_pic.png' alt='Image_file'>
                            <p class=\"shared_before_description\">
                                <strong>The title of the file</strong> <br/>
                                this is the file description when the site fully build
                                up then there will be the file description
                            </p>
                            <p class=\"shared_statistics\">
                                Shared on: nov-10-2018   Views:200    Downloads: 500
                            </p>
                        </article><br/>
                    </div>
            </section>";
    }

    function EditProfile(){
        echo "<section id=\"edit_profile\">
                    <div class='response-text'>
                        <p id=\"response-text\"></p>
                    </div>
                    <article class=\"edit_container\">
                        <h4 class=\"edit_small_titles\">Change Full Name</h4>
                        <div id=\"edit_change_name\">
                            <input required class=\"edit_fields\" type=\"text\" placeholder=\"New Name\" id=\"edit_name\"/>
                            <input class=\"edit_submit\" type=\"submit\" value=\"Save\" onclick=\"changeFullName('edit_name')\"/><br/>
                        </div>
                    </article><br/>
                    <hr id=\"edit_horizontal\">
                    <article class=\"edit_container\">
                        <h4 class=\"edit_small_titles\">Change Password</h4>
                        <div id=\"edit_change_pass\">
                            <input required class=\"edit_fields\" type=\"password\" placeholder=\"Current password\" id=\"cr_password\"/><br/>
                            <input required class=\"edit_fields\" type=\"password\" placeholder=\"New password\" id=\"new_password\"/><br/>
                            <input required class=\"edit_fields\" type=\"password\" placeholder=\"Confirm password\" id=\"cn_password\"/>
                            <input class=\"edit_submit\" type=\"submit\" value=\"Save\" onclick=\"changePassword('cr_password','new_password','cn_password')\"/><br/>
                        </div>
                    </article><br/>
                    <hr id=\"edit_horizontal\">
                    <article class=\"edit_container\">
                        <h4 class=\"edit_small_titles\">Change Profile Picture</h4>
                        <div id=\"edit_change_picture\">
                            <input required class=\"edit_fields\" type=\"file\" id='new_pic'/>
                            <input class=\"edit_submit\" type=\"submit\" value=\"Save\" name='submit' onclick=\"upload('new_pic')\"/><br/>
                        </div>
                    </article>
                    <br/>
                </section>";
    }

}
?>