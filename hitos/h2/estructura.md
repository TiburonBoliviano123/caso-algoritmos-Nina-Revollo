# Análisis de estructuras de datos – Zapatería mayorista

## 1. Introducción

Para mejorar la administración de la zapatería, se propone utilizar diferentes estructuras de datos que permitan organizar la información de clientes, pagos, deudas y ventas.

La elección de cada estructura depende del tipo de operación que se necesita realizar y de la frecuencia con la que se utiliza.

## 2. Estructuras de datos seleccionadas

### 2.1. Tabla Hash

**Uso:** Buscar clientes mediante su código.

**Justificación:** En el negocio es importante encontrar rápidamente los datos de un cliente, especialmente cuando se necesita consultar sus compras o deudas. Una tabla hash permite realizar estas búsquedas directamente utilizando el código como clave.

**Complejidad:**
- Búsqueda: O(1) promedio.
- Inserción: O(1) promedio.
- Eliminación: O(1) promedio.

En el peor caso, estas operaciones pueden llegar a O(n) debido a las colisiones.

### 2.2. Lista enlazada

**Uso:** Registrar pagos y abonos realizados por los clientes.

**Justificación:** Cada vez que un cliente realiza un pago, se puede agregar un nuevo registro al historial sin necesidad de reorganizar todos los elementos. También permite conservar los movimientos anteriores.

**Complejidad:**
- Inserción al inicio: O(1).
- Búsqueda de un pago: O(n).
- Recorrido completo: O(n).

### 2.3. Árbol AVL

**Uso:** Organizar los clientes según el monto de sus deudas.

**Justificación:** Permite mantener los registros ordenados y consultar cuáles son las deudas más altas o más bajas. También facilita encontrar clientes cuyas deudas estén dentro de un rango determinado.

**Complejidad:**
- Búsqueda: O(log n).
- Inserción: O(log n).
- Eliminación: O(log n).
- Consulta por rango: O(log n + m), donde m representa la cantidad de resultados encontrados.

### 2.4. Arreglo

**Uso:** Almacenar y recorrer los registros de ventas.

**Justificación:** Como la zapatería realiza entre 5 y 15 ventas diarias, un arreglo permite guardar los registros y recorrerlos fácilmente para consultar las ventas realizadas.

**Complejidad:**
- Acceso por posición: O(1).
- Búsqueda por contenido: O(n).
- Recorrido completo: O(n).
- Inserción al final: O(1) amortizado en un arreglo dinámico.

## 3. Comparación de estructuras

| Estructura | Operación principal | Complejidad |
|---|---|---|
| Tabla Hash | Buscar clientes por código | O(1) promedio |
| Lista enlazada | Registrar pagos y abonos | O(1) al inicio |
| Árbol AVL | Consultar deudas por rango | O(log n + m) |
| Arreglo | Consultar registros de ventas | O(n) recorrido |

## 4. Estructura elegida para las operaciones más frecuentes

La tabla hash sería una de las estructuras más importantes para el negocio porque permite buscar clientes rápidamente utilizando su código.

También sería conveniente utilizar una lista enlazada para mantener el historial de pagos y un árbol AVL para consultar las deudas de manera ordenada.

De esta forma, cada estructura cumple una función específica según las necesidades de la zapatería.

## 5. Conclusión

No existe una única estructura de datos que sea la mejor para todas las operaciones. Cada una tiene ventajas dependiendo del problema que se quiera resolver.

Para la zapatería, la tabla hash resulta conveniente para las búsquedas frecuentes, mientras que el árbol AVL permite organizar las deudas y la lista enlazada facilita registrar los movimientos de pagos.