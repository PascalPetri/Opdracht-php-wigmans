<?php
// Gemaakt door Pascal Petri
require_once 'functions.php'; // Laadt de functies in vanuit een aparte bestand

// Controleer of de parameters 'merk' en 'type' via GET zijn ontvangen
if (isset($_GET['merk']) && isset($_GET['type'])) {
    $merk = $_GET['merk'];
    $type = $_GET['type'];
    
    // Haal de gegevens van de fiets op uit de database
    $fiets = getFiets($merk, $type);

    // Controleer of het formulier is ingediend
    if (isset($_POST['submit'])) {
        $prijs = $_POST['prijs'];

        // Werk de fietsgegevens bij in de database
        if (updateFiets($merk, $type, $prijs)) {
            echo "Fiets succesvol bijgewerkt!";
        } else {
            echo "Er is een fout opgetreden bij het bijwerken van de fiets.";
        }
    }
}
?>

<h2>Werk Fiets Bij</h2>
<a href="read.php">Home</a>

<!-- Formulier voor het bijwerken van een fiets -->
<form method="POST" action="update.php?merk=<?php echo urlencode($merk); ?>&type=<?php echo urlencode($type); ?>">
    <!-- Merkveld (alleen lezen, kan niet worden aangepast) -->
    <label for="merk">Merk:</label>
    <input type="text" name="merk" value="<?php echo htmlspecialchars($fiets['merk']); ?>" readonly required><br>

    <!-- Typeveld (alleen lezen, kan niet worden aangepast) -->
    <label for="type">Type:</label>
    <input type="text" name="type" value="<?php echo htmlspecialchars($fiets['type']); ?>" readonly required><br>

    <!-- Prijsveld (kan worden aangepast) -->
    <label for="prijs">Prijs:</label>
    <input type="number" name="prijs" value="<?php echo htmlspecialchars($fiets['prijs']); ?>" required><br>

    <!-- Knop om de fiets bij te werken -->
    <input type="submit" name="submit" value="Werk Fiets Bij">
</form>
