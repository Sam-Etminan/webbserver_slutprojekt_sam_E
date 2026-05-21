<?php
require_once('../../slutprojekt-app.php');

require($includeDir . "/header.php"); 


$stmt = $pdo-> prepare("SELECT * FROM Hästar JOIN Hagar ON Hästar.hagid = Hagar.hagid");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$UtsläppStmt = $pdo-> prepare("SELECT * FROM posts JOIN Ryttare ON posts.Ryttarid = Ryttare.Ryttarid ORDER BY posts.postid DESC");
$UtsläppStmt->execute();
$result2 = $UtsläppStmt->fetchAll(PDO::FETCH_ASSOC);

$Hagar = [];

foreach ($result as $key => $value) : 
    $Hagar[$value['Hage']][] = $value['Häst'];
endforeach ?>



<main>
<?php if (isset($_SESSION["Ryttarid"])) : ?>



<table>

        <tr>

            <th>Hage</th>

            <th>Häst</th>
            <th>Häst 2</th>


        </tr>
        
        <?php foreach ($Hagar as $key => $value) : ?>

        <tr>

            <td><?=h($key) ?></td>

            <td><?=h($value[0] ) ?></td>       
            <td><?=h($value[1] ??'') ?></td>
            
        </tr>

        <?php endforeach?>


    </table>
           
            <h2>Utsläpp datum</h2> <a href="<?= $siteUrl ?>nytt-utsläpp.php"><h4>Nytt Utsläpp</h4></a>


    <?php foreach ($result2 as $key => $value) : ?>
     
        <div class="INFO">  
        <h2><?= h($value['Datum']) ?> </h2>
        <div>
            <?= h($value['Content']) ??'' ?>
        </div>
        <div>   
            <i>Ansvarig för utsläpp: <?= h($value['Namn'] . " " . $value['Efternamn']) ?></i>
        </div>
    </div>

    <?php endforeach?>

<?php endif ?>

</main>