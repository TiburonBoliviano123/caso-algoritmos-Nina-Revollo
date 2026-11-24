Medición y comparación de estructuras de datos

1. Objetivo

Comparar el rendimiento de dos métodos para buscar clientes mediante su número de CI:

- Búsqueda lineal: recorre los registros uno por uno hasta encontrar al cliente.
- Tabla hash: utiliza un arreglo asociativo de PHP para acceder directamente al cliente mediante su CI.

El objetivo es observar cómo cambia el tiempo de ejecución cuando aumenta la cantidad de clientes.

2. Metodología

Para realizar las pruebas se utilizó PHP 8.0.30.

Se generaron clientes ficticios con las siguientes cantidades:

- 1.000 clientes.
- 2.000 clientes.
- 4.000 clientes.
- 8.000 clientes.

En cada prueba se realizaron 10.000 búsquedas de clientes existentes utilizando su CI.

Antes de medir los tiempos se ejecutaron ambos métodos una vez como calentamiento. Posteriormente, se realizaron tres mediciones y se calculó el promedio.

Para medir el tiempo se utilizó la función `microtime(true)` de PHP. Los resultados se expresan en milisegundos (ms).

3. Resultados obtenidos

| Cantidad de clientes | Búsqueda lineal (ms) | Tabla hash (ms) |
|---:|---:|---:|
| 1.000 | 126.0030 | 0.8201 |
| 2.000 | 259.2301 | 0.9824 |
| 4.000 | 561.6124 | 0.9567 |
| 8.000 | 1,079.2730 | 1.2001 |

4. Análisis de resultados

Los resultados muestran que la búsqueda lineal aumenta considerablemente su tiempo conforme crece la cantidad de clientes. Al pasar de 1.000 a 8.000 registros, el tiempo aumenta de aproximadamente 126 ms a 1.079 ms.

En cambio, la tabla hash mantiene tiempos cercanos a 1 ms, incluso cuando aumenta la cantidad de registros.

Esto coincide con las complejidades teóricas: la búsqueda lineal tiene una complejidad O(n), mientras que la búsqueda mediante una tabla hash tiene una complejidad promedio O(1).

Las pequeñas variaciones en los tiempos pueden deberse a las condiciones de ejecución y al funcionamiento del equipo durante las pruebas.

5. Conclusión

La tabla hash resultó ser mucho más rápida para buscar clientes mediante su CI en las pruebas realizadas. La búsqueda lineal aumentó su tiempo conforme crecieron los registros, mientras que la tabla hash mantuvo un rendimiento relativamente estable. Por esta razón, una tabla hash sería más conveniente para las búsquedas frecuentes de clientes del negocio.