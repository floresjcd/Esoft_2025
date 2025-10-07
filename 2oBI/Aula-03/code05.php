<?php

    function incrementa($x) {
        $x++;
        return $x;
    }
    
    $n = 5;
    echo incrementa($n). "\n"; // 6
    echo $n; // 5 (não alterado)
?>
