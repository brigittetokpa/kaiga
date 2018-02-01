<?php 
	$host="localhost";
	$user="root";
	$mdp="";
	$db="complexehotelier";
	$link = mysqli_connect($host,$user,$mdp);
	mysqli_select_db($link,$db);
 ?>