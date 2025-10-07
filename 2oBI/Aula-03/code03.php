<?php

    $contador = 0;

    function incrementar(){
        global $contador; // Acessa a variável global
        $contador++;
    }

    incrementar();
    echo $contador; 
?>
