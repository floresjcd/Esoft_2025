<!DOCTYPE html>
<html>

    <head>
        <title>Introdução ao PHP</title>
    </head>

    <body>
        <h1> Operador lógico OR</h1>
        <?php
            $temIngresso = false;
            $ehConvidado = true;

            if ($temIngresso || $ehConvidado) {
                echo "Pode entrar no evento.\n"; // Será exibido
            }

            // Usando 'or'
            if ($temIngresso or $ehConvidado) {
                echo "Também pode entrar.\n"; // Será exibido
            }
            ?>
    </body>

</html>