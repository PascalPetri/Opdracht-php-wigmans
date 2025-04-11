<?php
include 'config.php'; // Databaseverbinding
include 'functions.php'; // Functies zoals getBieren

// Haal de bieren op uit de database met de getBieren functie
$bieren = getBieren($pdo);
?>

<h2>Bieren</h2>
<!-- Link naar de pagina om een bier toe te voegen -->
<a href="insert.php">Voeg een bier toe</a>

<table border="1">
    <thead>
        <tr>
            <th>Biercode</th>
            <th>Naam</th>
            <th>Soort</th>
            <th>Stijl</th>
            <th>Alcohol%</th>
            <th>Brouwcode</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop door de bieren en toon ze in de tabel
        foreach ($bieren as $bier) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($bier['biercode']) . "</td>";
            echo "<td>" . htmlspecialchars($bier['naam']) . "</td>";
            echo "<td>" . htmlspecialchars($bier['soort']) . "</td>";
            echo "<td>" . htmlspecialchars($bier['stijl']) . "</td>";
            echo "<td>" . htmlspecialchars($bier['alcohol']) . "</td>";
            echo "<td>" . htmlspecialchars($bier['brouwcode']) . "</td>";
            echo "<td>
                <a href='update.php?biercode=" . $bier['biercode'] . "'>Wijzig</a> |
                <a href='delete.php?biercode=" . $bier['biercode'] . "'>Verwijder</a>
            </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
