<?php

    function nm() {

        $num = [];
        for ($i = 0; $i < 10; $i++) {
            $num[] = rand(1, 100);
        }
        return $num;

    }

    $numale = nm();
    echo "Números aleatórios: " . implode(", ", $numale) . "<br>";


?>