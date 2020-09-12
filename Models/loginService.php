<?php

require_once('../database/db.php');

function LoginValidate($username, $password)
{
    $con = Connection();
    $sql = "select * from user where username='".$username."' and password='".md5($password)."';";
	$result = mysqli_query($con, $sql);
    $arr=0;
	while($row = mysqli_fetch_assoc($result)) {
		$arr=$row;
	}
    return $arr;
}


function Cookie($username,$pass){
	setcookie ("username",$username,time()+ 3600000 , "/");
	setcookie ("pass",$pass,time()+ 3600000, "/");
    return true;
}





?>
