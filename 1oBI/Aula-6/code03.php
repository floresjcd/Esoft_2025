<!DOCTYPE html>
<html>

    <head>
        <title>Introdução ao PHP</title>
    </head>

    <body>
        <h1> Estruturas Condicionais (if...elseif...else)</h1>

        <?php
            $nota = 75;

            if ($nota >= 90) {
                echo "<p>Nota A</p>";
            } elseif ($nota >= 80) {
                echo "<p>Nota B</p>";
            } elseif ($nota >= 70) {
                echo "<p>Nota C</p>";
            } else {
                echo "<p>Nota abaixo de C</p>";
            }
        ?>
    </body>

</html>