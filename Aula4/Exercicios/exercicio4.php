<?php

    $n = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
    $p = 0;
    $i = 0;


    foreach ($n as $nm) {
        if ($nm % 2 == 0) {
            $p++; 
        } 
        else {
            $i++; 
        }
    }

    echo "Tem " . $p . " números pares" . "<br>";
    echo "Tem " . $i . " números ímpares" . "<br>";

?>