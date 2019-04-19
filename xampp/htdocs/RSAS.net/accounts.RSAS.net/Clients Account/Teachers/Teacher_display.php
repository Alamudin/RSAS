<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 3/22/2019
 * Time: 7:09 PM
 */

class Teacher_display{
    private $username;
    private $teacher;
    private $email;
    private $picture;
    private $credential;
    private $login;

    /**
     * function __construct()
     * is a magic function which use to construct this class from session parameters which are set when the user logged in.
     */
    function __construct(){
        if(isset($_SESSION['login']) && $_SESSION['login'] == 'true' && isset($_SESSION['username'])){
            $this->username = $_SESSION['username'];
            $this->login = $_SESSION['login'];
            $this->email = $_SESSION['email'];
            $this->credential = $_SESSION['credential'];
            $this->picture = $_SESSION['picture'];
            $this->teacher = $_SESSION['fullname'];
        }
    }

    /**
     * function title() use to print the title of the page which is the name of the teacher
     */
    function title(){
        echo $this->teacher;
    }

    /**
     * function getAcademy()
     * use to get the name of the teacher that logged in.
     */
    function getAcademy(){
        return $this->teacher;
    }

    /**
     * function printAcademyName()
     * only print the name of the teacher that has just logged in
     */
    function printAcademyName(){
        echo "<p class='username' id='username'>$this->teacher </p>";
    }

    /**
     * function getUsername()
     * use to get the user name of the teacher that has just logged in.
     */
    function getUsername(){
        return $this->username;
    }

    /**
     * function printUsername()
     * use to print the username of the teacher that has just logged in.
     */
    function printUsername(){
        print $this->username;
    }

    /**
     * function UserPicture()
     * prints the profile picture of the teacher that has just logged in.
     * in the way that can be inserted into html file or html elements as a child.
     */
    function UserPicture(){
        echo "<a href='javascript:my_account()'><img class='user_image' id='user_image' src='../RSAS.net/profile_pictures/$this->picture' /></a>";
    }

    /**
     * function getPicture()
     * returns the name of the picture file that the teacher uploaded as the profile picture of this account
     */
    function getPicture(){
        return $this->picture;
    }

    /** function shareDocs()
     * use to print part of a page that will display on the teachers page.
     * <h2 class="shared_before_title">Share Your Files With Us</h2>
    <hr class='shared_horizontal' id="shared_horizontal"/>
     */
    function ShareDocs(){
        echo "<section id=\"share_page\">
                    <div class=\"shared_page_uploader\">
                        <input id='shared_input' class=\"shared_input\" type=\"file\" Placeholder=\"Choose your File\" name=\"document_shared\"/>
                        <textarea class=\"shared_text_area\" placeholder=\"Write File Description\" name=\"document_description\"></textarea>
                        <button class='shared_input' onclick='fileSelector()'>A</button>
                        <button type=\"submit\" class=\"shared_submit\" id=\"shared_submit\">Post</button>
                    </div><br>
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

    /** function shareDocs()
     * use to print part of a page that will display on the teachers page.
     */
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