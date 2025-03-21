<?php
// Gemaakt door Pascal Petri

// Databaseconfiguratie
$host = '';  // Lokale server (vul hier 'localhost' in als je lokaal werkt)
$dbname = 'fietsenmaker';  // Naam van de database
$username = 'root';  // Database-gebruikersnaam (standaard 'root' voor XAMPP/MAMP)
$password = '';  // Wachtwoord (standaard leeg voor localhost)

try {
    // Maak een nieuwe PDO-verbinding met de database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Stel foutmodus in op uitzonderingen voor betere foutopsporing
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Stop de uitvoer en toon een foutmelding als de verbinding mislukt
    die("Verbinding mislukt: " . $e->getMessage());
}
?>
