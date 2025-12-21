---
extends: _layouts.docs
section: content
language: es
title: Transacciones
description: Tipos de transacciones en Finerdy - ingresos, gastos, transferencias, cambios y correcciones
---

# Transacciones

Las transacciones son el corazón de Finerdy. Cada movimiento de dinero se registra como una transacción.

## Tipos de transacciones

Finerdy tiene **5 tipos** de transacciones, cada uno con un propósito específico:

| Tipo | Descripción | Afecta balance |
|------|-------------|----------------|
| **Ingreso** | Dinero que entra a una cuenta | + |
| **Gasto** | Dinero que sale de una cuenta | - |
| **Transferencia** | Mover dinero entre cuentas de la misma moneda | +/- |
| **Cambio** | Convertir dinero entre cuentas de diferente moneda | +/- |
| **Corrección** | Ajuste manual del balance | +/- |

---

## Ingreso

@include('_partials.badge', ['type' => 'ingreso'])

Un **ingreso** representa dinero que entra a una cuenta.

### Cuándo usarlo

- Recibís tu salario
- Cobrás un trabajo freelance
- Vendés algo
- Recibís un reembolso
- Intereses de inversiones

### Campos

- **Cuenta** - Donde entra el dinero
- **Monto** - Cuánto recibiste
- **Categoría** - Tipo de ingreso (Salario, Ventas, etc.)
- **Descripción** - Detalle opcional
- **Fecha** - Cuándo ocurrió

### Ejemplo

```
Tipo: Ingreso
Cuenta: Banco BBVA (USD)
Monto: 2,500.00 USD
Categoría: Salario
Descripción: Sueldo enero 2025
Fecha: 2025-01-05
```

---

## Gasto

@include('_partials.badge', ['type' => 'gasto'])

Un **gasto** representa dinero que sale de una cuenta.

### Cuándo usarlo

- Comprás algo
- Pagás un servicio
- Pagás impuestos
- Cualquier egreso de dinero

### Campos

- **Cuenta** - De donde sale el dinero
- **Monto** - Cuánto gastaste
- **Categoría** - Tipo de gasto (Supermercado, Servicios, etc.)
- **Descripción** - Detalle opcional
- **Fecha** - Cuándo ocurrió
- **Presupuesto** - Opcional, para trackear contra un presupuesto

### Ejemplo

```
Tipo: Gasto
Cuenta: Tarjeta de crédito (ARS)
Monto: 15,000.00 ARS
Categoría: Supermercado
Descripción: Compra semanal
Fecha: 2025-01-10
```

---

## Transferencia

@include('_partials.badge', ['type' => 'transferencia'])

Una **transferencia** mueve dinero entre dos cuentas de la **misma moneda**.

### Cuándo usarlo

- Movés dinero de tu cuenta corriente a tu caja de ahorro
- Pasás efectivo a una billetera digital
- Cualquier movimiento interno sin cambio de moneda

### Cómo funciona

Una transferencia crea **dos transacciones vinculadas**:
1. Una transacción negativa en la cuenta origen
2. Una transacción positiva en la cuenta destino

### Campos

- **Cuenta origen** - De donde sale el dinero
- **Cuenta destino** - Donde entra el dinero (misma moneda)
- **Monto** - Cuánto transferís
- **Descripción** - Detalle opcional
- **Fecha** - Cuándo ocurrió

### Ejemplo

```
Tipo: Transferencia
Cuenta origen: Banco Santander (USD)
Cuenta destino: Wise (USD)
Monto: 500.00 USD
Descripción: Fondeo Wise
Fecha: 2025-01-15

Resultado:
  - Banco Santander: -500 USD
  - Wise: +500 USD
```

### Importante

- Ambas cuentas deben tener la **misma moneda**.
- Si las monedas son diferentes, usá un **Cambio** en lugar de una transferencia.

---

## Cambio de moneda

@include('_partials.badge', ['type' => 'cambio'])

Un **cambio** (o exchange) convierte dinero de una moneda a otra.

### Cuándo usarlo

- Comprás dólares con pesos
- Vendés euros para obtener dólares
- Cualquier conversión entre monedas

### Cómo funciona

