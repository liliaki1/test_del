<?php

include "config.php";

if($_POST["add_person"]){
/*
	$str = "INSERT INTO `person` (`id`, `name`, `info`, `info1`, `age`, `earnings`, `status`) VALUES (NULL, 'Valera', 'major', 'Описание', '23', '2000', 'Unpopular')";*/
	$str = "INSERT INTO `person` (`id`, `name`, `info`, `info1`, `age`, `earnings`, `status`) VALUES (NULL, '" . $_POST["name"] . "', '" . $_POST["zvanie"] . "', '" . $_POST["big_text"] . "', '" . $_POST["year"] . "', '" . $_POST["money"] . "', '" . $_POST["status"] . "')";

	//echo $str;

	mysqli_query($connection,$str);

	echo '<script>location.replace("spisok.php");</script>'; exit;
}

if($_POST["delete_person"]){

	$str="DELETE FROM `person` WHERE `id` = " . $_POST["id"];

	mysqli_query($connection,$str);

	echo '<script>location.replace("spisok.php");</script>'; exit;
}



