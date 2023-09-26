<?php
$host = 'db';
$db = 'collection';
$user = 'root';
$password = 'password';

$dsn = "mysql:host=$host;dbname=$db;";

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $exception) {
    echo '<p>There is an error connecting to the db</p>';
    exit();
}
