<?php
$host = 'localhost';
$dbname = 'bieren';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Verbinding succesvol!";
} catch (PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
}
?>
