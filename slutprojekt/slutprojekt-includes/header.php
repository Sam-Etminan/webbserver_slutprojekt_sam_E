<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= $siteUrl ?>style.css">
</head>
<body>

<header>
    <h1>lindholmen ridklubb</h1>
    <?php 
    if(isset($_SESSION["Ryttarid"])){
        echo "<div>Inloggad som " . $_SESSION["Ryttarid"] . "</div>";
    } ?>

</header>
<nav>
    <a href="<?= $siteUrl ?>index.php">Logga ut</a>
</nav>