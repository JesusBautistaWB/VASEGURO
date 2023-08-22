<?php
	$host="localHost";
	$basedatos="vasegurobd";
	$user="root";
	$pass="Q1w2e3r4.";
	$puerto="3306";

	try
	{
		$bd = new PDO("mysql:host=".$host.";dbname=".$basedatos.";port=".$puerto, $user, $pass);
		$bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$bd->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,"SET NAMES 'utf8' ");
	}
	catch(PDOException $e)
	{
		echo "<br><br>Ocurrio un error:-> ".$e->getMessage();
	}

    //127.0.0.1
?>
