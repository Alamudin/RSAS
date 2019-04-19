<?php

/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 1/10/2019
 * Time: 4:19 PM
 */
include_once("D:/xampp/htdocs/RSAS.net/accounts.RSAS.net/Account_management/manage_user_accounts/class.User.php");

class AcademicOffice extends User {

    /** this function used to register Departments in the academy by academic office account manager
      this function takes three parameters all are String  and return integer
     if it return 1 operation is successful
     * it it returns 0 then operation failed because query were not executed
     * if it returns -1 the there was unknown problem
     */
    function RegisterDepartment($fullname,$username, $email){
        try{
            $uname = $_SESSION['username'];
            $password = ''.password_hash("password", PASSWORD_DEFAULT);
            $con = new Database_connection();

            $sql = "call resgister_department('$fullname','$username','$password','$email','user_pic.png', 'profile_picture', 'dept', '$uname')";
            $use = new User();
            $res = $use->searchUsers($username, 'default');
            if($res == 0){
                $query = $con->srvProcAlter($sql);
                if($query){
                    return 1;
                }else{
                    return 0;
                }
            }else if($res == -1){
                return -1;
            }else if($res == 1){
                return 2;
            }

        }catch(Exception $e) {
            return -1;
        }

    }

    function viewDepartments(){
        $data = "<div class=\"add_dept_title\">Registered Departments</div>";
        $con = new Database_connection();
        $uname = $_SESSION['username'];

        $query = $con->srvExecute("select U.Username, U.Full_name, R.Rcontent 
                                      from acadamy A 
                                      join acadamy_members D on A.Aid = D.Aid 
                                      join users U on U.Username = D.member 
                                      join resource R on U.profile_pic = R.Rid 
                                      where A.Acadamy_head = '$uname' ");
        if($query){
            while($row = mysqli_fetch_assoc($query)){
                $picture = $row['Rcontent'];
                $name = $row['Full_name'];
                $username = $row['Username'];
                $data = $data."<button class='small_longbutton_with_image'>
                                    <a href='javascript: user_info(\"$username\")'><img src='../RSAS.net/profile_pictures/$picture' alt='academy' class='left_small_user_image'/></a>
                                    <strong class='name_bold'> $name </strong>
                                </button>";
            }
        }

        return $data;
    }

    function DeleteDepartment($dept_username){

    }
}
