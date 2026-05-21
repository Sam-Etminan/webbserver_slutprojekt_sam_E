 <?php
require_once('../../slutprojekt-app.php');

require($includeDir . "/header.php"); 
?>
 
<main>
 
 <form action="nytt-utsläpp-formhandler.php" method="post">
      <label for="Datum">Datum</label><br>
      <input type="text" name="Datum" id="Datum" required><br>
      <label for="Content"></label>Info<br>
      <textarea name="Content" id="Content" rows="10" cols="60" id="Content"></textarea><br>

      <input type="submit" value="Skicka in">
  </form>



</main>