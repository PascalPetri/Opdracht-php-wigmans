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
        echo "Fiets succesvol toegevoegd!";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van de fiets.";
    }
}
?>

<!-- Formulier om een nieuwe fiets toe te voegen -->
<form method="POST" action="create.php">
    <input type="text" name="merk" placeholder="Merk" required><br>
    <input type="text" name="type" placeholder="Type" required><br>
    <input type="number" name="prijs" placeholder="Prijs" required><br>
    <input type="submit" name="submit" value="Voeg Fiets Toe">
</form>
