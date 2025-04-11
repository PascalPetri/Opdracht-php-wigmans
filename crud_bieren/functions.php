<?php
// Databaseverbinding

// Haal alle bieren op
function getBieren($pdo) {
    $query = 'SELECT * FROM bier';
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Voeg een bier toe
function addBier($pdo, $biercode, $naam, $soort, $stijl, $alcohol, $brouwcode) {
    try {
        // Maak de SQL-query voor het invoegen van een nieuw bier
        $query = "INSERT INTO bier (biercode, naam, soort, stijl, alcohol, brouwcode) 
                  VALUES (:biercode, :naam, :soort, :stijl, :alcohol, :brouwcode)";
        
        // Bereid de query voor
        $stmt = $pdo->prepare($query);
        
        // Bind de parameters aan de query
        $stmt->bindParam(':biercode', $biercode, PDO::PARAM_INT);
        $stmt->bindParam(':naam', $naam, PDO::PARAM_STR);
        $stmt->bindParam(':soort', $soort, PDO::PARAM_STR);
        $stmt->bindParam(':stijl', $stijl, PDO::PARAM_STR);
        $stmt->bindParam(':alcohol', $alcohol, PDO::PARAM_STR);
        $stmt->bindParam(':brouwcode', $brouwcode, PDO::PARAM_INT);
        
        // Voer de query uit en geef het resultaat terug
        return $stmt->execute();
    } catch (PDOException $e) {
        // Foutafhandelingsbericht
        error_log("Fout bij toevoegen bier: " . $e->getMessage());
        return false;
    }
}



// Update een bier
function updateBier($pdo, $biercode, $naam, $soort, $stijl, $alcohol, $brouwcode) {
    $query = "UPDATE bier SET naam = :naam, soort = :soort, stijl = :stijl, alcohol = :alcohol, brouwcode = :brouwcode 
              WHERE biercode = :biercode";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':biercode', $biercode);
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':soort', $soort);
    $stmt->bindParam(':stijl', $stijl);
    $stmt->bindParam(':alcohol', $alcohol);
    $stmt->bindParam(':brouwcode', $brouwcode);
    return $stmt->execute();
}

// Haal een bier op op basis van de biercode
function getBierByBiercode($pdo, $biercode) {
    $query = "SELECT * FROM bier WHERE biercode = :biercode";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':biercode', $biercode);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Verwijder een bier
function deleteBier($pdo, $biercode) {
    $query = "DELETE FROM bier WHERE biercode = :biercode";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':biercode', $biercode);
    return $stmt->execute();
}

function getBrouwCodes($pdo) {
    $query = 'SELECT DISTINCT brouwcode FROM bier'; // Haal alleen unieke brouwcodes op
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
