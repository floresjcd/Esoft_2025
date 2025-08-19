<!DOCTYPE html>
<html>

    <head>
        <title>Introdução ao PHP</title>
    </head>

    <body>
        <h1> Operador lógico AND</h1>
            <?php
            $idade = 20;
            $temCarteira = true;

            // Usando '&&'
            if ($idade >= 18 && $temCarteira) {
                echo "Pode dirigir.\n"; // Será exibido
            }

            // Usando 'and'
            if ($idade >= 18 and $temCarteira) {
                echo "Também pode dirigir.\n"; // Será exibido
            }
            ?>
    </body>

</html>
