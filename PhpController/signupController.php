<?php

require_once('../Models/signupService.php');

if(isset($_POST['email']))
{
	$email = $_POST['email'];
	$result = ExistingEmail($email);
	if($result > 0)
	{
		echo "Email is already exist";
	}
	else
	{
		echo "You are good to go";
	}
}

if(isset($_POST['data']))
{
    $data = $_POST['data'];
    $info = json_decode($data);
    
    $userInfo = [
        "name" => $info->name,
        "email" => $info->email,
        "username" => $info->username,
        "password" => $info->password,
        "user" => $info->user,
        "status" => $info->status,
        
    ];
    
    $insert = Registration($userInfo);
    if($insert)
    {
        echo "Registered to the system";
    }
    else
    {
        echo "Can not complete the system";
    }
}

?>
