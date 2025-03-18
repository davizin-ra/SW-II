<?php

    function tabuada($n) {
        echo "Tabuada do $n:<br>";

        for ($i = 1; $i <= 10; $i++) {
            echo "$n x $i = " . ($n * $i) . "<br>";
        }
    }

    tabuada(5); 

?>