<?php
    $status = 0;
    echo "Original: " . var_export($status, true) . " (Tipo: " . gettype($status) . ")\n";

    settype($status, "boolean");
    echo "Após settype(\"boolean\"): " . var_export($status, true) . " (Tipo: " . gettype($status) . ")\n";

    if ($status) {
        echo "A variável \$status é TRUE.\n";
    } else {
        echo "A variável \$status é FALSE.\n";
    }
?>