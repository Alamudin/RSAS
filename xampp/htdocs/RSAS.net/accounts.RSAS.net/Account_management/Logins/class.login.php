<?php

/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 1/10/2019
 * Time: 3:35 PM
 */
class login{

    private $username;
    private $password;

    function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }

    function login(){
        $st = new User();
        $data = $st->searchUsers($this->username, 'notdefault');
        if($data != -1){/** this one check if the username exitst in the data base */

        /** you dont need this session_start() function it don't matter */

            $pass = ''.$data['Password'].'';/** you must do this other wise it may not work */

            if(password_verify("$this->password", $pass)){
                /** I used '$this->password' because I am using class
                 * $pass is hashed password that directly comes from the database
                 */

                /** after put your own code like successful message */
                $_SESSION['username'] = $data['Username'];/* */
                $_SESSION['fullname'] = $data['Full_name'];
                $_SESSION['credential'] = $type = $data['Account_type'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['picture'] = $data['Rcontent'];
                $_SESSION['login'] = "true";

                $con = new Database_connection();
                if($type == "academy"){
                    $result = $con->srvExecute("select name from acadamy where Acadamy_head = '$this->username'");
                    if($result){
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['fullname'] = $row['name'];
                    }else{
                        $_SESSION['login'] = 'false';
                        unset($_SESSION['username']);
                        unset($_SESSION['fullname']);
                        unset($_SESSION['picture']);
                        unset($_SESSION['email']);
                        return 0;
                    }
                }else if($type == "dept"){
                    $result = $con->srvExecute("select name from academy where Dept_head = '$this->username'");
                    if($result){
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['fullname'] = $row['name'];
                    }else{
                        $_SESSION['login'] = 'false';
                        unset($_SESSION['username']);
                        unset($_SESSION['fullname']);
                        unset($_SESSION['picture']);
                        unset($_SESSION['email']);
                       return 0;
                    }
                }
                return $data['Account_type'];
                /** end of if condition  */
            }
            return "incorrect";
        }else{
            return "incorrect";
        }
    }

    function Authenticate($result){
        if($result == 'user'){
            header("Location: ../../../../accounts.RSAS.net/student_page.php");
        }else if($result == 'admin'){
            header("Location: ../../../../admin.RSAS.net/admin.php");
        }else if($result == 'academy'){
            header("Location: ../../../../accounts.RSAS.net/academic_page.php");
        }else if($result == 'teacher'){
            header("Location: ../../../../accounts.RSAS.net/teachers.php");
        }else if($result == 'dept'){
            header("Location: ../../../../accounts.RSAS.net/department_page.php");
        }else if($result == "incorrect"){
            header("Location: ../../../../accounts.RSAS.net/login.php?err=incorrect username or password");
        }else if($result == 0){
            header("Location: ../../../../accounts.RSAS.net/login.php?err=unable to Identify the user");
        }
    }
}
