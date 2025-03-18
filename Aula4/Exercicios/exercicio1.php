<?php

    $pessoa = array(
        'Nome' => 'Davizin',
        'Idade' => 17,
        'Cidade' => 'Ribeirão Pires'
    );

    $pessoa['profissao'] = 'piloto';

    $amigos = array('Zu', 'Go', 'Cin', 'Ti', 'Lu', 'Pe');

    $dados = array(
        'pessoa' => $pessoa,
        'amigos' => $amigos
    );

    print_r($dados);

?>