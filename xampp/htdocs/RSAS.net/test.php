<?php
/*$db = mysqli_connect("localhost", "root", "babbik", "rsas");
$uname = "@babbi";
if($db){
    $sql = "select * from users U join resource R on U.profile_pic = R.rid where U.Username = '$uname'";
    $query = mysqli_query($db,$sql);
    if($query){
        $row = mysqli_fetch_assoc($query);
        echo $row['rcontent'];
    }else{
        echo 0;
    }
}else{
    echo -1;
}
header("Location: http://www.google.com");*/
$con_array = array("Database"=>"RSAS", "UID"=>"Abnet", "PWD"=>"abnetk");
$db = sqlsrv_connect("localhost", $con_array);
if($db){
    echo "connection success";
}else{
    echo sqlsrv_errors();
}

?>
