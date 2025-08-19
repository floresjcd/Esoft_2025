<!DOCTYPE html>
<html>

    <head>
        <title>Introdução ao PHP</title>
    </head>

    <body>
        <h1> Operador lógico XOR</h1>
        <?php
            $pagoDinheiro = true;
            $pagoCartao = false;

            if ($pagoDinheiro xor $pagoCartao) {
                echo "Pagamento feito com um único método.\n"; // Será exibido
            } else {
                echo "Pagamento inválido (usou dois métodos ou nenhum).\n";
            }
        ?>
    </body>

</html>