<?php

require_once('../database/db.php');

function GetAllItems()
{
    $con = Connection();
    $sql = "select * from items where i_status='Available';";
	$result = mysqli_query($con, $sql);
    return $result;
}

?>
