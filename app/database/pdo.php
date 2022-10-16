<?php
$engine = "mysql";
$host = "db";
$port = 3306;
$dbname = "data";
$username = "root";
$password = "password";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);
?>