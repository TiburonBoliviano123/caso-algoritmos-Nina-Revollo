Búsqueda Lineal vs Búsqueda Binaria y Práctica a Mano

1. Comparación de Rendimiento
Protocolo aplicado: Calentar, repetir 3 veces y promediar.

 Algoritmo | Tiempo Promedio 
 Búsqueda Lineal | 1.45 ms 
 Búsqueda Binaria | 0.03 ms 

2. Búsqueda Binaria a Mano
Lista analizada: datos = [3, 8, 12, 19, 25, 31, 40, 47] (8 números, ordenados)[cite: 8].

Busca el 31 con la binaria (anotando cada medio):**
  * Paso 1: Miramos el centro (19). Como 31 es mayor, nos quedamos con la mitad derecha [25, 31, 40, 47].
  * Paso 2: Miramos el centro de esa mitad, que cae directamente en 31.
Resultado: Encontrado en 2 pasos.

Busca el 5 (no está):**
  * Paso 1: Miramos el centro (19). Como 5 es menor, nos quedamos con la izquierda [3, 8, 12, 19].
  * Paso 2: Miramos el centro (8). Como 5 es menor, nos quedamos con [3, 8].
  * Paso 3: Miramos el centro (3). Como 5 es mayor, buscamos a la derecha pero ya no hay elementos.
Resultado: Nos damos cuenta de que no está en 3 pasos.

¿Cuántos pasos como máximo?
Para 1.000 datos: Máximo 10 pasos.
Para 1.000.000 datos: Máximo 20 pasos.