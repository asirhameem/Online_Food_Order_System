<?php
require_once('../database/db.php');

function ExistingEmail($mail)
{
	$con = Connection();
	$sql = "select * from user where email='{$mail}'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row;

}

function Registration($data)
{
    $con = Connection();
    $query = "insert into user (name,username,password,email,type,status) VALUES ('{$data['name']}','{$data['username']}','{$data['password']}','{$data['email']}', '{$data['type']}', '{$data['status']}');";
    $result = mysqli_query($con, $query);
    if($result == true)
    {
        return true;
    }
    else
    {
        return false;
    }
        
}

?>
