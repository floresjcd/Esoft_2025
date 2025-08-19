<!DOCTYPE html>
<html>

    <head>
        <title>Introdução ao PHP</title>
    </head>

    <body>
        <h1> Operadores de Comparação ou Relacionais</h1>
            <?php
                $valor1 = 10;
                $valor2 = "10";

                echo "<p>Valor1 == Valor2: ";
                var_dump($valor1 == $valor2); // true (apenas valor)
                echo "</p>";

                echo "<p>Valor1 === Valor2: ";
                var_dump($valor1 === $valor2); // false (valor e tipo)
                echo "</p>";

                echo "<p>Valor1 > 5: ";
                var_dump($valor1 > 5); // true
                echo "</p>";
            ?>
    </body>

</html>
