<?php
    $valor_str = "R$ 1500,50";
    // Remove o "R$" e substitui a vírgula por ponto
    $valor_limpo = str_replace(["R$", ","], ["", "."], $valor_str);
    $valor_float = floatval($valor_limpo);

    echo "String original: \"" . $valor_str . "\"\n";
    echo "String limpa: \"" . $valor_limpo . "\"\n";
    echo "Valor numérico: " . $valor_float . " (Tipo: " . gettype($valor_float) . ")\n";
?>