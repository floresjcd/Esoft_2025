<?php

    function incrementa(&$x) {
        $x++;
    }
    $n = 5;
    incrementa($n);
    echo $n; // 6 (alterado!)
?>
