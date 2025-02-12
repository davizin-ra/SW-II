<?php
    $nota1 = 10;
    $nota2 = 3;
    $nota3 = 10;

    $notatotal = ($nota1 + $nota2 + $nota3)/3;

    if ($notatotal >= 6){
        $resultado = "Você foi aprovado";
    }
    else{
        $resultado = "Você foi reprovado";
    }

    echo "Sua média foi: ", round($notatotal), "<br>";
    echo $resultado;
?>