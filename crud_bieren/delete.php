<?php
include 'config.php'; // Databaseverbinding

if (isset($_GET['id'])) {
    $brouwcode = $_GET['id'];
    
    // Verwijder de brouwer
    $query = "DELETE FROM bier WHERE brouwcode = :brouwcode";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':brouwcode', $brouwcode, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo "Brouwer succesvol verwijderd! <a href='index.php'>Terug naar de lijst</a>";
    } else {
        echo "Er is een fout opgetreden bij het verwijderen van de brouwer.";
    }
}
?>
