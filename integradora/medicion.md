## Brayan Rodrigo Nina Revollo

## Medición con EjecutarCarga
Lenguaje y entorno: PHP, ejecutado desde la terminal de Windows mediante el comando php main.php.

## Protocolo
Realicé una corrida de calentamiento sin contarla y luego tres corridas medidas. Calculé el promedio y comprobé que ambos compradores obtuvieran la misma utilidad.

## Tabla de resultados

| n | Ingenuo promedio (s) | Factor ingenuo | Mejorado promedio (s) | Factor mejorado | Misma utilidad |
|---|---:|---:|---:|---:|---|
| 18 | 0.18206 | - | 0.00012 | - | Sí |
| 20 | 0.89239 | 4.90x | 0.00017 | 1.42x | Sí |
| 22 | 3.50447 | 3.93x | 0.00019 | 1.12x | Sí |
| 24 | 14.91314 | 4.26x | 0.00020 | 1.05x | Sí |

## Conclusión y ruido
Se observa que cuando n aumenta de 2 en 2, el comprador ingenuo tarda aproximadamente cuatro veces más. Esto coincide con el crecimiento exponencial de las combinaciones posibles.
El comprador mejorado presenta tiempos mucho menores. Los factores de crecimiento pueden variar por el sistema operativo, el procesador y otros procesos que se ejecutan en segundo plano. Por eso se utilizaron tres mediciones y se calculó el promedio.

## Carga con 1.000 útiles y presupuesto de 10.000 Bs
El comprador mejorado obtuvo una utilidad de 33.499 y tardó aproximadamente 0.4509 segundos.

## ¿Qué pasaría si el presupuesto fuera de 1.000.000.000 Bs?
La programación dinámica depende del valor numérico del presupuesto. Con un presupuesto de 1.000.000.000 Bs, el arreglo DP necesitaría una cantidad enorme de posiciones y el algoritmo podría quedarse sin memoria o tardar demasiado.

Aunque la cantidad de útiles no cambie, el presupuesto tan elevado hace que esta estrategia deje de ser práctica. 