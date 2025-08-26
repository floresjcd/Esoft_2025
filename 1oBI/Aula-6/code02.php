<!DOCTYPE html>
<html>

    <head>
        <title>Introdução ao PHP</title>
    </head>

    <body>
        <h1> Estruturas Condicionais (if...else)</h1>

        <?php
            $idade = 16;

            if ($idade >= 18) {
                echo "<p>Você pode votar.</p>";
            } else {
                echo "<p>Você não pode votar ainda.</p>";
            }
        ?>
    </body>

</html>