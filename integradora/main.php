
<?php

// Representa un útil de la escuela
class Util
{
    public string $codigo;
    public int $costoBs;
    public int $utilidad;

    public function __construct(string $codigo, int $costoBs, int $utilidad)
    {
        $this->codigo = $codigo;
        $this->costoBs = $costoBs;
        $this->utilidad = $utilidad;
    }
}

// Interfaz común para los compradores
interface IComprador
{
    public function elegir(array $utiles, int $presupuestoBs): array;

    public function estaEnLaCompra(string $codigo): bool;
}







// Solución ingenua: prueba todas las combinaciones posibles
class CompradorIngenuo implements IComprador
{
    private array $elegidos = [];

    public function elegir(array $utiles, int $presupuestoBs): array
    {
        $n = count($utiles);

        $mejorUtilidad = 0;
        $mejorMascara = 0;

        // Recorremos todas las combinaciones posibles
        $totalCombinaciones = 1 << $n;

        for ($mascara = 0; $mascara < $totalCombinaciones; $mascara++) {

            $costo = 0;
            $utilidad = 0;

            // Comprobamos qué útiles contiene esta combinación
            for ($i = 0; $i < $n; $i++) {

                if (($mascara & (1 << $i)) != 0) {
                    $costo += $utiles[$i]->costoBs;
                    $utilidad += $utiles[$i]->utilidad;
                }
            }

            // Guardamos la mejor combinación que cabe en el presupuesto
            if ($costo <= $presupuestoBs && $utilidad > $mejorUtilidad) {
                $mejorUtilidad = $utilidad;
                $mejorMascara = $mascara;
            }
        }

        $this->elegidos = [];

        // Recuperamos los códigos de los útiles seleccionados
        for ($i = 0; $i < $n; $i++) {

            if (($mejorMascara & (1 << $i)) != 0) {
                $codigo = $utiles[$i]->codigo;
                $this->elegidos[$codigo] = true;
            }
        }

        return [
            'utilidad' => $mejorUtilidad,
            'codigos' => array_keys($this->elegidos)
        ];
    }

    public function estaEnLaCompra(string $codigo): bool
    {
        return isset($this->elegidos[$codigo]);
    }
}







// Solución mejorada mediante programación dinámica

class CompradorMejorado implements IComprador
{
    private array $elegidos = [];
    public function elegir(array $utiles, int $presupuestoBs): array
    {
        $n = count($utiles);

        $dp = array_fill(0, $presupuestoBs + 1, 0);
        $decisiones = [];

        for ($i = 0; $i < $n; $i++) {
            $costo = $utiles[$i]->costoBs;
            $utilidad = $utiles[$i]->utilidad;

            $decisiones[$i] = [];

            for ($b = $presupuestoBs; $b >= $costo; $b--) {
                $opcion = $dp[$b - $costo] + $utilidad;

                if ($opcion > $dp[$b]) {
                    $dp[$b] = $opcion;
                    $decisiones[$i][$b] = true;
                }
            }
        }
        $this->elegidos = [];
        $b = $presupuestoBs;

        for ($i = $n - 1; $i >= 0; $i--) {
            if (isset($decisiones[$i][$b])) {
                $util = $utiles[$i];
                $this->elegidos[$util->codigo] = true;
                $b -= $util->costoBs;
            }
        }
        return [
            'utilidad' => $dp[$presupuestoBs],
            'codigos' => array_keys($this->elegidos)
        ];
    }

    public function estaEnLaCompra(string $codigo): bool
    {
        return isset($this->elegidos[$codigo]);
    }
}








$utiles = [
    new Util("U1", 20, 120),
    new Util("U2", 40, 200),
    new Util("U3", 60, 240)
];

$presupuesto = 100;

$comprador = new CompradorMejorado();

$resultado = $comprador->elegir($utiles, $presupuesto);

echo "Utilidad máxima: " . $resultado['utilidad'] . PHP_EOL;
echo "Útiles elegidos: " . implode(", ", $resultado['codigos']) . PHP_EOL;

echo "¿U2 está en la compra? ";
echo $comprador->estaEnLaCompra("U2") ? "Sí" : "No";
echo PHP_EOL;

echo "¿U1 está en la compra? ";
echo $comprador->estaEnLaCompra("U1") ? "Sí" : "No";
echo PHP_EOL;












