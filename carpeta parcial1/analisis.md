Nombre Completo: Brayan Rodrigo Nina Revollo

## P1.1 - Análisis

### a) Cuatro fragmentos
F1: 
   Costo: $O(n)$
   Justificación: El ciclo `for` se ejecuta $n$ veces y dentro realiza operaciones de tiempo constante $O(1)$.
F2: 
   Costo: $O(n^2)$
   Justificación: Dos ciclos `for` anidados que se ejecutan, cada uno, hasta $n$ veces ($n \times n$).
F3:*
   Costo: $O(1)$
   Justificación: Es una única instrucción de asignación que no depende del tamaño de entrada.
F4:
Costo: $O(n \log n)$
Justificación: El primer bucle `while` multiplica $k$ por $2$ logarítmicamente ($\log_2 n$ pasos) dentro de un `for` de $n$ iteraciones ($O(n \log n)$), y el segundo bucle divide $k$ entre $3$ ($\log_3 n$), dominando el término logarítmico.

### b) Dos recurrencias (Teorema Maestro)
* **(i) $T(n) = 4T(n/3) + n$**
  * $a = 4$, $b = 3$, $d = 1$ ($f(n) = n^1$)
  * Comparación: $a = 4$ frente a $b^d = 3^1 = 3 \implies 4 > 3$, por lo que $a > b^d$.
  * Forma / Resultado: $T(n) = \Theta(n^{\log_3 4})$ (Caso 1 del Teorema Maestro).

* **(ii) $T(n) = 2T(n/2) + n^2$**
  * $a = 2$, $b = 2$, $d = 2$ ($f(n) = n^2$)
  * Comparación: $a = 2$ frente a $b^d = 2^2 = 4 \implies 2 < 4$, por lo que $a < b^d$.
  * Forma / Resultado: $T(n) = \Theta(n^2)$ (Caso 3 del Teorema Maestro).