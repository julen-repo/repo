<?php
function sonAnagramas($texto1, $texto2)
{
    $texto1 = str_replace(' ', '', strtolower($texto1));
    $texto2 = str_replace(' ', '', strtolower($texto2));

    // Si las longitudes no son iguales, no pueden ser anagramas
    if (strlen($texto1) != strlen($texto2)) {
        return false;
    }

    $array1 = str_split($texto1);
    $array2 = str_split($texto2);

    sort($array1);
    sort($array2);

    return $array1 == $array2;
}

$texto1 = "esponja";
$texto2 = "japones";

if (sonAnagramas($texto1, $texto2)) {
    echo "$texto1 y $texto2 son anagramas.";
} else {
    echo "$texto1 y $texto2 no son anagramas.";
}
