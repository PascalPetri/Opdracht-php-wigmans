<?php
include 'config.php'; // Databaseverbinding
include 'functions.php'; // Functies zoals addBrouwer

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verkrijg de brouwcode, naam en land uit de formulierinvoer
    $brouwcode = $_POST['brouwcode'];
    $naam = $_POST['naam'];
    $land = $_POST['land'];

    // Voeg de brouwer toe via de functie
    if (addBrouwer($pdo, $brouwcode, $naam, $land)) {
        echo "Brouwer toegevoegd! <a href='index.php'>Terug naar de lijst</a>";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van de brouwer.";
    }
}
?>

<h2>Voeg een Brouwer Toe</h2>
<form method="post">
    <label for="brouwcode">Brouwcode:</label><br>
    <input type="text" name="brouwcode" id="brouwcode" required><br><br>
    
    <label for="naam">Naam:</label><br>
    <input type="text" name="naam" id="naam" required><br><br>
    
    <label for="land">Land:</label><br>
    <input type="text" name="land" id="land" required><br><br>
    
    <input type="submit" value="Voeg Brouwer Toe">
</form>
