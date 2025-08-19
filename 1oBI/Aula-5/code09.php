<!DOCTYPE html>
<html>

    <head>
        <title>Introdução ao PHP</title>
    </head>

    <body>
        <h1> Precedência de Operadores Lógicos</h1>
        <?php
            $a = true;
            $b = false;
            $resultado = ($a || $b) && $b; // Agora é explícito
            var_dump($resultado); // true
        ?>
    </body>

</html>