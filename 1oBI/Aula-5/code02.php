<!DOCTYPE html>
<html>

    <head>
        <title>Introdução ao PHP</title>
    </head>

    <body>
        <h1> Operadores de Atribuição</h1>
        <?php
        
            $total = 100;
            $total += 50; // $total agora é 150
            echo "<p>Total: " . $total . "</p>";

            $mensagem = "Bem-vindo ";
            $mensagem .= "ao PHP!"; // $mensagem agora é "Bem-vindo ao PHP!"
            echo "<p>Mensagem: " . $mensagem . "</p>";

            ?>
    </body>

</html>
