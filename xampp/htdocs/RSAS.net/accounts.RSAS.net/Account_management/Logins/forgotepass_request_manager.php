<?php
/**
 * Created by PhpStorm.
 * User: Abnet
 * Date: 3/24/2019
 * Time: 3:39 PM
 */

include_once("D:/xampp/htdocs/DBLayer/Database_connection.php");
include_once("../manage_user_accounts/EditProfile.php");
include_once("../manage_user_accounts/class.User.php");

if (isset($_GET['search_user'])) {
    $email = $_GET['email'];
    $user = new User();
    $query = $user->searchEmail($email);
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $fname = $row['Full_name'];
        $uname = $row['Username'];
        $uemail = $row['email'];
        $pic = $row['Rcontent'];

        echo "<div class='inside-account'>
            <div class='inside_image_container'>
                <img src='../RSAS.net/profile_pictures/$pic' alt='user' class='user_image'>
                <p class='inside_username'>$fname</p>
            </div>
            <div class='user_detail'>
                Username: $uname<br/>
                Full Name: $fname<br/>
                email: $uemail<br><br>
                is this your account <a href='javascript:myAccount(\"$uname\")'>Yes</a>  <a href='javascript:hideDetail()'>No</a>
            </div>
        </div>";
    }else{
        echo "There is no Email address like this!!!";
    }
}

if(isset($_GET['change_pass'])){
    $uname = $_GET['user_name'];
    $newpass = $_GET['newpass'];
    $edit = new EditProfile();
    $row = $edit->changePassword("none", $newpass, $uname);
    if($row == 1){
        echo "Operation Successful";
    }else{
        echo "Operation failed";
    }
}


/**if(isset($_GET['no'])){
    print "<b>SORRY!!! We can't help you any more</b>";
}

$upass = "";
$uid = 0;
if(isset($_POST['input'])){
    $em = $_POST['input'];
    $user = 'root';
    $password = '';
    $dbname = 'my_database';
    $host = 'localhost';

    $con = new Database_connection();
    $query = "select * from users where email = '$em'";
    $result = $con->srvExecute($query);
    if(sqlsrv_num_rows($result)>0){
        $row = sqlsrv_fetch_array($result);
        $uname = $row['fname']." ".$row['lname'];
        $url = $row['pp_url'];
        $_SESSION['cid'] = $row['id'];
        $upass = $row['password'];
        $email = $row['email'];
        $gender = $row['gender'];
        $access = $row['access'];
        print "<img src='$url' id='accimage' width='30%'/><br/>
            <br/><h1 id='username'>$uname</h1><hr style='width: 80%;'/> <br/>
            <p id='information'>Gender: <i>$gender</i> <br/> Email address: <i>$email</i> <br/> Access Credential: <i>$access</i></p>";
        print "<hr style='width: 80%;'/><br/><div id='quest'>is this your account? <button onclick='changepass()' id='question'>Yes</button>
            <a href='forgottpassword.php?no=1'><button id='question'>No</button></a></div>";
    }else{
        print '<b>there is no account with this email address</b>';
    }
}**/
?>