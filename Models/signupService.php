<?php
require_once('../database/db.php');

function ExistingEmail($mail)
{
	$con = Connection();
	$sql = "select * from user where email='".$mail."';";
	$result = mysqli_query($con, $sql);
	$arr=0;
	while($row = mysqli_fetch_assoc($result)) {
		$arr=$row;
	}
    return $arr;

}

function ExistingUsername($username)
{
	$con = Connection();
	$sql = "select * from user where username='".$username."';";
	$result = mysqli_query($con, $sql);
	$arr=0;
	while($row = mysqli_fetch_assoc($result)) {
		$arr=$row;
	}
    return $arr;

}

function Registration($data)
{
    if(empty($data))
    {
        return false;
    }
    else
    {
        $con = Connection();
        $query = "insert into user (name,username,password,email,type,status) VALUES ('{$data['name']}','{$data['username']}','{$data['password']}','{$data['email']}', '{$data['user']}', '{$data['status']}');";
        $result = mysqli_query($con, $query);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
        
}

?>
