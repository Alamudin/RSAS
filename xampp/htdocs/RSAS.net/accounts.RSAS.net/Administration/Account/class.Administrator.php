<?php

/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 1/10/2019
 * Time: 2:59 PM
 */
class Administrator {

    private $db;

    function __construct(){
        $conn = new Database_connection();
        $this->db = $conn->getConnection();
    }

    function RegisterAcademy($username, $email, $fullname){
        try{
            $password = password_hash("password", PASSWORD_DEFAULT);
            $sql = "call register_academy('$fullname','$username','$password','$email','user_pic.png','profile_picture','academy')";
            $con = new Database_connection();
            $query = $con->srvProcAlter($sql);
            if($query){
                return 1;
            }else{
                return -1;
            }
        }catch(Exception $e) {
            return -1;
        }
    }

    function ViewAcademies(){

    }

    function DeleteAcademy(){

    }

    function FreesAccount(){

    }

    function ViewAccounts(){

    }

    function SearchAccounts(){

    }

    function searchByUsername($username){
        $con = new Database_connection();
        $sql = "select count(*) AS exist from users where username = '$username'";
        $query = $con->srvExecute($sql);
        if($query){
            $row = mysqli_fetch_assoc($query);
            $result = $row['exist'];
            if($result == 0){
                return "green";
            }else if($result > 0){
                return "red";
            }
        }else{
            return "pink";
        }
    }

    function loadAcademy(){
        $data = "";
        $con = new Database_connection();

        $query = $con->srvExecute("select U.Username, U.Full_name, R.Rcontent from users U 
                                      join account A on A.Username = U.Username
                                      join resource R on U.profile_pic = R.Rid
                                      where A.Account_type = 'academy'");
        if($query){
            while($row = mysqli_fetch_assoc($query)){
                $picture = $row['Rcontent'];
                $name = $row['Full_name'];
                $username = $row['Username'];
                $data = $data."<button class='small_longbutton_with_image'>
                                    <a href='javascript:user_info(\"$username\")'><img src='../RSAS.net/profile_pictures/$picture' alt='academy' class='left_small_user_image'/></a>
                                    <strong class='name_bold'> $name </strong>
                                </button>";
            }
        }

        return $data;
    }

}

?>