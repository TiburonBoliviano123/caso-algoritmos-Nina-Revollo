  H3 – Comparación de algoritmos de optimización


1. Objetivo
Comparar dos algoritmos para resolver el problema de la mochila 0/1 aplicado al almacenamiento de lotes de zapatos en una zapatería mayorista.

Se busca encontrar la combinación de lotes que permita obtener el mayor valor económico posible sin superar la capacidad máxima de 30 cajas.

Para resolver el problema se utilizaron dos métodos:

- Fuerza bruta: evalúa todas las combinaciones posibles de lotes.
- Programación dinámica: utiliza una tabla para almacenar y reutilizar los resultados de los subproblemas.


2. Metodología
Las pruebas se realizaron utilizando PHP 8.0.30.

Se generaron cuatro tamaños de datos que se duplican progresivamente:

- 2 lotes.
- 4 lotes.
- 8 lotes.
- 16 lotes.

La capacidad del almacén se mantuvo en 30 cajas para todas las pruebas.

Cada lote tiene un peso, que representa la cantidad de cajas que ocupa, y un valor económico expresado en bolivianos.

Para realizar las mediciones se siguió el siguiente protocolo:

1. Se generaron los datos de prueba.
2. Se ejecutaron ambos algoritmos una vez como calentamiento.
3. Se realizaron tres mediciones por algoritmo.
4. Cada medición ejecutó el algoritmo 20 veces para obtener tiempos más representativos.
5. Se calculó el promedio de las tres mediciones.
6. Se verificó que ambos algoritmos obtuvieran el mismo valor óptimo.

Los tiempos se midieron utilizando `microtime(true)` y se expresan en milisegundos.


3. Resultados obtenidos
| Cantidad de lotes | Fuerza bruta (ms) | Programación dinámica (ms) | Ratio fuerza bruta | Ratio dinámica |
|---:|---:|---:|---:|---:|
| 2 | 0.0124 | 0.1627 | - | - |
| 4 | 0.0800 | 0.4036 | 6.46x | 2.48x |
| 8 | 1.6126 | 0.5159 | 20.15x | 1.28x |
| 16 | 673.8266 | 0.9434 | 417.85x | 1.83x |

Los ratios representan cuántas veces aumentó el tiempo de ejecución respecto a la prueba anterior.


4. Valores óptimos encontrados
Los dos algoritmos obtuvieron los mismos resultados en todas las pruebas.

| Cantidad de lotes | Valor máximo obtenido |
|---:|---:|
| 2 | 77 Bs |
| 4 | 221 Bs |
| 8 | 324 Bs |
| 16 | 440 Bs |

Esto permite comprobar que ambos métodos resuelven correctamente el problema planteado.


5. Análisis de resultados
Los resultados muestran una diferencia importante entre los dos algoritmos cuando aumenta la cantidad de lotes.

La fuerza bruta presenta un crecimiento muy elevado porque debe evaluar todas las combinaciones posibles. Al pasar de 8 a 16 lotes, su tiempo de ejecución aumenta considerablemente.

En cambio, la programación dinámica mantiene tiempos bajos porque almacena los resultados de los subproblemas y evita realizar cálculos repetidos.

En la primera prueba, con solamente dos lotes, la programación dinámica tarda más que la fuerza bruta. Esto se debe a que la creación y utilización de la tabla tiene un costo adicional que se nota en conjuntos pequeños.

También se debe considerar que los tiempos muy pequeños pueden presentar ruido de medición debido a las condiciones de ejecución del equipo.


6. Conclusión
La programación dinámica resultó más eficiente que la fuerza bruta cuando aumentó la cantidad de lotes. Ambos algoritmos encontraron los mismos valores óptimos, pero la fuerza bruta presentó un crecimiento mucho mayor en su tiempo de ejecución. Por esta razón, la programación dinámica es la alternativa más conveniente para resolver el problema de almacenamiento planteado.