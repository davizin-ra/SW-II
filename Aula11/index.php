<?php

$busca = isset($_GET['entrada']) ? preg_replace('/\D/', '', $_GET['entrada']) : '';
$cepValido = preg_match('/^\d{8}$/', $busca);

$cep = null;
if ($cepValido) {
    $url = "https://viacep.com.br/ws/$busca/json/";
    $response = @file_get_contents($url);
    $cep = json_decode($response, true);}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cep</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form method="get">
        <input type="number" name="entrada" maxlength="8" pattern="\d{8}" oninput="this.value = this.value.replace(/[^0-9]/g, '')"  value="<?php echo htmlspecialchars($busca) ?>" required placeholder="Digite o CEP (EX: 12345678)">
        <button>Enviar</button>
    </form>

    <div class="container">
        <!-- <php
    if (isset($_GET["entrada"]) && $_GET["entrada"]){
        echo $cep ['logradouro'];
        echo $cep ['bairro'];
        echo $cep ['localidade'];
        echo $cep ['estado'];
        echo $cep ['uf'];
    }
    ?> -->

<?php
if (isset($_GET["entrada"])) {
    if (!$cepValido) {
        echo "<p>CEP inválido! Digite exatamente 8 números.</p>";
    } elseif (isset($cep['erro']) && $cep['erro'] == true) {
        echo "<p>CEP não encontrado.</p>";
    } else {
        echo "<p><strong>Logradouro:</strong> {$cep['logradouro']}</p>";
        echo "<p><strong>Bairro:</strong> {$cep['bairro']}</p>";
        echo "<p><strong>Cidade:</strong> {$cep['localidade']}</p>";
        echo "<p><strong>Estado (UF):</strong> {$cep['uf']}</p>";
    }
}
?>


    </div>
</body>

</html>