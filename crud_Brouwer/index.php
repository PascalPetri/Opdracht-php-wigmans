<?php
include 'config.php'; // Databaseverbinding
include 'functions.php'; // Functies zoals getBrouwers

// Haal de brouwers op uit de database met de oude getBrouwers functie
$brouwers = getBrouwers($pdo);
?>

<h2>Brouwers</h2>
<!-- Link naar de pagina om een brouwer toe te voegen -->
<a href="insert.php">Voeg een brouwer toe</a>

<table border="1">
    <thead>
        <tr>
            <th>Brouwcode</th>
            <th>Naam</th>
            <th>Land</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop door de brouwers en toon ze in de tabel
        foreach ($brouwers as $brouwer) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($brouwer['brouwcode']) . "</td>";
            echo "<td>" . htmlspecialchars($brouwer['naam']) . "</td>";
            echo "<td>" . htmlspecialchars($brouwer['land']) . "</td>";
            echo "<td>
                <a href='update.php?brouwcode=" . $brouwer['brouwcode'] . "'>Wijzig</a> |
                <a href='delete.php?id=" . $brouwer['brouwcode'] . "'>Verwijder</a>
            </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
