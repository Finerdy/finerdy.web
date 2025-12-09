---
language: es
title: Reportes
description: Reportes en Finerdy - Balance general y Estado de resultados
---

@extends('_layouts.docs')

@section('content')
# Reportes

Los reportes son donde Finerdy brilla. Acá podés ver tus finanzas consolidadas, con todas las monedas convertidas a tu moneda de referencia.

## Tipos de reportes

Finerdy ofrece dos reportes principales:

| Reporte | Qué muestra |
|---------|-------------|
| **Balance general** | Tu patrimonio neto a una fecha determinada |
| **Estado de resultados** | Ingresos y gastos en un período |

---

## Balance general

El **balance general** (o balance sheet) muestra cuánto tenés en total a una fecha específica.

### ¿Qué muestra?

- Lista de todas tus cuentas con sus balances
- Cada balance en su moneda original Y convertido a tu moneda de referencia
- Diferencias de cambio acumuladas
- **Total neto** en tu moneda de referencia

### Ejemplo

```
Balance al 31/01/2025
Moneda de referencia: USD

CUENTAS
─────────────────────────────────────────
Banco BBVA (USD)        2,500.00 USD     2,500.00 USD
Wise (EUR)                800.00 EUR       864.00 USD
Efectivo (ARS)        150,000.00 ARS       157.89 USD
─────────────────────────────────────────
Subtotal                                 3,521.89 USD

Diferencias de cambio                       +12.50 USD
─────────────────────────────────────────
PATRIMONIO NETO                          3,534.39 USD
```

### Cómo se calcula

1. Para cada cuenta, suma todas las transacciones hasta la fecha indicada
2. Si la cuenta está en otra moneda, convierte al tipo de cambio de esa fecha
3. Suma las diferencias de cambio de todas las operaciones de cambio
4. Total = Suma de balances + Diferencias de cambio

### Filtros

- **Fecha**: Podés ver el balance a cualquier fecha pasada

---

## Estado de resultados

El **estado de resultados** (o income statement) muestra cuánto ganaste y gastaste en un período.

### ¿Qué muestra?

- Ingresos por categoría
- Gastos por categoría
- Diferencias de cambio del período
- **Resultado neto** (ganancia o pérdida)

### Ejemplo

```
Estado de resultados
Enero 2025
Moneda de referencia: USD

INGRESOS
─────────────────────────────────────────
Salario                              2,500.00 USD
Freelance                              350.00 USD
─────────────────────────────────────────
Total ingresos                       2,850.00 USD

GASTOS
─────────────────────────────────────────
Supermercado                           280.00 USD
Servicios                              150.00 USD
Transporte                              85.00 USD
Entretenimiento                        120.00 USD
─────────────────────────────────────────
Total gastos                           635.00 USD

─────────────────────────────────────────
Resultado operativo                  2,215.00 USD

Diferencias de cambio                  +12.50 USD
─────────────────────────────────────────
RESULTADO NETO                       2,227.50 USD
```

### Cómo se calcula

1. Toma todas las transacciones de ingreso y gasto del período
2. Usa el **monto de referencia** (ya convertido a tu moneda base)
3. Agrupa por categoría
4. Suma las diferencias de cambio de operaciones de cambio del período
5. Resultado = Ingresos - Gastos + Diferencias de cambio

### Filtros

- **Desde**: Fecha inicial del período
- **Hasta**: Fecha final del período

---

## Monto de referencia

Un concepto clave para entender los reportes es el **monto de referencia**.

### ¿Qué es?

Cada transacción guarda dos montos:

1. **Monto original**: En la moneda de la cuenta
2. **Monto de referencia**: Convertido a tu moneda base

### ¿Cuándo se calcula?

El monto de referencia se calcula **al momento de crear la transacción**, usando el tipo de cambio de ese día.

### Ejemplo

```
Transacción:
  Gasto de 100 EUR
  Fecha: 15/01/2025
  Tipo de cambio EUR/USD ese día: 1.08

Monto original: 100.00 EUR
Monto de referencia: 108.00 USD
```

### ¿Por qué importa?

Esto significa que los reportes reflejan los tipos de cambio **históricos**, no los actuales. Es lo correcto para contabilidad: un gasto de 100 EUR en enero no debería cambiar de valor solo porque el euro subió en marzo.

---

## Diferencias de cambio

Las **diferencias de cambio** aparecen cuando hacés un cambio de moneda y el tipo de cambio que conseguiste difiere del tipo de cambio de mercado.

### Ejemplo

```
Cambio: 100,000 ARS → USD
Tipo de cambio de mercado: 950 ARS/USD (esperarías 105.26 USD)
Lo que recibiste: 110 USD
Diferencia: +4.74 USD (ganancia)
```

### En los reportes

- **Balance general**: Muestra el total acumulado de diferencias de cambio
- **Estado de resultados**: Muestra las diferencias de cambio del período

---

## Consejos para reportes

1. **Revisá mensualmente**: El estado de resultados mensual te da una buena foto de cómo vas.

2. **Compará períodos**: Mirá el mismo mes del año anterior para ver tendencias.

3. **Atención a las diferencias de cambio**: Si son muy grandes, puede indicar que estás comprando/vendiendo moneda en momentos poco favorables.

4. **El balance es tu foto actual**: Usalo para saber tu patrimonio neto real.

---

## Próximos pasos

Aprendé a controlar tus gastos con [Presupuestos](/docs/presupuestos/).
@endsection
