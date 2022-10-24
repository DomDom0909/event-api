<?php 
 echo "<pre>"; 
print_r($_POST); echo "</pre>"; 
 if (!empty($_POST["interesse"])) { echo "<p>Folgende Interessen wurden angegeben:<br>"; 
 echo implode(", ", $_POST["interesse"]) . "</p>"; } 
?> 