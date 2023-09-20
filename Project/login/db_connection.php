<?php
$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'login';
$table = 'user';

// Verbindung zur Datenbank herstellen
$connection = new mysqli($host, $username, $password, $database);

// Überprüfen der Verbindung
if ($connection->connect_error) {
    die("Verbindung fehlgeschlagen: " . $connection->connect_error);
}
?>
