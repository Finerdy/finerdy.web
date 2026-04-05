---
extends: _layouts.docs
section: content
language: es
title: Vencimientos
description: Controla pagos recurrentes, planes de cuotas y fechas de vencimiento en Finerdy
---

# Vencimientos

Los vencimientos te ayudan a controlar pagos recurrentes y fechas de pago. Configuralos una vez y Finerdy te recuerda cuando vencen, te permite registrar pagos y proyectar tus gastos fijos.

## Que es un vencimiento?

Un **vencimiento** es una obligacion de pago, ya sea recurrente (alquiler, suscripciones) o un conjunto personalizado de fechas (planes de cuotas, pagos unicos).

### Ejemplo

```
Vencimiento: Netflix
Monto: 15.99 USD
Frecuencia: Mensual
Categoria: Entretenimiento
Etiquetas: [streaming, suscripciones]

Cuotas:
  1 May 2025: Pendiente (vence en 3 dias)
  1 Abr 2025: Pagado → Transaccion #142
  1 Mar 2025: Pagado → Transaccion #128
```

---

## Crear un vencimiento

| Campo | Descripcion |
|-------|-------------|
| **Nombre** | Identificador del vencimiento (ej: "Netflix", "Alquiler") |
| **Descripcion** | Detalle opcional |
| **Moneda** | De tus cuentas existentes |
| **Monto** | Monto por defecto de cada cuota |
| **Categoria** | Categoria de gasto opcional (se traslada a las transacciones) |
| **Etiquetas** | Etiquetas por defecto (se trasladan a las transacciones, modificables por pago) |
| **ID externo** | Referencia opcional (numero de factura, ID de servicio) |
| **Frecuencia** | Con que frecuencia se repite |

---

## Frecuencias

Finerdy soporta dos tipos de frecuencia:

### Vencimientos periodicos

Para pagos recurrentes. Definis una **fecha de primer vencimiento** (fecha ancla) y Finerdy genera el siguiente automaticamente cada vez que pagas.

| Frecuencia | Ciclo |
|------------|-------|
| **Semanal** | Cada 7 dias |
| **Quincenal** | Cada 14 dias |
| **Mensual** | Mismo dia cada mes |
| **Bimestral** | Cada 2 meses |
| **Trimestral** | Cada 3 meses |
| **Semestral** | Cada 6 meses |
| **Anual** | Cada 12 meses |

```
Vencimiento: Alquiler
Frecuencia: Mensual
Fecha ancla: 1 Mayo 2025

→ Crea cuota para 1 Mayo
→ Al pagar, crea cuota para 1 Junio
→ Al pagar, crea cuota para 1 Julio
→ ...
```

### Vencimientos personalizados

Para planes de cuotas o pagos unicos. Definis cada fecha manualmente y opcionalmente un monto diferente por cuota.

```
Vencimiento: Cuotas TV
Monto: 500 USD (por defecto)
Frecuencia: Personalizado

Cuotas:
  1 Mayo: 500 USD
  1 Junio: 500 USD
  1 Julio: 250 USD (ultima cuota, monto diferente)
```

---

## Estados de las cuotas

Cada cuota tiene uno de estos estados:

| Estado | Descripcion |
|--------|-------------|
| **Pendiente** | Aun no pagado, fecha de vencimiento en el futuro |
| **Vencido** | Aun no pagado, la fecha de vencimiento ya paso (se calcula automaticamente) |
| **Pagado** | Pago registrado, vinculado a una transaccion |
| **Salteado** | Omitido intencionalmente |

@component('_partials.callout', ['type' => 'info', 'title' => 'Vencido es automatico'])
Vencido no es un estado almacenado — se calcula en tiempo real. Cualquier cuota pendiente con fecha pasada se muestra automaticamente como vencida.
@endcomponent

---

## Pagar un vencimiento

Al pagar una cuota, Finerdy te pide:

| Campo | Descripcion |
|-------|-------------|
| **Cuenta** | Con que cuenta pagar |
| **Monto** | Pre-cargado de la cuota (editable) |
| **Fecha y hora** | Cuando se realizo el pago |
| **Descripcion** | Pre-cargada con el nombre del vencimiento |
| **Etiquetas** | Pre-cargadas del vencimiento (editables) |

Esto crea una **transaccion de gasto** vinculada a la cuota.

### Pagos en otra moneda

Podes pagar un vencimiento en una moneda usando una cuenta en otra moneda. Por ejemplo, pagar un vencimiento en ARS con una cuenta en USD:

1. Selecciona una cuenta en USD
2. El indicador de moneda cambia a USD
3. Ingresa el monto equivalente en USD
4. Un hint muestra el monto original en ARS

La transaccion se registra en la moneda de la cuenta.

---

## Recordatorios por email

Finerdy envia recordatorios por email para cuotas que vencen **dentro de los proximos 3 dias** a todos los miembros del workspace. Se ejecuta automaticamente, sin configuracion necesaria. Cada cuota recibe un solo recordatorio, y los recordatorios perdidos se recuperan en la siguiente ejecucion.

---

## Archivar vencimientos

Cuando un vencimiento ya no es relevante, podes **archivarlo** en vez de eliminarlo. Los vencimientos archivados se ocultan del listado por defecto pero se preservan para el historial.

- Archiva un vencimiento desde su pagina de detalle
- Los vencimientos archivados se encuentran en la seccion **Archivados**
- Desarchiva en cualquier momento para volver a la lista activa
- Archivar un vencimiento detiene la generacion automatica de nuevas cuotas

@component('_partials.callout', ['type' => 'tip', 'title' => 'Archivar vs. eliminar'])
Eliminar un vencimiento lo borra permanentemente (las cuotas pagadas se preservan). Archivar mantiene todo el historial accesible.
@endcomponent

---

## Vencimientos completados

Un vencimiento se muestra con un badge de **Completado** cuando todas sus cuotas fueron pagadas o salteadas y no quedan pendientes. Esto es especialmente util para vencimientos personalizados/planes de cuotas con un numero fijo de pagos.

```
Vencimiento: Cuotas TV (Completado ✓)
Cuotas:
  1 Mayo: Pagado → Transaccion #201
  1 Junio: Pagado → Transaccion #215
  1 Julio: Pagado → Transaccion #230
```

---

## Widget en el dashboard

El dashboard muestra tus **proximos vencimientos** con:

- Las proximas 5 cuotas pendientes/vencidas
- Dias hasta el vencimiento (verde > 7 dias, amarillo 3-7, rojo < 3)
- Boton de pago rapido para abrir el modal directamente

---

## Vinculacion con transacciones

Cada cuota pagada esta vinculada a su transaccion:

- **Desde el vencimiento**: Hace click en "Ver transaccion" en una cuota pagada para ver los detalles
- **Desde la transaccion**: Un banner muestra de que vencimiento proviene, con un link de vuelta

---

## Consejos

1. **Usa etiquetas en los vencimientos**: Se trasladan a cada transaccion de pago, facilitando el analisis de gastos.

2. **ID externo para seguimiento**: Usalo para vincular vencimientos con numeros de factura o referencias externas.

3. **Personalizado para cuotas**: Usa frecuencia personalizada cuando tenes un numero fijo de pagos con fechas conocidas.

4. **Revisa el dashboard**: El widget de proximos vencimientos te da una vision rapida de lo que esta por vencer.

---

## Siguientes pasos

Aprende a organizar tus finanzas en diferentes contextos con [Workspaces](/es/docs/workspaces/).
