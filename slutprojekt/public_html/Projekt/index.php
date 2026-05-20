<?php
require_once('../../slutprojekt-app.php');

unset($_SESSION["Ryttarid"]);

require($includeDir . "/header.php"); 
?>

<main>
       <h2>Logga in</h2>

    <form action="login-formhandler.php" method="post">
        <div>
            <label for="username">Användarnamn:</label>
            <input type="text"  name="username" id="username" required>
        </div>
        <div>
            <label for="password">Lösenord: </label>
            <input type="password" name="password" id="password" required>
        </div>
        <input type="submit" value="Logga in">
    </form>


</main>
     