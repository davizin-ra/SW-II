<?php

    header("Content-Type: application/json");
    $metodo = $_SERVER['REQUEST_METHOD'];
    $arquivo = 'usuarios.json';
    if(!file_exists($arquivo)){
        file_put_contents($arquivos, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    $usuarios = json_decode(file_get_contents($arquivo), true);
    switch ($metodo) {
        case 'GET':
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $usuario_encontrado = null;
                foreach ($usuarios as $usuario) {
                    if($usuario['id'] == $id){
                        $usuario_encontrado = $usuario;
                        break;
                    }
                }

                if ($usuario_encontrado) {
                    echo json_encode($usuario_encontrado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                }
                else {
                    http_response_code(404);
                    echo json_encode(["erro" => "O usuário requerido não foi encontrado."], JSON_UNESCAPED_UNICODE);
                }
            }
            else{
                echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
            break;        

        case 'POST':
            $dados = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($dados["nome"]) || !isset($dados["email"])) {
                http_response_code(400);
                echo json_encode(["erro" => "O nome e o email são obrigatórios, por favor."], JSON_UNESCAPED_UNICODE);
                exit;
            }
            $novo_id = 1;

            if (!empty($usuarios)) {
                $ids = array_column($usuarios, 'id');
                $novo_id = max($ids) + 1;
            }
            $novoUsuario = [
                "id" => $novo_id,
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];
            $usuarios[] = $novoUsuario;
            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            echo json_encode([
                "mensagem" => "O usuário foi adicionado com sucesso.",
                "usuario" => $novoUsuario
            ], JSON_UNESCAPED_UNICODE);            
            break;      

            case 'DELETE':
                if(isset($_GET['id'])) {
                    $id = intval($_GET['id']);
                    $usuario_encontrado = null;
                    foreach ($usuarios as $index => $usuario) {
                        if($usuario['id'] == $id){
                            $usuario_encontrado = $usuario;
                            unset($usuarios[$index]);
                            break;
                        }
                    }
    
                    if ($usuario_encontrado) {
                        file_put_contents($arquivo, json_encode(array_values($usuarios), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        echo json_encode(["mensagem" => "Usuário removido com sucesso."], JSON_UNESCAPED_UNICODE);
                    }
                    else {
                        http_response_code(404);
                        echo json_encode(["erro" => "O usuário não foi encontrado."], JSON_UNESCAPED_UNICODE);
                    }
                }
                else {
                    http_response_code(400);
                    echo json_encode(["erro" => "O ID do usuário é necessário para excluir."], JSON_UNESCAPED_UNICODE);
                }
                break;
    
            case 'PUT':
                if(isset($_GET['id'])) {
                    $id = intval($_GET['id']);
                    $dados = json_decode(file_get_contents('php://input'), true);
                    
                    $usuario_encontrado = null;
                    foreach ($usuarios as &$usuario) {
                        if($usuario['id'] == $id){
                            $usuario_encontrado = &$usuario;
                            if (isset($dados["nome"])) {
                                $usuario["nome"] = $dados["nome"];
                            }
                            if (isset($dados["email"])) {
                                $usuario["email"] = $dados["email"];
                            }
                            break;
                        }
                    }
    
                    if ($usuario_encontrado) {
                        file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        echo json_encode(["mensagem" => "Usuário atualizado com sucesso.", "usuario" => $usuario_encontrado], JSON_UNESCAPED_UNICODE);
                    } 
                    else {
                        http_response_code(404);
                        echo json_encode(["erro" => "O usuário não foi encontrado."], JSON_UNESCAPED_UNICODE);
                    }
                }
                else {
                    http_response_code(400);
                    echo json_encode(["erro" => "O ID do usuário é necessário para atualizar."], JSON_UNESCAPED_UNICODE);
                }
                break;

        default:
            http_response_code(405);
            echo json_encode(["erro" => "O método requerido não é permitido"], JSON_UNESCAPED_UNICODE);
            break;   
            
    }

?>