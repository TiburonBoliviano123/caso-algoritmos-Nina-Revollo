# Medición y comparación de estructuras de datos

## 1. Objetivo

Comparar el rendimiento de dos métodos para buscar un cliente por su código:

- Búsqueda lineal: recorre los registros uno por uno hasta encontrar al cliente.
- Tabla hash: utiliza un arreglo asociativo de PHP para acceder directamente al cliente mediante su código.

El objetivo es observar cómo cambia el tiempo de ejecución cuando aumenta la cantidad de clientes.

## 2. Metodología

Para realizar las pruebas se utilizó PHP 8.0.30.

Se generaron clientes ficticios con diferentes cantidades de registros:

- 1.000 clientes.
- 2.000 clientes.
- 4.000 clientes.
- 8.000 clientes.

En cada prueba se realizaron 10.000 búsquedas de clientes existentes.

Antes de medir los tiempos se ejecutaron ambos métodos una vez como calentamiento. Posteriormente, se realizaron tres mediciones y se calculó el promedio.

Para medir el tiempo se utilizó la función "microtime(true)" de PHP. Los resultados se expresan en milisegundos (ms).

## 3. Resultados obtenidos

| Cantidad de clientes | Búsqueda lineal (ms) | Tabla hash (ms) |
|---:|---:|---:|
| 1.000 | 101.1144 | 0.4962 |
| 2.000 | 215.1121 | 0.7400 |
| 4.000 | 469.1713 | 0.7581 |
| 8.000 | 833.7204 | 0.8240 |

## 4. Análisis de resultados

Los resultados muestran que la búsqueda lineal aumenta considerablemente su tiempo conforme crece la cantidad de clientes. Al pasar de 1.000 a 8.000 registros, el tiempo pasa de aproximadamente 101 ms a 834 ms.

En cambio, la tabla hash mantiene tiempos muy bajos. Aunque presenta pequeñas variaciones, su tiempo de búsqueda no aumenta proporcionalmente a la cantidad de registros.

Esto coincide con las complejidades teóricas: la búsqueda lineal tiene una complejidad O(n), mientras que la búsqueda mediante una tabla hash tiene una complejidad promedio O(1).

## 5. Conclusión

La tabla hash resultó ser mucho más rápida para buscar clientes por código en las pruebas realizadas. La búsqueda lineal aumentó su tiempo conforme crecieron los registros, mientras que la tabla hash mantuvo un rendimiento estable. Por esta razón, una tabla hash sería más conveniente para las búsquedas frecuentes de clientes del negocio. Los tiempos pueden variar dependiendo del equipo y de las condiciones de ejecución.