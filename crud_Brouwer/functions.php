<?php
// Databaseverbinding
function getBrouwers($pdo) {
    $query = 'SELECT * FROM brouwer';
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Voeg een brouwer toe
function addBrouwer($pdo, $naam, $land) {
    $query = "INSERT INTO brouwer (naam, land) VALUES (:naam, :land)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':land', $land);
    return $stmt->execute();
}

// Update een brouwer
function updateBrouwer($pdo, $brouwcode, $naam, $land) {
    $query = "UPDATE brouwer SET naam = :naam, land = :land WHERE brouwcode = :brouwcode";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':brouwcode', $brouwcode);
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':land', $land);
    return $stmt->execute();
}

function getBrouwerByBrouwcode($pdo, $brouwcode) {
    $query = "SELECT * FROM brouwer WHERE brouwcode = :brouwcode";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':brouwcode', $brouwcode);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

