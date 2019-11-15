<?php
$dsn = 'mysql:dbname=northwind;host=127.0.0.1;port=3306';
$user = 'root';
$password = 'Azerty123';

// Verbinding maken met DB
$db = new PDO($dsn, $user, $password);
// Foutmeldingen aanzetten
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);