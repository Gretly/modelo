<?php
// palabra de entrada mal escrita
$input = 'carrrot';

// array de palabras contra las cuales verificar
$words  = array('apple','pineapple','banana','orange',
                'radish','carrot','pea','bean','potato');

// no se ha encontrado la distancia más corta, aun
$shortest = -1;

// bucle a través de las palabras para encontrar la más cercana
foreach ($words as $word) {

    // calcula la distancia entre la palabra de entrada
    // y la palabra actual
    $lev = levenshtein($input, $word);

    // verifica por una coincidencia exacta
    if ($lev == 0) {

        // la palabra más cercana es esta (coincidencia exacta)
        $closest = $word;
        $shortest = 0;

        // salir del bucle, se ha encontrado una coincidencia exacta
        break;
    }

    // si esta distancia es menor que la siguiente distancia
    // más corta o si una siguiente palabra más corta aun no se ha encontrado
    if ($lev <= $shortest || $shortest < 0) {
        // establece la coincidencia más cercana y la distancia más corta
        $closest  = $word;
        $shortest = $lev;
    }
}

echo "Input word: $input\n";
if ($shortest == 0) {
    echo "Exact match found: $closest\n";
} else {
    echo "Did you mean: $closest?\n";
}

?>