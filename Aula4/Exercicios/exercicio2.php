<?php

    $numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
    $sm = 0;

    foreach ($numeros as $n) {
        $sm += $n; 
    }

    echo "A soma de tudo é: " . $sm;

?>