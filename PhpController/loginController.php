<?php

require_once('../Models/loginService.php');
session_start();

if(isset($_POST['info']))
{
    $data = $_POST['info'];
    $info = json_decode($data);
    
    if(empty($info->username) || empty($info->password))
    {
        echo "Null Submission";
    }
    else
    {
        $uname = $info->username;
        $pass = $info->password;
        $check = LoginValidate($uname,$pass);
        if($check['username'] == $uname && md5($pass) == $check['password'] && $check['type'] == "Customer")
        {
            echo "Customer";
            $_SESSION["name"] = $check['name'];
            $_SESSION["username"] = $check['username'];
            $_SESSION["password"] = $pass;
            $_SESSION["email"] = $check['email'];
            $_SESSION["type"] = $check['type'];
            $_SESSION["status"] = $check['status'];
        }
        else if($check['username'] == $uname && md5($pass) == $check['password'] && $check['type'] == "Rider")
        {
            echo "Rider";
            $_SESSION["name"] = $check['name'];
            $_SESSION["username"] = $check['username'];
            $_SESSION["password"] = $pass;
            $_SESSION["email"] = $check['email'];
            $_SESSION["type"] = $check['type'];
            $_SESSION["status"] = $check['status'];
        }
        else if($check['username'] == $uname && md5($pass) == $check['password'] && $check['type'] == "Restaurant")
        {
            echo "Restaurant";
            $_SESSION["name"] = $check['name'];
            $_SESSION["username"] = $check['username'];
            $_SESSION["password"] = $pass;
            $_SESSION["email"] = $check['email'];
            $_SESSION["type"] = $check['type'];
            $_SESSION["status"] = $check['status'];
        }
        else if($check['username'] == $uname && md5($pass) == $check['password'] && $check['type'] == "Admin")
        {
            echo "Admin";
            $_SESSION["name"] = $check['name'];
            $_SESSION["username"] = $check['username'];
            $_SESSION["password"] = $pass;
            $_SESSION["email"] = $check['email'];
            $_SESSION["type"] = $check['type'];
            $_SESSION["status"] = $check['status'];
        }
        
    }
    
}



if(isset($_POST['remember']))
{
    $data = $_POST['remember'];
    $info = json_decode($data);
    $username = $info->username;
    $password = $info->password;
    $result = Cookie($username,$password);
}










?>
