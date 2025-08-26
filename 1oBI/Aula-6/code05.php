<!DOCTYPE html>
<html>

    <head>
        <title>Introdução ao PHP</title>
    </head>

    <body>
        <h1> Estruturas Condicionais (Operador Ternário)</h1>

        <?php
            $idade = 20;
            $status = ($idade >= 18) ? "Maior de idade" : "Menor de idade";

            echo "<p>". $status . "</p>". "\n"; // Saída: Maior de idade
        ?>
    </body>

</html>