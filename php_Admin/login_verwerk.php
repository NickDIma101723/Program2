<?php

session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['username']) && isset($_POST['password'])) {
       
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($password)) {
            die("Fout: vul beide velden in! <a href='views/login_view.php'>Terug</a>");
        }

        $password_hash = sha1($password);

        $query = "SELECT * FROM Users WHERE username = :username AND password = :password_hash";
        try {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password_hash', $password_hash);
            $stmt->execute();

            $user = $stmt->fetch();

            if ($user) {
            
                $_SESSION['username'] = $username;
                $_SESSION['logged_in'] = true;

                header("Location: index.php");
                exit();

            } else {
                die("Fout: gebruikersnaam of wachtwoord klopt niet. <a href='views/login_view.php'>Probeer opnieuw</a>");
            }
        } catch (PDOException $e) {
            die("Database fout: " . $e->getMessage());
        }

    } else {
        die("Fout: Beide velden zijn verplicht. <a href='views/login_view.php'>Ga terug</a>");
    }

} else {
    die("Ongeldige aanvraagmethode.");
}
