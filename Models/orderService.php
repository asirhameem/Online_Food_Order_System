<?php

require_once('../database/db.php');

function GetAllOrders($username)
{
    $con = Connection();
    $sql = "select * from orders where c_name='".$username."' and o_status='Served';";
    $result = mysqli_query($con,$sql);
    return $result;
}

function GetAllOrdersOnGoing($username)
{
    $con = Connection();
    $sql = "select * from orders where c_name='".$username."' and o_status !='Served';";
    $result = mysqli_query($con,$sql);
    return $result;
}


?>
