<?php
$mixed_array = [
    "123",         // inteiro
    "Hello PHP",   // string
    "true",        // booleano
    "3.14",        // float
    "NULL"         // NULL
];

// Converte os valores
$converted_array = [
    (int)$mixed_array[0],            // inteiro
    (string)$mixed_array[1],         // string
    filter_var($mixed_array[2], FILTER_VALIDATE_BOOLEAN), // booleano
    (float)$mixed_array[3],          // float
    null                             // NULL
];

// Exibe resultado para conferência
echo "\n--- Inspeção do array com var_dump() ---\n";
var_dump($converted_array);
?>
