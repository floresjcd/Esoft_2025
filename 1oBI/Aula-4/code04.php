<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        $nome = "João"; // Variável string
        $idade = 30; // Variável inteira
        $altura = 1.75; // Variável float
        $isEstudante = true; // Variável booleana
        echo "<p>Nome: " . $nome . "</p>";
        echo "<p>Idade: " . $idade . " anos</p>";
        echo "<p>Altura: " . $altura . " metros</p>";
        echo "<p>É estudante? " . ($isEstudante ? "Sim" : "Não") . "</p>";
    ?>

</body>

</html>