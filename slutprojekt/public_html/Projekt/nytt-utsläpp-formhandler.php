<?php
require_once('../../slutprojekt-app.php');

if (empty($_POST['Datum'])) {
    echo'Du har inte fyllt i alla fält!';
    exit;
};

$stmt = $pdo->prepare('INSERT INTO posts (Datum, Content, Ryttarid) VALUES (:Datum, :Content, :Ryttarid)');
$stmt->execute([
    'Datum'=> $_POST['Datum'],
    'Content'=> $_POST['Content'],
    'Ryttarid' => $_SESSION['Ryttarid']
]);


header("Location: utsläpp.php");