<?php
require_once('../../slutprojekt-app.php');

require($includeDir . "/header.php"); 

$stmt = $pdo-> prepare("SELECT * FROM Ryttare JOIN Hästar ON Ryttare.Hästid = Hästar.Hästid");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


$Hästar = [];

foreach ($result as $key => $value) : 
    $Hästar[$value['Häst']][] = $value['Namn'] . " " . $value['Efternamn'];
endforeach ?>

<main>

<?php if (isset($_SESSION["Ryttarid"])) : ?>

<table>

        <tr>

            <th>Häst</th>
            <th>Ryttare</th>
            <th>Ryttare 2</th>



        </tr>
        
        <?php foreach ($Hästar as $key => $value) : ?>

        <tr>

            <td><?=h($key) ?></td>
            <td><?=h($value[0] ) ?></td>       
            <td><?=h($value[1] ??'') ?></td>

            
        </tr>

        <?php endforeach?>


    </table>

<?php endif ?>










</main>