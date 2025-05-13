<?php

    $busca = isset($_GET['entrada']) ? strtolower(trim($_GET['entrada'])) :'';
    $url = "https://viacep.com.br/ws/$busca/json/";
    $response = @file_get_contents($url);
    $cep = json_decode($response, true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cep</title>
</head>

<body>

    <form method="get">
        <input type="number" name="entrada" value="<?php echo htmlspecialchars($busca)?>">
        <button>Enviar</button>
    </form>

    <div class="container">
    <?php
        echo $cep ['logradouro'];
        echo $cep ['bairro'];
        echo $cep ['localidade'];
        echo $cep ['estado'];
        echo $cep ['uf'];
    ?>
    </div>
</body>

</html>