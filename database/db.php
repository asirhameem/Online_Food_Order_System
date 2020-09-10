<?php

	$host 	= "127.0.0.1";
	$user = "root";
	$pass	= "";
	$name	= "online_food_order_system";

	function Connection(){

		global $host;
		global $user;
		global $pass;
		global $name;

		return $connection = mysqli_connect($host, $user, $pass, $name);
	}

?>
