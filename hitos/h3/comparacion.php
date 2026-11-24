
<?php

// Capacidad maxima del almacen
$capacidad = 30;

// Cuatro tamaños de datos que se duplican
$tamanos = [2, 4, 8, 16];

// Repeticiones dentro de cada medicion
$vueltas = 20;

// Fuerza bruta: prueba todas las combinaciones posibles
function fuerzaBruta($pesos, $valores, $capacidad)
{
    $n = count($pesos);
    $mejorValor = 0;

    $combinaciones = 1 << $n;

    for ($mascara = 0; $mascara < $combinaciones; $mascara++) {

        $pesoTotal = 0;
        $valorTotal = 0;

        for ($i = 0; $i < $n; $i++) {

            if (($mascara & (1 << $i)) != 0) {
                $pesoTotal += $pesos[$i];
                $valorTotal += $valores[$i];
            }
        }

        if ($pesoTotal <= $capacidad && $valorTotal > $mejorValor) {
            $mejorValor = $valorTotal;
        }
    }

    return $mejorValor;
}

// Programacion dinamica para el problema de la mochila 0/1
function programacionDinamica($pesos, $valores, $capacidad)
{
    $n = count($pesos);

    $dp = array_fill(0, $n + 1, array_fill(0, $capacidad + 1, 0));

    for ($i = 1; $i <= $n; $i++) {

        for ($c = 0; $c <= $capacidad; $c++) {

            $dp[$i][$c] = $dp[$i - 1][$c];

            if ($pesos[$i - 1] <= $c) {

                $valor = $valores[$i - 1] +
                    $dp[$i - 1][$c - $pesos[$i - 1]];

                if ($valor > $dp[$i][$c]) {
                    $dp[$i][$c] = $valor;
                }
            }
        }
    }
    return $dp[$n][$capacidad];
}

echo "COMPARACION: FUERZA BRUTA VS PROGRAMACION DINAMICA\n";
echo "Capacidad del almacen: " . $capacidad . " cajas\n\n";

echo str_pad("Lotes", 10);
echo str_pad("Fuerza bruta (ms)", 22);
echo str_pad("Dinamica (ms)", 20);
echo str_pad("Ratio FB", 15);
echo str_pad("Ratio PD", 15);
echo "\n";

// Guardamos los tiempos anteriores para calcular los ratios
$anteriorFB = null;
$anteriorPD = null;

foreach ($tamanos as $cantidad) {

    $pesos = [];
    $valores = [];

    // Generamos lotes ficticios de zapatos
    for ($i = 0; $i < $cantidad; $i++) {

        $pesos[] = ($i * 7 % 11) + 2;
        $valores[] = ($i * 37 % 81) + 20;
    }

    // Comprobamos que ambos algoritmos obtengan el mismo resultado
    $resultadoFB = fuerzaBruta($pesos, $valores, $capacidad);
    $resultadoPD = programacionDinamica($pesos, $valores, $capacidad);

    if ($resultadoFB !== $resultadoPD) {
        echo "Error: los resultados no coinciden.\n";
        exit;
    }

    // Calentamiento
    fuerzaBruta($pesos, $valores, $capacidad);
    programacionDinamica($pesos, $valores, $capacidad);

    $totalFB = 0;
    $totalPD = 0;

    // Tres mediciones, con varias ejecuciones en cada una
    for ($r = 0; $r < 3; $r++) {

        $inicio = microtime(true);

        for ($v = 0; $v < $vueltas; $v++) {
            fuerzaBruta($pesos, $valores, $capacidad);
        }

        $fin = microtime(true);
        $totalFB += ($fin - $inicio) * 1000;

        $inicio = microtime(true);

        for ($v = 0; $v < $vueltas; $v++) {
            programacionDinamica($pesos, $valores, $capacidad);
        }

        $fin = microtime(true);
        $totalPD += ($fin - $inicio) * 1000;
    }

    // Promedio de las tres mediciones
    $promedioFB = $totalFB / 3;
    $promedioPD = $totalPD / 3;

    // Calculamos cuanto crecio el tiempo respecto al tamaño anterior
    $ratioFB = $anteriorFB !== null && $anteriorFB > 0
        ? number_format($promedioFB / $anteriorFB, 2) . "x"
        : "-";

    $ratioPD = $anteriorPD !== null && $anteriorPD > 0
        ? number_format($promedioPD / $anteriorPD, 2) . "x"
        : "-";

    echo str_pad($cantidad, 10);
    echo str_pad(number_format($promedioFB, 4), 22);
    echo str_pad(number_format($promedioPD, 4), 20);
    echo str_pad($ratioFB, 15);
    echo str_pad($ratioPD, 15);
    echo "\n";

    echo "Valor maximo encontrado: " . $resultadoFB . " Bs\n\n";

    $anteriorFB = $promedioFB;
    $anteriorPD = $promedioPD;
}

echo "Todas las pruebas finalizaron correctamente.\n";

?>
