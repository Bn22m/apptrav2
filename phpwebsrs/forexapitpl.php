<?php

/* 
 * forexapitpl.php
 * @author Brian.
 */
include 'header.php';
?>
<p><a href="index.php">Exit</a><hr></p>
<h1>Forex API</h1>
<p>Please Enter the API KEY</p>
<form action="forexapi.php" method="post">
    <p><input type="text" name="apik" size="30" maxlength="60" required="true"></p>
    <p><input type="submit" name="btnapi" value="Enter"></p>
</form>

<?php
include 'footer.php';
?>

