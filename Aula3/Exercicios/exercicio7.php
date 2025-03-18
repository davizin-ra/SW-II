<?php

    function fat($n) {

        if ($n < 0) {
            return "Erro, use numero positivo";
        }
        if ($n == 0 || $n == 1) {
            return 1;
        }
        
        $resultado = 1;
        for ($i = $n; $i >= 2; $i--) {
            $resultado *= $i;
        }
        
        return $resultado;

    }

    echo "Fatorial de 7: " . fat(7) . "<br>"; 

?>