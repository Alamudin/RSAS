<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 1/10/2019
 * Time: 3:14 PM
 */
class courses{


    function CreateCourse($title, $description){
        $data = new Database_connection();
        $db = $data->getConnection();
        $query = mysqli_query($db, "select * from id_collection where id_type = 'course_id'");
        if($query){
            $row = mysqli_fetch_assoc($query);
            $id = $row['id_no'] + 1;
            mysqli_query($db, "insert into course values('$id', '$title', '$description')");
            if(mysqli_affected_rows($db) > 1){
                $query = mysqli_query($db, "update id_collection set id_no = $id where id_type = 'course_id'");
                if($query){
                    return 1;
                }
                return 0;
            }
            return -1;
        }
        return -2;
    }

    function UpdateCourse(){

    }

    function ViewCourse(){

    }

    function DeleteCourse(){

    }

    function SearchCourse(){

    }
}

?>