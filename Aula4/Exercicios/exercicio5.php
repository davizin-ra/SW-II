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
    $total = count($notas); 

    foreach ($notas as $nome => $nota) {
        $sm += $nota; 
    }
    $md = $sm / $total;

    echo "A média é: " . $md . "<br>";

?>