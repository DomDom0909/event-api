<?php
    for ($i = 1; $i <= 100; $i++) {
        echo "<p style='font-size:" . $i . "px'> $i </p>";
    }



    //content
    echo "<p>Geboren am 21.08.1986 in Sherwood Content.</p>";
    echo "<p>Spitzname des Jamaikanischen Sprinters ist \"Bolt\".</p>";
    echo "<p>Er gilt als der schnellste Mann der Welt!!!</p>";
    echo "<p>Die ganzen Preise und Medallien die er gewonnen hat hier aufzulisten währe zu Lange...</p>";





    $a = 7;
    $b = "30 Euro";
    $c = "!";
    $y = $a + $b;
    echo $a . $b . $c;
    echo "<br>";
    echo "expensive";
    echo "<br>";
    echo "expensive" . $a;
    echo "<br>";
    echo "expensive" . $a . $b;
    echo "<br>";
    echo "Sum: ", $y;
    echo "<br>";
    echo $a + $b + $c;
    echo "<br>";
    echo $a * $b / $c;
    echo "<br>";
    echo ('<strong>\'expensive\'</strong>' . $a . " expensive " . $b);


    $print_result = true;

    function add_numbers($number_one, $number_two, $number_three = 0)
    {
        global $print_result;
        if ($print_result) {
            echo $number_one + $number_two + $number_three;
        }
        return $number_one + $number_two + $number_three;
    }

    add_numbers(1, 2);
    add_numbers(1, 2, 3);

    echo "<br><br>";

    echo $_GET["dark_mode"];

    if ($_GET["dark_mode"] == 1) {
        echo "<style>body { background-color: black; color: white; }</style>";
    }

    ?>