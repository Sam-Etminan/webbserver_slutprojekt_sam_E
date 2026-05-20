<?php
require_once('../../slutprojekt-app.php');

require($includeDir . "/header.php"); 

$stmt = $pdo-> prepare("SELECT * FROM Ryttare");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);



?> 

<main>

<?php if (isset($_SESSION["Ryttarid"])) : ?>

<table>

        <tr>

            <th>Förnamn</th>

            <th>Efternamn</th>


        </tr>
        
        <?php foreach ($result as $key => $value) : ?>

        <tr>

            <td><?=h($value['Namn']) ?></td>

            <td><?= h($value['Efternamn']) ?></td>
            
        </tr>

        <?php endforeach?>


    </table>

<?php endif ?>




</main>