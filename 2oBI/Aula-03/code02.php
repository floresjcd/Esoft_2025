<?php
    function calculaMedia($n1, $n2, $n3){
        return ($n1 + $n2 + $n3) / 3;
    }

    $media = calculaMedia(7.5, 8.0, 6.5);
    echo "A média é: " . $media;
?>