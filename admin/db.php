<?php 
	require "libs/rb.php";
	R::setup('mysql:host=localhost; dbname=myhellcatbase', 'root','');
	session_start();
	if (!((isset($_SESSION['logged_user']) && ($_SESSION['logged_user']['auth_key']==1 || ($_SESSION['logged_user']['auth_key']!=0)))))
	{
		header('Location: /');
		exit;
	}
?>