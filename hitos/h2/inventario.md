Inventario de operaciones – Zapatería mayorista

1. Descripción del caso

El negocio es una zapatería dedicada a la comercialización de calzados femeninos al por mayor. Entre sus productos se encuentran tacos, botas, zapatos escolares, sandalias, mocasines y otros modelos.

Actualmente, el negocio no cuenta con un sistema informático para gestionar sus operaciones. El registro de clientes, ventas, deudas y pagos a trabajadores se realiza de manera manual.

El objetivo es analizar las operaciones que necesita el negocio y determinar qué estructuras de datos y algoritmos permitirían administrarlas de manera eficiente.

2. Datos que maneja el negocio

|Tipo de información|Cantidad aproximada|
|-|-|
|Modelos de zapatos|Menos de 100|
|Ventas diarias|Entre 5 y 15|
|Trabajadores|Más de 10|
|Clientes|Cantidad variable|
|Deudas|Cantidad variable|
|Pagos a trabajadores|Según fechas de pago|

Información almacenada

&#x09;**Clientes:** nombre, teléfono, dirección y registro de compras.

&#x09;**Ventas:** número de venta, fecha, cliente, productos, cantidades y monto total.

&#x09;**Deudas:** cliente, monto pendiente, fecha de origen y estado de la deuda.

&#x09;**Trabajadores:** código, nombre, cargo y sueldo.

&#x09;**Pagos:** trabajador, monto pagado, fecha y concepto.

## 3\. Operaciones que realiza el negocio

|Operación|Descripción|
|-|-|
|Buscar cliente|Encontrar un cliente por su nombre o código.|
|Registrar cliente|Agregar un nuevo cliente al sistema.|
|Registrar venta|Guardar una nueva venta mayorista.|
|Consultar historial|Mostrar las compras anteriores de un cliente.|
|Registrar deuda|Guardar el monto que un cliente tiene pendiente.|
|Buscar deudores|Encontrar clientes que todavía tienen deudas.|
|Registrar abono|Actualizar una deuda cuando el cliente realiza un pago parcial.|
|Consultar deuda|Conocer cuánto debe un cliente.|
|Registrar trabajador|Agregar los datos de un nuevo trabajador.|
|Registrar pago|Guardar un pago realizado a un trabajador.|
|Consultar pagos|Revisar los pagos realizados a cada trabajador.|
|Recorrer registros|Mostrar clientes, deudas o pagos registrados.|
|Buscar mayor deuda|Encontrar al cliente con la deuda más elevada.|
|Buscar menor deuda|Encontrar al cliente con la deuda más pequeña.|

## 4\. Frecuencia de las operaciones

Las siguientes frecuencias son estimaciones iniciales que deberán comprobarse observando el funcionamiento real del negocio.

|Operación|Frecuencia estimada|
|-|-|
|Buscar clientes|Muchas|
|Registrar ventas|Muchas|
|Consultar deudas|Muchas|
|Registrar abonos|Algunas|
|Registrar clientes|Pocas|
|Registrar trabajadores|Muy pocas|
|Registrar pagos a trabajadores|Algunas|
|Consultar historial de compras|Algunas|
|Buscar mayor o menor deuda|Pocas|

## 5\. Estructuras de datos propuestas

|Estructura|Operaciones donde se utilizaría|Ventaja|
|-|-|-|
|Tabla hash|Buscar clientes por código y consultar trabajadores|Búsqueda rápida en promedio.|
|Lista enlazada|Guardar el historial de pagos y abonos|Permite agregar nuevos registros fácilmente.|
|Árbol AVL|Organizar clientes por monto de deuda|Permite buscar y recorrer los registros ordenadamente.|
|Arreglo|Mostrar los registros de ventas y realizar recorridos|Permite acceder a los elementos por posición.|

## 6\. Análisis de eficiencia

&#x20;   **Tabla hash:** permite buscar clientes o trabajadores en tiempo promedio O(1), utilizando su código como clave.

&#x20;   **Lista enlazada:** permite insertar un nuevo pago al inicio en O(1), aunque buscar un pago específico requiere recorrer los registros.

&#x20;   **Árbol AVL:** permite buscar, insertar y eliminar registros en O(log n), manteniendo los datos ordenados.

&#x20;   **Arreglo:** permite acceder a una posición específica en O(1), pero buscar un registro por su contenido puede requerir O(n).

## 7\. Conclusión

La zapatería necesita mejorar principalmente la administración de sus clientes, las deudas y los pagos a trabajadores.

Mediante el análisis de las operaciones se puede observar que una tabla hash sería conveniente para las búsquedas frecuentes, mientras que una lista enlazada podría facilitar el registro de pagos y movimientos. Por otra parte, un árbol AVL permitiría organizar y consultar las deudas de los clientes de manera ordenada.

La elección de estas estructuras busca reducir el tiempo necesario para realizar las operaciones más frecuentes y facilitar la futura implementación de un sistema informático para el negocio.

