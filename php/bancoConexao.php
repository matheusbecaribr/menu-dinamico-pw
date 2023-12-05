<?php

$db = "atividade_menu_dinamico";
$host = "localhost";
$user = "root";
$pass = "";

$dns = "mysql:host=".$host."; dbname=".$db;
$pdo = new PDO($dns, $user, $pass);

?>