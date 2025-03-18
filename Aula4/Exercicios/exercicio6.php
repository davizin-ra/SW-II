<?php

    $notas = array(
        'Da' => 7.0,
        'Go' => 10.0,
        'Zu' => 2.0,
        'Pe' => 5.5,
        'Wes' => 7.5,
        'Lu' => 6.5
    );

    $sm = 0;
    $totalAlunos = count($notas); 
    $maior = 0; 
    $alunoMaior = ''; 

    foreach ($notas as $nome => $nota) {
        $sm += $nota; 
    
        if ($nota > $maior) {
            $maior = $nota;
            $alunoMaior = $nome; 
        }
    }

    $media = $sm / $totalAlunos;

    echo "A média é: " . $media . "<br>";
    echo "Quem tem a maior nota é: " . $alunoMaior . ", com a nota " . $maior . "<br>";

?>
