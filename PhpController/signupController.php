<?php

require_once('../Models/signupService.php');

if(isset($_POST['email']))
{
	$email = $_POST['email'];
	$result = ExistingEmail($email);
    //$data = $result;
	if($result['email'] == $email)
	{
		echo "Email Taken";
	}
	else
	{
        echo "Good to go!";
    }
}

if(isset($_POST['data']))
{
    $data = $_POST['data'];
    
    $info = json_decode($data);
   
    
    
    
    if(empty($info->name) || empty($info->email) || empty($info->username) || empty($info->password) || empty($info->user))
    {
        echo "Null Submission";
    }
    else
    {
        $userInfo = [
            "name" => $info->name,
            "email" => $info->email,
            "username" => $info->username,
            "password" => $info->password,
            "user" => $info->user,
            "status" => $info->status

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
    
    
    
}
    

?>
