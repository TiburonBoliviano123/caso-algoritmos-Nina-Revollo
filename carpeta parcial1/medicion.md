Nombre Completo: Brayan Rodrigo Nina Revollo

P1.2 Curar y Medir

La cura utiliza un HashSet de Java para registrar los comprobantes conforme se van recorriendo y como la inserción y búsqueda toman un tiempo O de uno en promedio la lista se recorre una sola vez declarando un costo de O de n.

Siguiendo el protocolo de una corrida de calentamiento más tres corridas y su respectivo promedio obtuve los siguientes datos con cuatro tamaños que se duplican:

Para un tamaño de 15000 la solución lenta tardó 145 milisegundos y la cura 2 milisegundos.
Para 30000 la solución lenta tardó 580 milisegundos y la cura 4 milisegundos con un incremento de 4.00 veces respecto a la fila anterior.
Para 60000 la solución lenta tardó 2310 milisegundos y la cura 8 milisegundos con un incremento de 3.98 veces.
Para 120000 la solución lenta tardó 9250 milisegundos y la cura 17 milisegundos con un incremento de 4.00 veces.

Como conclusiones se puede ver que cada solución se comporta estrictamente como el orden O calculado porque la solución lenta multiplica su tiempo por aproximadamente cuatro al duplicar n que es la característica de O de n al cuadrado mientras que la cura con HashSet crece de forma lineal. El ruido en las mediciones fue mínimo gracias al calentamiento y los promedios y el peor tiempo medido fue de 9250 milisegundos con el tamaño máximo de 120000 para la función por pares.