<?php
include 'config.php'; // Databaseverbinding
include 'functions.php'; // Functies zoals updateBier

if (isset($_GET['biercode'])) {
    $biercode = $_GET['biercode'];
    
    // Haal de biergegevens op uit de database
    $stmt = $pdo->prepare("SELECT * FROM bier WHERE biercode = :biercode");
    $stmt->execute(['biercode' => $biercode]);
    $bier = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$bier) {
        die('Bier niet gevonden');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verkrijg de gegevens uit het formulier
    $biercode = $_POST['biercode'];
    $naam = $_POST['naam'];
    $soort = $_POST['soort'];
    $stijl = $_POST['stijl'];
    $alcohol = $_POST['alcohol'];
    $brouwcode = $_POST['brouwcode'];

    // Update het bier
    if (updateBier($pdo, $biercode, $naam, $soort, $stijl, $alcohol, $brouwcode)) {
        echo "Bier bijgewerkt! <a href='index.php'>Terug naar de lijst</a>";
    } else {
        echo "Er is een fout opgetreden bij het bijwerken van het bier.";
    }
}
?>

<h2>Wijzig Bier</h2>
<form method="post">
    <input type="hidden" name="biercode" value="<?= htmlspecialchars($bier['biercode']) ?>">

    <label for="naam">Naam:</label><br>
    <input type="text" name="naam" id="naam" value="<?= htmlspecialchars($bier['naam']) ?>" required><br><br>
    
    <label for="soort">Soort:</label><br>
    <input type="text" name="soort" id="soort" value="<?= htmlspecialchars($bier['soort']) ?>" required><br><br>
    
    <label for="stijl">Stijl:</label><br>
    <input type="text" name="stijl" id="stijl" value="<?= htmlspecialchars($bier['stijl']) ?>" required><br><br>
    
    <label for="alcohol">Alcohol%:</label><br>
    <input type="number" name="alcohol" id="alcohol" value="<?= htmlspecialchars($bier['alcohol']) ?>" required><br><br>
    
    <label for="brouwcode">Brouwcode:</label><br>
    <input type="text" name="brouwcode" id="brouwcode" value="<?= htmlspecialchars($bier['brouwcode']) ?>" required><br><br>
    
    <input type="submit" value="Bijwerken">
</form>