Un cambio crea **dos transacciones vinculadas**:
1. Una transacción negativa en la cuenta origen (moneda A)
2. Una transacción positiva en la cuenta destino (moneda B)

Además, registra la **diferencia de cambio** si el tipo de cambio real difiere del tipo de cambio de mercado.

### Campos

- **Cuenta origen** - De donde sale el dinero
- **Monto origen** - Cuánto vendés
- **Cuenta destino** - Donde entra el dinero (otra moneda)
- **Monto destino** - Cuánto recibís
- **Descripción** - Detalle opcional
- **Fecha** - Cuándo ocurrió

### Ejemplo

```
Tipo: Cambio
Cuenta origen: Efectivo ARS
Monto origen: 100,000.00 ARS
Cuenta destino: Efectivo USD
Monto destino: 105.00 USD
Descripción: Compra dólar blue
Fecha: 2025-01-20

Tipo de cambio implícito: 952.38 ARS/USD

Resultado:
  - Efectivo ARS: -100,000 ARS
  - Efectivo USD: +105 USD
```

### Diferencia de cambio

Si el tipo de cambio que conseguiste es mejor o peor que el tipo de cambio de mercado, Finerdy calcula la **diferencia de cambio**:

- **Ganancia**: Conseguiste más de lo esperado
- **Pérdida**: Conseguiste menos de lo esperado

Esta diferencia aparece en tus reportes.

---

## Corrección

@include('_partials.badge', ['type' => 'corrección'])

Una **corrección** ajusta el balance de una cuenta cuando hay una diferencia con la realidad.

### Cuándo usarlo

- Encontrás una diferencia entre el balance de Finerdy y el real
- Necesitás ajustar por un error
- Balance inicial de una cuenta

### Campos

- **Cuenta** - La cuenta a ajustar
- **Monto** - El balance real actual (Finerdy calcula la diferencia)
- **Descripción** - Razón del ajuste
- **Fecha** - Cuándo aplicar

### Ejemplo

```
Tipo: Corrección
Cuenta: Efectivo (ARS)
Balance actual: 45,000.00 ARS
Descripción: Arqueo de caja mensual
Fecha: 2025-01-25
```

### Importante

- Las correcciones **no tienen categoría**.
- No afectan los reportes de ingresos/gastos.
- Crean un **checkpoint** que bloquea las transacciones anteriores.

Para más detalles sobre correcciones y checkpoints, consultá la página dedicada: [Correcciones y Checkpoints](/docs/correcciones/).

---

## Campos comunes

Todas las transacciones tienen estos campos:

| Campo | Descripción |
|-------|-------------|
| **Fecha** | Cuándo ocurrió la transacción |
| **Descripción** | Texto libre para detalles |
| **Tags** | Etiquetas personalizadas para organizar tus transacciones |
| **Adjuntos** | Podés adjuntar comprobantes (imágenes, PDFs) |
| **Creado por** | Usuario que registró la transacción |

---

## Tags

Los **tags** te permiten organizar y filtrar tus transacciones con etiquetas personalizadas.

### Cómo usarlos

- Escribí el nombre del tag en el campo de tags
- Finerdy te sugiere tags existentes mientras escribís
- Si el tag no existe, se crea automáticamente
- Podés agregar múltiples tags a una transacción

### Ejemplos de uso

- `vacaciones` - Para gastos de un viaje específico
- `trabajo` - Para separar gastos laborales de personales
- `pendiente` - Para marcar transacciones que necesitan revisión
- `mensual` - Para gastos recurrentes
- `proyecto-casa` - Para gastos de un proyecto específico

### Filtrar por tags

En la lista de transacciones, podés filtrar por uno o más tags para ver solo las transacciones que los contienen.

### Ejemplo

```
Tipo: Gasto
Cuenta: Tarjeta de crédito (USD)
Monto: 500.00 USD
Categoría: Viajes
Descripción: Hotel en Miami
Tags: vacaciones, miami-2025
Fecha: 2025-03-15
```

---

## Próximos pasos

Ahora que entendés los tipos de transacciones, aprendé sobre los [Reportes](/docs/reportes/) para analizar tus finanzas.
