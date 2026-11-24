Análisis de estructuras de datos – Zapatería mayorista

## 1. Introducción

En la zapatería mayorista se manejan datos de clientes, pedidos, deudas, ventas y pagos a trabajadores. Actualmente, gran parte de esta información se registra manualmente, lo que dificulta realizar algunas consultas de manera rápida.

Para mejorar la organización de los datos se propone utilizar diferentes estructuras de datos. Cada estructura se selecciona considerando las operaciones que se realizan con mayor frecuencia en el negocio.

## 2. Estructuras de datos seleccionadas

2.1. Tabla hash para los clientes

Se propone utilizar una tabla hash para almacenar y buscar los datos de los clientes mediante su número de CI.

El CI funcionará como clave de búsqueda, permitiendo acceder directamente a la información del cliente sin recorrer todos los registros.

    Complejidades:

- Búsqueda: O(1) promedio.
- Inserción: O(1) promedio.
- Eliminación: O(1) promedio.
- Peor caso: O(n), cuando existen muchas colisiones.

Esta estructura es adecuada porque la búsqueda de clientes es una de las operaciones más frecuentes del negocio.

## 2.2. Lista enlazada para los abonos y pagos

Se propone utilizar una lista enlazada para almacenar el historial de abonos realizados por los clientes y los pagos efectuados a los trabajadores.

Cada nodo contendrá información como el cliente o trabajador relacionado, el monto, la fecha y el concepto del movimiento.

La lista permitirá agregar nuevos movimientos sin necesidad de reorganizar todos los registros existentes.

    Complejidades:

- Inserción al inicio: O(1).
- Búsqueda de un movimiento: O(n).
- Recorrido completo: O(n).
- Eliminación de un nodo conocido: O(1), si se dispone de su referencia y del nodo anterior.

Esta estructura resulta útil porque los movimientos se van registrando continuamente y es importante conservar su historial.

## 2.3. Árbol AVL para organizar las deudas

Se propone utilizar un árbol AVL para organizar los clientes según el saldo pendiente de sus deudas.

La clave de ordenamiento estará formada por el saldo pendiente y el CI del cliente. De esta manera, si dos clientes tienen la misma deuda, se podrá diferenciarlos utilizando su CI.

Esta estructura permite mantener los datos ordenados y realizar consultas de manera eficiente.

    Complejidades:

- Búsqueda: O(log n).
- Inserción: O(log n).
- Eliminación: O(log n).
- Encontrar el menor saldo: O(log n).
- Encontrar el siguiente cliente: O(log n).
- Consulta por rango: O(log n + k), donde k representa la cantidad de resultados.
- Recorrido en orden: O(n).

El árbol AVL es apropiado para consultar clientes con deudas dentro de determinados rangos, encontrar la deuda menor y recorrer los registros ordenadamente.

2.4. Arreglo para almacenar las ventas

Se propone utilizar un arreglo para almacenar los registros de las ventas realizadas.

Cada posición contendrá información como el número de venta, fecha, cliente, productos, cantidades y monto total.

Esta estructura permite mantener los registros organizados y acceder a ellos mediante su posición.

    Complejidades:

- Acceso por posición: O(1).
- Inserción al final: O(1) amortizado.
- Búsqueda por número de venta: O(n), si se realiza un recorrido.
- Recorrido completo: O(n).

El arreglo es adecuado porque el negocio registra diariamente nuevas ventas y necesita conservarlas para futuras consultas.

## 3. Comparación de las estructuras

| Estructura | Uso en el negocio | Operación principal | Complejidad promedio |
|---|---|---|---|
| Tabla hash | Datos de clientes | Buscar por CI | O(1) promedio |
| Lista enlazada | Abonos y pagos | Insertar movimientos | O(1) al inicio |
| Árbol AVL | Deudas de clientes | Buscar y ordenar deudas | O(log n) |
| Arreglo | Registro de ventas | Acceder por posición | O(1) |

## 4. Justificación de la selección

Las estructuras fueron seleccionadas considerando las necesidades y la frecuencia de las operaciones del negocio.

La tabla hash se utiliza para buscar rápidamente los datos de los clientes mediante su CI, ya que esta consulta se realiza con frecuencia.

La lista enlazada permite registrar los abonos y pagos, conservando un historial de los movimientos realizados.

El árbol AVL facilita la organización de las deudas y permite encontrar clientes según sus saldos pendientes, además de realizar consultas por rangos.

Finalmente, el arreglo permite almacenar las ventas y acceder a sus registros mediante posiciones.

## 5. Conclusión

No existe una única estructura de datos que sea la mejor para todas las operaciones del negocio. Cada una tiene características diferentes que permiten resolver necesidades específicas.

La tabla hash facilita la búsqueda de clientes, la lista enlazada conserva los movimientos de pagos, el árbol AVL organiza las deudas y el arreglo almacena las ventas.

La combinación de estas estructuras permitiría mejorar la organización de la información y reducir el tiempo necesario para realizar consultas.