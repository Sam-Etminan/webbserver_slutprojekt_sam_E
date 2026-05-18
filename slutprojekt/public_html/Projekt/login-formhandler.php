<?php

require_once("../../slutprojekt-app.php");

$messages = array();

// Har formuläret fyllts i?
if (!isset($_POST["username"]) || !isset($_POST["password"]) || $_POST["username"] =="") {
    $messages[] = "Formuläret är inte korrekt ifyllt!";

} else {
    
    $loginStmt = $pdo->prepare("SELECT password, Ryttarid FROM Ryttare WHERE username = :username");
    $loginStmt->execute([
        "username" => $_POST["username"]
    ]);
    $loginResult = $loginStmt->fetch(PDO::FETCH_ASSOC);


    if ($loginResult != false) {

        
        if (password_verify($_POST["password"], $loginResult["password"])) {

            $_SESSION["Ryttarid"] = $loginResult["Ryttarid"];
            $messages[] = "Du loggade in som " . $_POST["username"];

        } else {
         
            $messages[] =  "Inloggningen misslyckades";
        }
        
    } else {
        // Användarnamnet finns inte
        $messages[] = "Inloggningen misslyckades";
    }
}

require($includeDir . "/header.php");
?>

<main>

    <h2>Inloggning</h2>
    <?php foreach ($messages as $key => $value) : ?>
        <div> <?= $value?> </div>
    <?php endforeach; ?>

</main>

<?php require($includeDir . "/footer.php"); ?>