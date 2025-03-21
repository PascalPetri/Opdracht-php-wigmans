<?php
// Gemaakt door Pascal Petri
require_once 'functions.php'; // Laadt de functies in vanuit een aparte bestand

// Haal alle fietsen op uit de database
$fietsen = getFietsen();
?>

<h2>Fietsen CRUD</h2>

<!-- Link naar de pagina om een nieuwe fiets toe te voegen -->
<p><a href="add_fiets.php">Voeg een nieuwe fiets toe</a></p>

<!-- Tabel met alle fietsen en bijbehorende acties -->
<table border="1">
    <thead>
        <tr>
            <th>Merk</th>
            <th>Type</th>
            <th>Prijs</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($fietsen as $fiets): ?>
        <tr>
            <!-- Weergeven van de fietsgegevens -->
            <td><?php echo htmlspecialchars($fiets['merk']); ?></td>
            <td><?php echo htmlspecialchars($fiets['type']); ?></td>
            <td><?php echo htmlspecialchars($fiets['prijs']); ?> EUR</td>
            <td>
                <!-- Link om de fiets te bewerken -->
                <a href="update.php?merk=<?php echo urlencode($fiets['merk']); ?>&type=<?php echo urlencode($fiets['type']); ?>">Bewerken</a> |
                <!-- Link om de fiets te verwijderen -->
                <a href="delete.php?merk=<?php echo urlencode($fiets['merk']); ?>&type=<?php echo urlencode($fiets['type']); ?>">Verwijderen</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
