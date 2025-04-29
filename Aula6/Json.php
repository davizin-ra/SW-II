<?php

    header("Content-Type: application/json");
    $metodo = $_SERVER['REQUEST_METHOD'];


    $usuarios = [
        ["id" => 1, "nome" => "Da", "email" => "davizin@email.com"],
        ["id" => 2, "nome" => "Go", "email" => "iaguin@email.com"]
    ];

    switch ($metodo) {

        case 'GET':
            echo json_encode($usuarios);
            break;  
                  
        case 'POST':
            $dados = json_decode(file_get_contents('php://input'), true);
            $novoUsuario = [
                "id" => $dados["id"],
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];
            array_push($usuarios, $novoUsuario);
            echo json_encode("O usuário foi adicionado com sucesso.");
            print_r($usuarios);
            break;       

        default:
            echo "O método requisitado não foi encontrado.";
            break;        

    }

?>