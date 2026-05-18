<?php
session_start();
// Database connection
$dsn = "sqlite:" . __DIR__ . "/Slutprojekt.db";

try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Failed to connect to the database using DSN:<br>'$dsn'<br>" . $e->getMessage();
    exit();
}

function h($text) {
    return htmlspecialchars($text);
}

$includeDir = __DIR__ . "/slutprojekt-includes";
$title = "Lindholmen ridklubb";

require_once(__DIR__ . "/slutprojekt-config.php");

if (isset($_SESSION["Ryttarid"])){
$getRyttarStmt = $pdo->prepare("SELECT * FROM Ryttare WHERE Ryttarid = :Ryttarid");
$getRyttarStmt->execute(["Ryttarid" => $_SESSION["Ryttarid"]]);
$Ryttare = $getRyttarStmt->fetch(PDO::FETCH_ASSOC);

}