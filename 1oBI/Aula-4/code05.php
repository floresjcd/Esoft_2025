<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Exemplo 1: Variáveis e Tipos de Dados
    $nome = "Carlos"; // String
    $idade = 25;    // Integer
    $altura = 1.80; // Float
    $isAtivo = true; // Boolean
    $nulo = NULL; // NULL

    echo "<h2>Variáveis e Tipos de Dados</h2>";
    echo "<p>Nome: " . $nome . " (Tipo: " . gettype($nome) . ")</p>";
    echo "<p>Idade: " . $idade . " (Tipo: " . gettype($idade) . ")</p>";
    echo "<p>Altura: " . $altura . " (Tipo: " . gettype($altura) . ")</p>";
    echo "<p>Ativo: " . ($isAtivo ? "Sim" : "Não") . " (Tipo: " . gettype($isAtivo) . ")</p>";
    echo "<p>Nulo: " . var_export($nulo, true) . " (Tipo: " . gettype($nulo) . ")</p>";
    ?>

</body>

</html>