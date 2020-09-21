<?php

require_once('../database/db.php');

    

function LoadInfo($username)
{
    $con = Connection();
    $sql = "select * from user where username='".$username."';";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
    
    
}

function UpdateImage($path, $email)
{
    $con = Connection();
    $sql = "update user SET dp='".$path."' where email = '".$email."' ";
    $result = mysqli_query($con,$sql);
    return $result;
}


function UpdateName($name, $email)
{
    $con = Connection();
    $sql = "update user SET name='".$name."' where email = '".$email."' ";
    $result = mysqli_query($con,$sql);
    return $result;
}


function UpdatePassword($pass, $email)
{
    $con = Connection();
    $sql = "update user SET password='".md5($pass)."' where email = '".$email."' ";
    $result = mysqli_query($con,$sql);
    return $result;
}


    
?>
