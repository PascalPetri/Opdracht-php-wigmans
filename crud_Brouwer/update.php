<?php
include 'config.php';  // Databaseverbinding
include 'functions.php';  // Functies zoals getBrouwerByBrouwcode en updateBrouwer

// Verkrijg de brouwcode van de URL
if (isset($_GET['brouwcode'])) {
    $brouwcode = $_GET['brouwcode'];

    // Haal de huidige gegevens van de brouwer op via de functie
    $brouwer = getBrouwerByBrouwcode($pdo, $brouwcode);

    // Als de brouwer niet bestaat, geef een foutmelding
    if (!$brouwer) {
        echo "Brouwer niet gevonden!";
        exit;
    }
} else {
    echo "Geen brouwcode opgegeven!";
    exit;
}

// Verwerk het formulier wanneer het wordt verzonden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verkrijg de naam, land en brouwcode uit de formulierinvoer
    $naam = $_POST['naam'];
    $land = $_POST['land'];
    $brouwcode = $_POST['brouwcode'];  // Brouwcode komt nu ook uit het formulier

    // Update de brouwer via de functie
    if (updateBrouwer($pdo, $brouwcode, $naam, $land)) {
        echo "Brouwer bijgewerkt! <a href='index.php'>Terug naar de lijst</a>";
    } else {
        echo "Er is een fout opgetreden bij het bijwerken van de brouwer.";
    }
}
?>

<h2>Werk Brouwer Gegevens Bij</h2>
<form method="post">
    <label for="brouwcode">Brouwcode:</label><br>
    <input type="text" name="brouwcode" id="brouwcode" value="<?php echo $brouwer['brouwcode']; ?>" required readonly><br><br>

    <label for="naam">Naam:</label><br>
    <input type="text" name="naam" id="naam" value="<?php echo $brouwer['naam']; ?>" required><br><br>

    <label for="land">Land:</label><br>
    <input type="text" name="land" id="land" value="<?php echo $brouwer['land']; ?>" required><br><br>

    <input type="submit" value="Werk Brouwer Bij">
</form>
