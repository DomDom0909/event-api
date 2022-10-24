<?php
    //Connect to database.
    $database = new mysqli("localhost", "root", "", "uek295");

    //Get all students.
    $result = $database->query("SELECT * FROM student");

    //Echo all students.
    if ($result == false) {
        echo "An error occured while fetching the student data.";
    }
    else if ($result !== true) {
        if ($result->num_rows > 0) { 
            while ($student = $result->fetch_assoc()) {
                echo "
            <tr>
                <th>" . $student["student_id"] . "</th>
                <th>" . $student["name"] . "</th>
                <th>" . $student["age"] . "</th>
            </tr>";
            }
        }

    }
?>