<?php
// Gemaakt door Pascal Petri
require_once 'functions.php'; // Laadt de functies in

// Controleer of het formulier is verzonden
if (isset($_POST['submit'])) {
    $merk = $_POST['merk'];  // Haal het merk op uit het formulier
    $type = $_POST['type'];  // Haal het type op uit het formulier
    $prijs = $_POST['prijs'];  // Haal de prijs op uit het formulier

    // Voeg de fiets toe aan de database en geef feedback aan de gebruiker
    if (createFiets($merk, $type, $prijs)) {
        echo "Fiets succesvol toegevoegd! <a href='read.php'>Terug naar overzicht</a>";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van de fiets.";
    }
}
?>

<h2>Voeg een nieuwe fiets toe</h2>

<!-- Formulier om een nieuwe fiets toe te voegen -->
<form method="POST" action="add_fiets.php">
    <label for="merk">Merk:</label>
    <input type="text" name="merk" id="merk" placeholder="Merk" required><br>

    <label for="type">Type:</label>
    <input type="text" name="type" id="type" placeholder="Type" required><br>

    <label for="prijs">Prijs:</label>
    <input type="number" name="prijs" id="prijs" placeholder="Prijs" required><br>

    <input type="submit" name="submit" value="Voeg Fiets Toe">
</form>
