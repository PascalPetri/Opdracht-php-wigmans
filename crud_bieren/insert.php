<?php
include 'config.php'; // Databaseverbinding
include 'functions.php'; // Functies zoals addBier

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verkrijg de biercode, naam, soort, stijl, alcohol en brouwcode uit de formulierinvoer
    $naam = $_POST['naam'];
    $soort = $_POST['soort'];
    $stijl = $_POST['stijl'];
    $alcohol = $_POST['alcohol'];
    $brouwcode = $_POST['brouwcode'];

    // Voeg het bier toe via de functie
    if (addBier($pdo, $naam, $soort, $stijl, $alcohol, $brouwcode)) {
        echo "Bier toegevoegd! <a href='index.php'>Terug naar de lijst</a>";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van het bier.";
    }
}
?>

<h2>Voeg een Bier Toe</h2>
<form method="post">
    <label for="naam">Naam:</label><br>
    <input type="text" name="naam" id="naam" required><br><br>
    
    <label for="soort">Soort:</label><br>
    <input type="text" name="soort" id="soort" required><br><br>
    
    <label for="stijl">Stijl:</label><br>
    <input type="text" name="stijl" id="stijl" required><br><br>
    
    <label for="alcohol">Alcohol%:</label><br>
    <input type="number" name="alcohol" id="alcohol" step="0.1" required><br><br>
    
    <label for="brouwcode">Brouwcode:</label><br>
    <select name="brouwcode" id="brouwcode" required>
        <?php
        // Haal alle brouwer codes op uit de database
        $brouwcodes = getBrouwCodes($pdo);
        
        
        // Voeg elke brouwcode en naam toe aan de dropdown
        foreach ($brouwcodes as $brouwcode) {
            echo "<option value='" . htmlspecialchars($brouwcode['brouwcode']) . "'>" . htmlspecialchars($brouwcode['brouwcode']) . "</option>";
        }
        ?>
    </select><br><br>
    
    <input type="submit" value="Voeg Bier Toe">
</form>
