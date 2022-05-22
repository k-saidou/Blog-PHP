<?php

namespace App\DataBase;

use PDO;
use PDOException;

require 'config.php';

$dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";

try {
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

	$pdo = new PDO($dsn, $username, $password, $options);

	if ($pdo) {
		echo "Connecter à la base de donnée $dbname réussi";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}