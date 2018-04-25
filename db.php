<?php
	
	echo $_POST['username'];
	echo "<br>";
	echo $_POST['password'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$db = new mysqli("127.0.0.1","root","root","php");
	$sql = "insert test values ('{$username}','{$password}')";
	
	$db->query($sql);
 ?>