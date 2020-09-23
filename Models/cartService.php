<?php

require_once('../database/db.php');

function AddToCart($name,$quantity,$price)
{
    $con = Connection();
    $sql = "INSERT INTO cart (c_id, c_item, c_quantity, c_price) VALUES ('', '".$name."', '".$quantity."', '".$price."');";
    $result = mysqli_query($con,$sql);
    return $result;
}


function GetAllFromCart()
{
    $con = Connection();
    $sql = "select * from cart";
    $result = mysqli_query($con,$sql);
    return $result;
}


function DeleteFromCart($id)
{
    $con = Connection();
    $sql = "delete from cart where c_id='".$id."';";
    $result = mysqli_query($con,$sql);
    return $result;
}

function SumTotal()
{
    $con = Connection();
    $sql = "SELECT SUM(c_price) as total FROM cart;";
    $result = mysqli_query($con,$sql);
    return $result;    
}


function ItemsList()
{
    $con = Connection();
    $sql = "SELECT GROUP_CONCAT(c_item) AS items FROM cart;";
    $result = mysqli_query($con,$sql);
    return $result;    
}

function QuantityList()
{
    $con = Connection();
    $sql = "SELECT GROUP_CONCAT(c_quantity) AS quantity FROM cart;";
    $result = mysqli_query($con,$sql);
    return $result;    
}


function SendToOrders($name,$details,$price,$status)
{
    $con = Connection();
    $sql = "INSERT INTO orders (o_id, c_name,r_name,o_details, o_total,o_status) VALUES ('', '".$name."','', '".$details."', '".$price."','".$status."');";
    $result = mysqli_query($con,$sql);
    return $result;
}


function ClearCart()
{
    $con = Connection();
    $sql = "delete from cart;";
    $result = mysqli_query($con,$sql);
    return $result;
}




?>
