<?php


	function Connection(){

		$connection = mysqli_connect('localhost','root','','online_food_order_system');
        return $connection;
	}

?>
