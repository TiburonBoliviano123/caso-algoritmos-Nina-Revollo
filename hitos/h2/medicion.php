
<?php

//Cantidad de clientes que vamos a probar
$tamanos = [1000, 2000, 4000, 8000];

//Cantidad de busquedas que se realizaran en cada prueba
$repeticiones = 10000;

//Funcion para buscar un cliente recorriendo la lista
function busquedaLineal($clientes, $codigo)
{
    foreach ($clientes as $cliente) {
        if ($cliente['codigo'] === $codigo) {
            return $cliente;
        }
    }

    return null;
}

//Funcion para buscar un cliente usando una tabla hash
function busquedaHash($clientesHash, $codigo)
{
    return $clientesHash[$codigo] ?? null;
}

echo "COMPARACION DE BUSQUEDA DE CLIENTES\n";
echo "----------------------------------\n\n";

echo str_pad("Clientes", 12);
echo str_pad("Lineal (ms)", 18);
echo str_pad("Hash (ms)", 18);
echo "\n";

foreach ($tamanos as $cantidad) {

    $clientes = [];
    $clientesHash = [];

    // Generamos clientes de prueba
    for ($i = 1; $i <= $cantidad; $i++) {

        $cliente = [
            'codigo' => $i,
            'nombre' => 'Cliente ' . $i
        ];

        $clientes[] = $cliente;
        $clientesHash[$i] = $cliente;
    }

    // Buscamos codigos que existen en la estructura
    $codigos = [];

    for ($i = 0; $i < $repeticiones; $i++) {
        $codigos[] = rand(1, $cantidad);
    }

    // Calentamiento: ejecutamos ambos metodos una vez
    foreach ($codigos as $codigo) {
        busquedaLineal($clientes, $codigo);
        busquedaHash($clientesHash, $codigo);
    }

    // Medicion de busqueda lineal
    $inicio = microtime(true);

    foreach ($codigos as $codigo) {
        busquedaLineal($clientes, $codigo);
    }

    $fin = microtime(true);
    $tiempoLineal = ($fin - $inicio) * 1000;

    // Medicion de busqueda hash
    $inicio = microtime(true);

    foreach ($codigos as $codigo) {
        busquedaHash($clientesHash, $codigo);
    }

    $fin = microtime(true);
    $tiempoHash = ($fin - $inicio) * 1000;

    // Repetimos tres veces y calculamos el promedio
    $totalLineal = $tiempoLineal;
    $totalHash = $tiempoHash;

    for ($r = 1; $r < 3; $r++) {

        $inicio = microtime(true);

        foreach ($codigos as $codigo) {
            busquedaLineal($clientes, $codigo);
        }

        $fin = microtime(true);
        $totalLineal += ($fin - $inicio) * 1000;

        $inicio = microtime(true);

        foreach ($codigos as $codigo) {
            busquedaHash($clientesHash, $codigo);
        }

        $fin = microtime(true);
        $totalHash += ($fin - $inicio) * 1000;
    }

    $promedioLineal = $totalLineal / 3;
    $promedioHash = $totalHash / 3;

    echo str_pad($cantidad, 12);
    echo str_pad(number_format($promedioLineal, 4), 18);
    echo str_pad(number_format($promedioHash, 4), 18);
    echo "\n";
}

echo "\nPrueba finalizada.\n";

?>
