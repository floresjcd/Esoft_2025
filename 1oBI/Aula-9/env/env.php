<?php
    // env.php
    
    if (isset($_ENV['"USER"'])) {
        echo "Ambiente: " . $_ENV['"USER"'];
    } else {
        echo "Variável de ambiente não disponível.";
    }
?>

