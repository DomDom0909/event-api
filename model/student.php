<?php
    //Connect to database.
    $database = new mysqli("localhost", "root", "", "uek295");

    //Get all students.
    $result = $database->query("SELECT * FROM student");

    //Echo all students.
?>