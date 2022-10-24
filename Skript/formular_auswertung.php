<?php
echo "<p>Folgende Daten wurden übermittelt:</p>";
echo "<p>Vorname: " . $_POST["vorname"] . "<br>";
echo "Nachname: " . $_POST["nachname"] . "<br>";
echo "Wohnort: " . $_POST["ort"] ."</p>";

echo "<pre>";
print_r($_POST);
var_dump($_POST);
echo "</pre";
?>