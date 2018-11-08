<?php
	$mysqli = false;

	function connectDB () {
		global $mysqli;
		$mysqli = new mysqli("localhost", "root", "", "myhellcatbase");
		$mysqli->query("SET NAMES 'utf-8'");
		mysqli_set_charset($mysqli, 'utf8');
	}

	function closeDB () {
		global $mysqli;
		$mysqli->close();
	}

	function getComment ($limit, $id) {
		global $mysqli;
		global $where;
		connectDB();
		if($id)
			$where = "WHERE `id` = ".$id;
		$result = $mysqli->query("SELECT * FROM `comment` $where ORDER BY `id` DESC LIMIT $limit");
		closeDB();
		if(!$id)
			return resultToArray ($result);
		else
			return $result->fetch_assoc();
	}

	function getNews ($limit, $id) {
		global $mysqli;
		global $where;
		connectDB();
		if($id)
			$where = "WHERE `id` = ".$id;
		$result = $mysqli->query("SELECT * FROM `news` $where ORDER BY `id` DESC LIMIT $limit");
		closeDB();
		if(!$id)
			return resultToArray ($result);
		else
			return $result->fetch_assoc();
	}

	function getLoginOnEmail($email) {
		global $mysqli;
		connectDB();
		$result = $mysqli->query("SELECT `login` FROM `users` WHERE `email` = '$email'");
		$row = $result->fetch_assoc();
		$result->close();
		closeDB();
		return $row['login'];
	}

	function getPasswordOnEmail($email) {
		global $mysqli;
		connectDB();
		$result = $mysqli->query("SELECT `password` FROM `users` WHERE `email` = '$email'");
		$row = $result->fetch_assoc();
		$result->close();
		closeDB();
		return $row['password'];
	}

	function setPassword($login, $password) {
		global $mysqli;
		if (($login == "") || ($password == "")) return false;
		connectDB();
		$mysqli->query("UPDATE users SET password = '$password' WHERE login ='$login'");
		closeDB();
	}

	function resultToArray ($result) {
		$array = array ();
		while (($row = $result->fetch_assoc()) != false) 
			$array[] = $row;
		return $array;
	}
?>