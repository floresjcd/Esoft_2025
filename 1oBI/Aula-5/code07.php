<!DOCTYPE html>
<html>

    <head>
        <title>Introdução ao PHP</title>
    </head>

    <body>
        <h1> Operador lógico NOT</h1>
        <?php
            $usuarioLogado = false;

            if (!$usuarioLogado) {
                echo "Usuário precisa fazer login.\n"; // Será exibido
            }

            $numero = 0;
            if (!$numero) {
                echo "O número é zero (falso em booleano).\n"; // Será exibido
            }
        ?>
    </body>

</html>