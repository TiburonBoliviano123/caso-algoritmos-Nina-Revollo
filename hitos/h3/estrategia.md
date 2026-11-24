## H3 – Estrategia de optimización para el almacén

## 1. Descripción del problema
En la zapatería mayorista se manejan diferentes modelos y cantidades de calzados. Para organizar mejor el almacenamiento, se plantea el problema de seleccionar qué lotes de zapatos deben guardarse cuando existe una capacidad limitada.

Para este caso se considera un almacén con una capacidad máxima de 30 cajas. Cada lote tiene una cantidad de cajas que ocupa espacio y un valor económico asociado.

El objetivo es seleccionar los lotes que permitan obtener el mayor valor económico posible sin superar la capacidad disponible.

Este problema se puede representar mediante el problema de la mochila (Knapsack) de tipo 0/1, porque cada lote se selecciona completo o se descarta.


## 2. Estrategias analizadas

## 2.1. Estrategia voraz (Greedy)

Una estrategia voraz consiste en tomar decisiones locales buscando la mejor opción en cada paso.

Para este problema se podría calcular el valor económico por cada caja de un lote y seleccionar primero los lotes que tengan una mayor relación entre valor y espacio ocupado.

Sin embargo, esta estrategia no garantiza encontrar la solución óptima para el problema de la mochila 0/1.

    Contraejemplo:

Consideremos un almacén con capacidad de 30 cajas y los siguientes lotes:

| Lote | Cajas ocupadas | Valor económico (Bs) | Valor por caja |
|---|---:|---:|---:|
| A | 10 | 59 | 5,90 |
| B | 20 | 100 | 5,00 |
| C | 15 | 89 | 5,93 |

Si se utiliza la estrategia voraz por valor por caja, se seleccionaría primero el lote C y después el lote A.

El resultado sería:

- Lote C: 15 cajas y 89 Bs.
- Lote A: 10 cajas y 59 Bs.
- Total: 25 cajas y 148 Bs.

Sin embargo, seleccionando los lotes A y B se obtiene:

- Lote A: 10 cajas y 59 Bs.
- Lote B: 20 cajas y 100 Bs.
- Total: 30 cajas y 159 Bs.

Por lo tanto, la estrategia voraz no obtiene el mejor resultado en este ejemplo.


## 2.2. Programación dinámica
La programación dinámica es adecuada para este problema porque permite dividirlo en subproblemas más pequeños y aprovechar los resultados que ya fueron calculados.

Se utiliza una tabla para almacenar la mejor solución posible considerando diferentes cantidades de lotes y capacidades disponibles.

Definimos:

- `i`: cantidad de lotes considerados.
- `c`: capacidad disponible del almacén.
- `peso[i]`: cantidad de cajas que ocupa el lote.
- `valor[i]`: valor económico del lote.
- `DP[i][c]`: máximo valor que se puede obtener utilizando los primeros i lotes con capacidad c.

La relación de recurrencia es:

Si el lote no cabe en la capacidad disponible:

`DP[i][c] = DP[i-1][c]`

Si el lote cabe, se elige la mejor alternativa entre incluirlo o dejarlo fuera:

`DP[i][c] = max(DP[i-1][c], valor[i] + DP[i-1][c-peso[i]])`

De esta manera se obtiene la combinación de lotes que proporciona el mayor valor económico sin superar la capacidad del almacén.


## 3. Propiedades de la programación dinámica
La programación dinámica es apropiada porque el problema presenta dos propiedades importantes:

    Subestructura óptima:

La solución óptima para una determinada cantidad de lotes y capacidad puede construirse utilizando soluciones óptimas de subproblemas más pequeños.

    Subproblemas repetidos:

Al calcular las diferentes combinaciones de lotes y capacidades, algunos subproblemas se repiten. La tabla permite guardar los resultados y reutilizarlos sin tener que calcularlos nuevamente.


## 4. Complejidad
Para el problema de la mochila 0/1 utilizando programación dinámica:

- Tiempo: O(n × C).
- Espacio: O(n × C).

Donde:

- `n` representa la cantidad de lotes.
- `C` representa la capacidad máxima del almacén.

En cambio, la fuerza bruta evalúa las 2ⁿ combinaciones posibles y recorre los n lotes para calcular el peso y el valor de cada combinación. Por ello, la implementación utilizada tiene una complejidad temporal de O(n × 2ⁿ).

## 5. Estrategia seleccionada

Se selecciona la programación dinámica porque permite encontrar la combinación óptima de lotes que maximiza el valor económico sin superar la capacidad del almacén.

La estrategia voraz puede ser más sencilla, pero no garantiza obtener la mejor combinación en todos los casos, como se demostró en el contraejemplo.

Por esta razón, la programación dinámica resulta más adecuada para resolver el problema planteado.

## 6. Conclusión

El problema de organizar los lotes de zapatos dentro de un almacén con capacidad limitada puede resolverse mediante programación dinámica.

Esta estrategia permite evaluar diferentes combinaciones, aprovechar los resultados de subproblemas anteriores y encontrar una solución óptima.

Su aplicación podría ayudar a tomar mejores decisiones al organizar el espacio disponible y seleccionar los lotes de mayor valor económico.