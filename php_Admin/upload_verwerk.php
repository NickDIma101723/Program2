<?php
session_start();
require 'config.php';

// Map voor afbeeldingen
$map = "images/";

// Check of de map bestaat, zo niet maak aan
if (!file_exists($map)) {
    mkdir($map, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Formulier gegevens ophalen
    $uploader = trim($_POST['uploader']);
    $titel = trim($_POST['titel']);
    $bestand = $_FILES['afbeelding'];
    
    // Controleer of alle velden zijn ingevuld
    if (empty($uploader) || empty($titel)) {
        $_SESSION['error'] = "Vul alle velden in.";
        header("Location: upload.php");
        exit();
    }
    
    // Controleer of er een bestand is geüpload
    if ($bestand['error'] !== UPLOAD_ERR_OK) {
        $_SESSION['error'] = "Er is een fout opgetreden bij het uploaden.";
        header("Location: upload.php");
        exit();
    }
    
    // Controleer of het bestand een afbeelding is (Extra Opdracht)
    $check = getimagesize($bestand['tmp_name']);
    if ($check === false) {
        $_SESSION['error'] = "Het bestand is geen geldige afbeelding.";
        header("Location: upload.php");
        exit();
    }

    // Extra check op extensie voor de zekerheid
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($bestand['type'], $allowed_types)) {
        $_SESSION['error'] = "Alleen JPG, PNG, GIF en WebP bestanden zijn toegestaan.";
        header("Location: upload.php");
        exit();
    }
    
    // Bestandsnaam veilig maken
    $bestandsnaam = basename($bestand['name']);
    $bestandsnaam = preg_replace("/[^a-zA-Z0-9\.\-\_]/", "_", $bestandsnaam);
    
    // Unieke naam maken om overschrijven te voorkomen
    $unieke_naam = time() . '_' . $bestandsnaam;
    
    // Bestand verplaatsen naar de images map
    if (move_uploaded_file($bestand['tmp_name'], $map . $unieke_naam)) {
        
        // Opslaan in database
        try {
            $query = "INSERT INTO afbeeldingen (Uploader, Titel, Afbeelding) VALUES (:uploader, :titel, :afbeelding)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':uploader', $uploader);
            $stmt->bindParam(':titel', $titel);
            $stmt->bindParam(':afbeelding', $unieke_naam);
            $stmt->execute();
            
            header("Location: overzicht.php?success=1");
            exit();
            
        } catch (PDOException $e) {
            $_SESSION['error'] = "Database fout: " . $e->getMessage();
            header("Location: upload.php");
            exit();
        }
        
    } else {
        $_SESSION['error'] = "Fout: Bestand kon niet worden verplaatst.";
        header("Location: upload.php");
        exit();
    }
    
} else {
    header("Location: upload.php");
    exit();
}
