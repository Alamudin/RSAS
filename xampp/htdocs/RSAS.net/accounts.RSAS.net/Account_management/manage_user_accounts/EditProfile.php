<?php
class EditProfile{
    /**
     * @param $fname
     * @param $username
     * @return int
     * this function will change users name
     */
    function ChangeName($fname, $username){
        $sql = "update users set Full_name = '$fname' where Username = '$username'";
        $con = new Database_connection();
        $query = $con->srvProcAlter($sql);
        if($query){
            return 1;
        }
        return -1;
    }
    /**
     * @param string $currentpass
     * @param $newpassword
     * @param $username
     * @return int
     * this function use to change users password
     */
    function changePassword($currentpass, $newpassword, $username){
        if($currentpass == "none"){
            $npass = $password = password_hash($newpassword, PASSWORD_DEFAULT);
            $sql = "update users set Password = '$npass' where Username = '$username'";
            $con = new Database_connection();
            $query = $con->srvProcAlter($sql);
            if($query){
                return 1;
            }else{
                return 0;
            }
        }else{
            $con = new Database_connection();
            $query = $con->srvExecute("select Password from users where Username = '$username'");
            if($query){
                $row = sqlsrv_fetch_array($query);
                $cpass = ''.$row['password'].'';
                if(password_verify("$currentpass", $cpass)){
                    $npass = $password = password_hash($newpassword, PASSWORD_DEFAULT);
                    $sql = "update users set Password = '$npass' where Username = '$username'";
                    $query = $con->srvProcAlter($sql);
                    if($query){
                        return 1;
                    }else{
                        return 0;
                    }
                }else{
                    return -1;
                }
            }else{
                return -2;
            }
        }
    }
    /**
     * @param $newPicture
     * @param $username
     * @return int
     * this function will cahnge the profile picture of the user
     */
    function ChangeProfilePicture($newPicture, $username){
        $query = "call update_profile_pic('$newPicture', '$username')";
        $con = new Database_connection();
        $result = $con->srvProcAlter($query);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }
}

?>