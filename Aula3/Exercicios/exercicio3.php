<?php

    function parouimpar($num) {
        return ($num % 2 == 0) ? "Par" : "Ímpar";
    }

    echo "20 é: " . parouimpar(20) . "<br>";
    echo "5 é: " . parouimpar(5) . "<br>"; 

?>