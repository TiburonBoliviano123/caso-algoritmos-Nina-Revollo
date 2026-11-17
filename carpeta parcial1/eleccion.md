Nombre Completo: Brayan Rodrigo Nina Revollo

## P1.3 - Elegir

P1.3 Elegir

Para este problema tenemos un total de 250000 códigos de producto y unas 8000 consultas diarias tomando en cuenta que la memoria es limitada y no podemos duplicar el listado.

Analizando los costos totales en operaciones para cada opción:

La opción uno consiste en recorrer el listado de principio a fin para cada consulta lo que da un costo de O de n por consulta. Multiplicando las 8000 consultas por los 250000 elementos nos da un total de dos mil millones de operaciones.

La opción dos propone ordenar el listado una sola vez en la mañana usando un algoritmo eficiente de O de n log n y después usar búsqueda binaria para cada consulta. El ordenamiento inicial cuesta más o menos 4.5 millones de operaciones y las consultas suman unas 144000 operaciones dando un costo total aproximado de 4.644.000 operaciones.

La opción tres sería ordenar con un algoritmo cuadrático de O de n al cuadrado más la búsqueda binaria. Solo el ordenamiento inicial requeriría cerca de 62.5 billones de operaciones lo cual lo hace totalmente impracticable por culpa del tremendo cuello de botella.

Mi elección es claramente la opción dos porque ordenar una vez en la mañana y usar búsqueda binaria es abrumadoramente más rápida con apenas unos 4.6 millones de operaciones frente a los dos mil millones de la opción uno y además cumple perfectamente con la restricción de no duplicar la lista en memoria.

Cambiaría de opinión y preferiría la opción uno solo si el número de consultas diarias fuera extremadamente bajo. Si hacemos el cálculo matemático del punto de corte igualando el costo fijo de ordenar más las búsquedas con el costo de recorrer siempre nos da que el punto crítico está en unas 18 consultas al día. Por lo tanto a partir de menos de 18 consultas la opción uno sería mejor pero como el negocio hace 8000 consultas la opción dos es la ganadora indiscutible.