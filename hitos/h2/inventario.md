Inventario de operaciones – Zapatería mayorista

1. Descripción del caso

El negocio es una zapatería dedicada a la venta de calzados femeninos al por mayor. Entre sus productos se encuentran tacones, botas, zapatos escolares, sandalias, mocasines y otros modelos.

Actualmente, el registro de clientes, pedidos y deudas se realiza manualmente. La información de las deudas se anota en cuadernos y una encargada es responsable de registrar y controlar los pagos.

Cuando se necesita consultar cuánto debe un cliente, la encargada debe buscar sus datos entre las anotaciones. Esta búsqueda suele tardar aproximadamente un minuto.

El objetivo es analizar estas operaciones y determinar qué estructuras de datos permitirían organizar la información y realizar las consultas de manera más eficiente.

2. Datos que maneja el negocio

| Tipo de información | Cantidad aproximada |

| Modelos de zapatos | Menos de 100 |
| Ventas diarias | Entre 5 y 15 |
| Trabajadores | Más de 10 |
| Clientes | Cantidad variable |
| Deudas | Cantidad variable |
| Pagos a trabajadores | Según fechas de pago |

Información de los clientes

Para registrar y controlar los pedidos y las deudas se utilizan los siguientes datos:

- Nombre del cliente.
- Número de teléfono.
- CI.
- Tipo de pedido.
- Fecha del pedido.
- Monto total.
- Monto pagado.
- Saldo pendiente.
- Estado de la deuda: cancelado o debe.

El CI se utilizará como identificador del cliente para realizar búsquedas.

Otra información del negocio

- Ventas: número de venta, fecha, cliente, productos, cantidades y monto total.
- Trabajadores: código, nombre, cargo y sueldo.
- Pagos a trabajadores: trabajador, monto pagado, fecha y concepto.

3. Operaciones que realiza el negocio

| Operación | Descripción |

| Buscar por clave | Encontrar un cliente utilizando su CI. |
| Insertar | Registrar un nuevo cliente. |
| Borrar | Eliminar un registro de cliente cuando ya no corresponda y no tenga deudas pendientes. |
| Buscar el menor | Encontrar al cliente con el menor saldo pendiente. |
| Buscar el siguiente | Encontrar el siguiente cliente según el orden establecido por su saldo y CI. |
| Buscar por rango | Mostrar clientes cuyas deudas estén entre 500 y 1500 Bs. |
| Recorrer en orden | Mostrar los clientes ordenados por saldo pendiente y CI. |
| Registrar venta | Guardar una nueva venta mayorista. |
| Registrar deuda | Registrar el saldo pendiente de un cliente. |
| Registrar abono | Actualizar el saldo cuando el cliente realiza un pago parcial. |
| Consultar historial | Revisar los pedidos y pagos anteriores de un cliente. |
| Registrar pago | Guardar un pago realizado a un trabajador. |
| Consultar pagos | Revisar los pagos realizados a cada trabajador. |

Para las operaciones de mínimo, siguiente, rango y recorrido en orden se considera un ordenamiento por saldo pendiente y, en caso de empate, por CI.

4. Frecuencia de las operaciones

Las siguientes frecuencias son estimaciones basadas en el funcionamiento del negocio.

| Operación | Frecuencia estimada |

| Buscar clientes | Muchas |
| Registrar ventas | Muchas |
| Consultar deudas | Muchas |
| Registrar abonos | Algunas |
| Registrar clientes | Pocas |
| Consultar historial de pedidos | Algunas |
| Registrar pagos a trabajadores | Algunas |
| Buscar el menor o el siguiente | Pocas |
| Buscar por rango | Pocas |
| Borrar clientes | Muy pocas |

5. Operaciones más importantes

Las operaciones más importantes para el negocio son la búsqueda de clientes mediante su CI, el registro de pedidos y la consulta de deudas.

Estas actividades se relacionan directamente con la atención a los compradores y el control del dinero.

También es importante registrar los abonos y mantener un historial de pagos para conocer cuánto ha pagado cada cliente y cuánto dinero todavía debe.

6. Conclusión

La zapatería necesita organizar principalmente la información de sus clientes, pedidos, deudas y pagos. Actualmente, estas actividades se realizan manualmente, lo que dificulta encontrar rápidamente los datos de cada cliente.

El uso de estructuras de datos adecuadas permitiría mejorar las búsquedas, mantener organizadas las deudas y facilitar el control de los pagos.