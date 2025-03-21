<?php
// Gemaakt door Pascal Petri
require_once 'functions.php'; // Laadt de functies in

// Controleer of de vereiste parameters aanwezig zijn in de URL
if (isset($_GET['merk']) && isset($_GET['type'])) {
    $merk = $_GET['merk'];
    $type = $_GET['type'];

    // Probeer de fiets uit de database te verwijderen
    if (deleteFiets($merk, $type)) {
        // Redirect naar read.php om de bijgewerkte lijst te tonen
        header("Location: read.php");
        exit; // Stop verdere uitvoer na de redirect
    } else {
        echo "Er is een fout opgetreden bij het verwijderen van de fiets.";
    }
} else {
    // Geef een foutmelding als de vereiste parameters ontbreken
    echo "Geen fiets opgegeven om te verwijderen.";
}
?>
