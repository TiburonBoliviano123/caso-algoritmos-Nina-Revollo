

# Inventario de operaciones – Zapatería mayorista

## 1. Descripción del caso

El negocio es una zapatería dedicada a la venta de calzados femeninos al por mayor. Entre sus productos se encuentran tacos, botas, zapatos escolares, sandalias, mocasines y otros modelos.

Actualmente, el negocio no cuenta con un sistema informático para gestionar sus operaciones. El control de clientes, ventas, deudas y pagos a trabajadores se realiza de manera manual.

El objetivo es analizar estas operaciones y determinar qué estructuras de datos y algoritmos permitirían administrarlas de manera eficiente.

## 2. Datos que maneja el negocio

| Tipo de información | Cantidad aproximada |

| Modelos de zapatos | Menos de 100 |
| Ventas diarias | Entre 5 y 15 |
| Trabajadores | Más de 10 |
| Clientes | Cantidad variable |
| Deudas | Cantidad variable |
| Pagos a trabajadores | Según fechas de pago |

### Información almacenada

- Clientes: código, nombre, teléfono, dirección y registro de compras.
- Ventas: número de venta, fecha, cliente, productos, cantidades y monto total.
- Deudas: cliente, monto pendiente, fecha de origen y estado de la deuda.
- Trabajadores: código, nombre, cargo y sueldo.
- Pagos: trabajador, monto pagado, fecha y concepto.

## 3. Operaciones que realiza el negocio

| Operación | Descripción |
|---|---|
| Buscar por clave | Encontrar un cliente utilizando su código. |
| Insertar | Registrar un nuevo cliente en el sistema. |
| Borrar | Eliminar un registro de cliente que ya no corresponda y no tenga deudas pendientes. |
| Buscar el menor | Encontrar al cliente que tenga la deuda más pequeña. |
| Buscar el siguiente | Encontrar al siguiente cliente según su código. |
| Buscar por rango | Mostrar clientes cuyas deudas estén entre 500 y 1500 Bs. |
| Recorrer en orden | Mostrar todos los clientes ordenados por su código. |
| Registrar venta | Guardar una nueva venta mayorista. |
| Registrar deuda | Guardar el monto pendiente de un cliente. |
| Registrar abono | Actualizar una deuda cuando el cliente realiza un pago parcial. |
| Consultar historial | Revisar las compras anteriores de un cliente. |
| Registrar pago | Guardar un pago realizado a un trabajador. |
| Consultar pagos | Revisar los pagos realizados a cada trabajador. |

## 4. Frecuencia de las operaciones

Las siguientes frecuencias son estimaciones iniciales basadas en el funcionamiento del negocio.

| Operación | Frecuencia estimada |
|---|---|
| Buscar clientes | Muchas |
| Registrar ventas | Muchas |
| Consultar deudas | Muchas |
| Registrar abonos | Algunas |
| Registrar clientes | Pocas |
| Consultar historial de compras | Algunas |
| Registrar pagos a trabajadores | Algunas |
| Buscar el menor o el siguiente | Pocas |
| Buscar por rango | Pocas |
| Borrar clientes | Muy pocas |

## 5. Operaciones más importantes

Las operaciones que considero más importantes para el negocio son la búsqueda de clientes, el registro de ventas y la consulta de deudas, porque se relacionan directamente con la atención a los compradores y el control del dinero.

También es importante registrar los abonos y los pagos a trabajadores para mantener un mejor control de las cuentas del negocio.

## 6. Conclusión

La zapatería necesita organizar principalmente la información de sus clientes, ventas, deudas y pagos. Actualmente estas actividades se realizan manualmente, por lo que un sistema informático ayudaría a mantener los registros ordenados y facilitaría las consultas.

El análisis de estas operaciones permitirá elegir estructuras de datos que reduzcan el tiempo de búsqueda y mejoren la administración del negocio.