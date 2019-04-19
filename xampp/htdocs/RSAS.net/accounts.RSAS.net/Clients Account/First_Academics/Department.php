<?php

/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 1/10/2019
 * Time: 4:10 PM
 */
class Department{

    function assignCourseAdmin(){

    }

    function viewTeachers(){
        $data = "<div class=\"add_dept_title\">Registered teachers</div>";
        $con = new Database_connection();
        $uname = $_SESSION['username'];

        $query = $con->srvExecute("select U.Username, U.Full_name, R.Rcontent 
                                      from department A 
                                      join department_members D on A.Did = D.Did 
                                      join users U on U.Username = D.member 
                                      join resource R on U.profile_pic = R.Rid 
                                      where A.Dept_head = '$uname' ");
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

    function deleteTeacher(){

    }

    function registerTeacher($username, $email, $name){
        try{
            $un = $_SESSION['username'];
            $password = password_hash("password", PASSWORD_DEFAULT);
            $con = new Database_connection();

            $sql = "call register_teacher('$name', '$username', '$password', '$email', 'user_pic.png', 'profile_picture', 'teacher', '$un')";
            $query = $con->srvProcAlter($sql);
            if($query){
                return 1;
            }else{
                return 0;
            }
        }catch(Exception $e) {
            return -1;
        }
    }
}