<?php

    $vetor = ['Zuzu', 'Dada', 'Go'];
    $qtde = count($vetor);
    
    for ($i=0 ; $i < $qtde; $i++ ) { 
        echo $vetor[$i];
        echo "<br>";
    }

    var_dump($vetor);
    echo "<br>";
    echo $vetor[1];
    echo "<br>";
    echo $qtde;

?>