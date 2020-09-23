<?php
require_once('../database/db.php');

function PostComment($oid,$uname,$comment)
{
    $con = Connection();
    $sql = "INSERT INTO forum (f_id, o_id,u_name,f_post) VALUES ('', '".$oid."','".$uname."','".$comment."');";
    $result = mysqli_query($con,$sql);
    return $result;
}


function GetAllComments()
{
    $con = Connection();
    $sql = "select * from forum;";
    $result = mysqli_query($con,$sql);
    return $result;
}

?>
