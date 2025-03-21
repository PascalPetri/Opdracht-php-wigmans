<?php
// Gemaakt door Pascal Petri
require_once 'db.php'; // Verbindt met de database

// CREATE: Voeg een nieuwe fiets toe aan de database
function createFiets($merk, $type, $prijs) {
    global $pdo;
    $sql = "INSERT INTO fietsen (merk, type, prijs) VALUES (:merk, :type, :prijs)";
    $stmt = $pdo->prepare($sql);

    // Koppel de parameters aan de query
    $stmt->bindParam(':merk', $merk);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':prijs', $prijs);

    // Voer de query uit en retourneer het resultaat (true/false)
    return $stmt->execute();
}

// READ: Haal alle fietsen op uit de database
function getFietsen() {
    global $pdo;
    $sql = "SELECT * FROM fietsen";
    $stmt = $pdo->query($sql);
    
    // Haal alle resultaten op als een associatieve array
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// READ: Haal een specifieke fiets op basis van merk en type
function getFiets($merk, $type) {
    global $pdo;
    $sql = "SELECT * FROM fietsen WHERE merk = :merk AND type = :type";
    $stmt = $pdo->prepare($sql);

    // Koppel de parameters aan de query
    $stmt->bindParam(':merk', $merk);
    $stmt->bindParam(':type', $type);

    // Voer de query uit
    $stmt->execute();

    // Retourneer de opgehaalde fiets als een associatieve array
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// UPDATE: Werk een fiets bij in de database
function updateFiets($merk, $type, $prijs) {
    global $pdo;

    // SQL-query om de prijs van een fiets bij te werken
    $sql = "UPDATE fietsen 
            SET prijs = :prijs 
            WHERE merk = :merk AND type = :type";

    $stmt = $pdo->prepare($sql);

    // Koppel de parameters aan de query
    $stmt->bindParam(':merk', $merk);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':prijs', $prijs);

    // Voer de query uit en retourneer het resultaat (true/false)
    return $stmt->execute();
}

// DELETE: Verwijder een fiets uit de database
function deleteFiets($merk, $type) {
    global $pdo;
    $sql = "DELETE FROM fietsen WHERE merk = :merk AND type = :type";
    $stmt = $pdo->prepare($sql);

    // Koppel de parameters aan de query
    $stmt->bindParam(':merk', $merk);
    $stmt->bindParam(':type', $type);

    // Voer de query uit en retourneer het resultaat (true/false)
    return $stmt->execute();
}
?>
