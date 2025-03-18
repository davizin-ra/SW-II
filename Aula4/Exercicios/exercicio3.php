<?php

    $n = array(12, 4, 51, 23, 15, 17, 92, 52);
    $maior = $n[0];
    $menor = $n[0];

    foreach ($n as $nm) {
        if ($nm > $maior) {
            $maior = $nm;
        }
        if ($nm < $menor) {
            $menor = $nm; 
        }
    }

    echo "O menor é: " . $menor . "<br>";
    echo "O maior é: " . $maior . "<br>";

?>