function probarComprador($nombre, $comprador)
{
    $casos = [
        [
            "utiles" => [
                new Util("U1", 20, 120),
                new Util("U2", 40, 200),
                new Util("U3", 60, 240)
            ],
            "presupuesto" => 100,
            "utilidad" => 440,
            "codigos" => ["U2", "U3"]
        ],
        [
            "utiles" => [
                new Util("U1", 4, 6),
                new Util("U2", 6, 8),
                new Util("U3", 8, 10),
                new Util("U4", 10, 12)
            ],
            "presupuesto" => 16,
            "utilidad" => 20,
            "codigos" => ["U2", "U4"]
        ],
        [
            "utiles" => [
                new Util("U1", 5, 10),
                new Util("U2", 7, 12)
            ],
            "presupuesto" => 0,
            "utilidad" => 0,
            "codigos" => []
        ],
        [
            "utiles" => [],
            "presupuesto" => 30,
            "utilidad" => 0,
            "codigos" => []
        ],
        [
            "utiles" => [
                new Util("U1", 80, 90),
                new Util("U2", 100, 100)
            ],
            "presupuesto" => 60,
            "utilidad" => 0,
            "codigos" => []
        ],
        [
            "utiles" => [
                new Util("U1", 10, 20),
                new Util("U2", 14, 24),
                new Util("U3", 6, 8)
            ],
            "presupuesto" => 200,
            "utilidad" => 52,
            "codigos" => ["U1", "U2", "U3"]
        ]
    ];

    $correctas = 0;

    foreach ($casos as $indice => $caso) {

        $resultado = $comprador->elegir(
            $caso["utiles"],
            $caso["presupuesto"]
        );

        sort($resultado["codigos"]);
        sort($caso["codigos"]);

        $ok = $resultado["utilidad"] === $caso["utilidad"]
            && $resultado["codigos"] === $caso["codigos"];

        if ($ok) {
            $correctas++;
            echo "Caso " . ($indice + 1) . ": CORRECTO\n";
        } else {
            echo "Caso " . ($indice + 1) . ": ERROR\n";
            echo "Utilidad obtenida: " . $resultado["utilidad"] . "\n";
            echo "Códigos obtenidos: " . implode(", ", $resultado["codigos"]) . "\n";
        }
    }

    echo "$nombre: $correctas de 6 pruebas correctas\n\n";
}

probarComprador("CompradorMejorado", new CompradorMejorado());

probarComprador("CompradorIngenuo", new CompradorIngenuo());




function ejecutarCarga($comprador, $n)
{
    mt_srand($n + 1000);

    $utiles = [];

    for ($i = 0; $i < $n; $i++) {
        $costo = mt_rand(4, 49);
        $utilidad = mt_rand(10, 99);

        $utiles[] = new Util("K" . $i, $costo, $utilidad);
    }

    $costoTotal = 0;

    foreach ($utiles as $util) {
        $costoTotal += $util->costoBs;
    }

    $presupuesto = intdiv($costoTotal, 3);

    return $comprador->elegir($utiles, $presupuesto)['utilidad'];
}







function medirPromedio($tipo, $n)
{
    // Una corrida de calentamiento
    ejecutarCarga(new $tipo(), $n);

    $tiempos = [];
    $utilidad = 0;

    // Tres corridas medidas
    for ($i = 0; $i < 3; $i++) {

        $inicio = microtime(true);

        $utilidad = ejecutarCarga(new $tipo(), $n);

        $tiempos[] = microtime(true) - $inicio;
    }

    return [
        "utilidad" => $utilidad,
        "tiempo" => array_sum($tiempos) / 3
    ];
}





$tamanos = [18, 20, 22, 24];
$anteriorIngenuo = 0;
$anteriorMejorado = 0;

foreach ($tamanos as $n) {

    $ingenuo = medirPromedio("CompradorIngenuo", $n);
    $mejorado = medirPromedio("CompradorMejorado", $n);

    echo "\nÚtiles: $n\n";

    echo "Utilidad ingenuo: " . $ingenuo["utilidad"] . "\n";
    echo "Utilidad mejorado: " . $mejorado["utilidad"] . "\n";

    echo "Promedio ingenuo: "
        . round($ingenuo["tiempo"], 5) . " segundos\n";

    echo "Promedio mejorado: "
        . round($mejorado["tiempo"], 5) . " segundos\n";

    if ($ingenuo["utilidad"] !== $mejorado["utilidad"]) {
        echo "ERROR: las utilidades no coinciden\n";
    }

    if ($anteriorIngenuo > 0) {
        echo "Multiplicador ingenuo: "
            . round($ingenuo["tiempo"] / $anteriorIngenuo, 2) . "x\n";

        echo "Multiplicador mejorado: "
            . round($mejorado["tiempo"] / $anteriorMejorado, 2) . "x\n";
    }
    $anteriorIngenuo = $ingenuo["tiempo"];
    $anteriorMejorado = $mejorado["tiempo"];
}



$inicio = microtime(true);

$resultado = ejecutarCarga(new CompradorMejorado(), 1000);

$tiempo = microtime(true) - $inicio;

echo "\nPrueba de 1000 útiles\n";
echo "Utilidad: $resultado\n";
echo "Tiempo: " . round($tiempo, 5) . " segundos\n";