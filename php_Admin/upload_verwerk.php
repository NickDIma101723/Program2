<?php
session_start();
require 'config.php';

$map = "images/";
$tn_map = "thumbnails/";

if (!file_exists($map)) {
    mkdir($map, 0777, true);
}

if (!file_exists($tn_map)) {
    mkdir($tn_map, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $uploader = trim($_POST['uploader']);
    $titel = trim($_POST['titel']);
    $bestand = $_FILES['afbeelding'];
    
    if (empty($uploader) || empty($titel)) {
        $_SESSION['error'] = "Vul alle velden in.";
        header("Location: upload.php");
        exit();
    }
    
    if ($bestand['error'] !== UPLOAD_ERR_OK) {
        $_SESSION['error'] = "Er is een fout opgetreden bij het uploaden.";
        header("Location: upload.php");
        exit();
    }
    
    $check = getimagesize($bestand['tmp_name']);
    if ($check === false) {
        $_SESSION['error'] = "Het bestand is geen geldige afbeelding.";
        header("Location: upload.php");
        exit();
    }

    $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($bestand['type'], $allowed_types)) {
        $_SESSION['error'] = "Alleen JPG, PNG, GIF en WebP bestanden zijn toegestaan.";
        header("Location: upload.php");
        exit();
    }
    
    $bestandsnaam = basename($bestand['name']);
    $bestandsnaam = preg_replace("/[^a-zA-Z0-9\.\-\_]/", "_", $bestandsnaam);
    
    $unieke_naam = time() . '_' . $bestandsnaam;
    
    if (move_uploaded_file($bestand['tmp_name'], $map . $unieke_naam)) {
        
        $info = getimagesize($map . $unieke_naam);
        
        if ($info['mime'] == 'image/jpeg') {
            $origineel = imagecreatefromjpeg($map . $unieke_naam);
            $thumb = imagecreatetruecolor(100, 100);
            imagecopyresampled($thumb, $origineel, 0, 0, 0, 0, 100, 100, $info[0], $info[1]);
            imagejpeg($thumb, $tn_map . 'tn_' . $unieke_naam);
            imagedestroy($origineel);
            imagedestroy($thumb);
        } elseif ($info['mime'] == 'image/png') {
            $origineel = imagecreatefrompng($map . $unieke_naam);
            $thumb = imagecreatetruecolor(100, 100);
            imagealphablending($thumb, false);
            imagesavealpha($thumb, true);
            imagecopyresampled($thumb, $origineel, 0, 0, 0, 0, 100, 100, $info[0], $info[1]);
            imagepng($thumb, $tn_map . 'tn_' . $unieke_naam);
            imagedestroy($origineel);
            imagedestroy($thumb);
        } elseif ($info['mime'] == 'image/gif') {
            $origineel = imagecreatefromgif($map . $unieke_naam);
            $thumb = imagecreatetruecolor(100, 100);
            imagecopyresampled($thumb, $origineel, 0, 0, 0, 0, 100, 100, $info[0], $info[1]);
            imagegif($thumb, $tn_map . 'tn_' . $unieke_naam);
            imagedestroy($origineel);
            imagedestroy($thumb);
        }
        
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
