## Brayan Rodrigo Nina Revollo

a) Costo O de CompradorIngenuo.Elegir
El costo en O grande es O(n * 2^n), donde n es la cantidad de útiles.
El for de afuera prueba todas las máscaras desde 0 hasta 2^n - 1, o sea que revisa 2^n combinaciones posibles. Por cada combinación, el for de adentro recorre los n útiles para sumar costo y utilidad con bits.
De memoria extra usa O(n) como máximo en _elegidos para guardar los códigos de los útiles elegidos.   
b) Recurrencia T(n) = 2T(n-1) + 1 y el Teorema Maestro
El teorema maestro normal no aplica acá porque sirve para algoritmos que dividen el problema en partes de tamaño n/b, o sea con división. En esta fórmula el tamaño baja de a uno, o sea n - 1, no se divide entre un número.
Para ver cuánto cuesta, si vas abriendo la fórmula paso a paso desde T(0):
T(n) = 2T(n-1) + 1
T(n) = 2(2T(n-2) + 1) + 1 = 4T(n-2) + 2 + 1
y así sigue hasta llegar a 2^n * T(0) + (2^n - 1).
Eso da un crecimiento exponencial, O(2^n) (o O(n * 2^n) si en cada rama se copia o arma la lista de códigos).
c) Algoritmo voraz, contraejemplo y estrategia elegida

Un algoritmo voraz ordenado por utilidad dividida entre costo no garantiza la solución óptima, porque toma la mejor opción en cada momento, pero puede dejar afuera una combinación que genere mayor utilidad total.

En el primer caso de prueba, el presupuesto es 100:
- U1 tiene costo 20 y utilidad 120, su relación es 6.
- U2 tiene costo 40 y utilidad 200, su relación es 5.
- U3 tiene costo 60 y utilidad 240, su relación es 4.

El algoritmo voraz elige primero U1 y luego U2. Gasta 60 y obtiene una utilidad de 320. Ya no puede comprar U3 porque cuesta 60 y solo quedan 40.

Pero la respuesta óptima es U2 y U3: cuestan 40 + 60 = 100 y suman una utilidad de 440.

La estrategia elegida es programación dinámica (mochila 0/1). Funciona porque existen subproblemas que se repiten: diferentes combinaciones pueden llegar al mismo índice de útiles y presupuesto restante. Al guardar los resultados evitamos resolver los mismos subproblemas varias veces.

El tiempo es O(n * P), donde n es la cantidad de útiles y P es el presupuesto. El arreglo DP utiliza O(P) de espacio y el registro de decisiones puede utilizar hasta O(n * P) en el peor caso.

d) Estructura para EstaEnLaCompra

Para EstaEnLaCompra conviene utilizar un conjunto hash o un arreglo asociativo de PHP con los códigos de los útiles seleccionados.

En CompradorIngenuo, buscar un código mediante Contains en una lista cuesta O(k) en el peor caso, donde k es la cantidad de útiles seleccionados.

En la implementación mejorada, utilizando isset() sobre un arreglo asociativo, la búsqueda cuesta O(1) en promedio. Esto resulta mucho más rápido cuando se realizan muchas consultas.