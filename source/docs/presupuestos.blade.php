---
language: es
title: Presupuestos
description: Presupuestos en Finerdy - Control de gastos por categoría y período
---

@extends('_layouts.docs')

@section('content')
# Presupuestos

Los presupuestos te ayudan a controlar cuánto gastás en cada categoría. Definís un límite y Finerdy te muestra cuánto llevás gastado.

## ¿Qué es un presupuesto?

Un **presupuesto** es un límite de gasto para una categoría específica durante un período de tiempo.

### Ejemplo

```
Presupuesto: Supermercado
Monto: 500 USD
Período: Mensual

Enero 2025:
  Gastado: 320 USD (64%)
  Disponible: 180 USD
```

---

## Crear un presupuesto

Para crear un presupuesto necesitás definir:

| Campo | Descripción |
|-------|-------------|
| **Nombre** | Identificador del presupuesto |
| **Categoría** | La categoría de gasto a controlar |
| **Monto** | El límite máximo en tu moneda de referencia |
| **Período** | Con qué frecuencia se reinicia |

---

## Períodos disponibles

Finerdy soporta **5 tipos de períodos**:

| Período | Descripción | Cuándo se reinicia |
|---------|-------------|-------------------|
| **Mensual** | Para gastos mensuales recurrentes | El 1° de cada mes |
| **Quincenal** | Para quienes cobran cada 15 días | El 1° y el 16 de cada mes |
| **Trimestral** | Para gastos menos frecuentes | Cada 3 meses |
| **Anual** | Para gastos anuales | El 1° de enero |
| **Único** | Para gastos puntuales | Nunca (fechas fijas) |

### Período mensual

El más común. Se reinicia automáticamente el primer día de cada mes.

```
Presupuesto: Entretenimiento - 200 USD/mes

Enero: 0 → gastás → 150 USD → 1 Feb se reinicia → 0
Febrero: 0 → gastás → 180 USD → 1 Mar se reinicia → 0
```

### Período quincenal

Ideal si cobrás quincenalmente. Se divide en:
- **Primera quincena**: Del 1 al 15
- **Segunda quincena**: Del 16 al fin de mes

```
Presupuesto: Gastos diarios - 300 USD/quincena

1-15 Enero: máximo 300 USD
16-31 Enero: máximo 300 USD (se reinicia)
```

### Período único

Para gastos que no se repiten, como un viaje o una compra grande.

```
Presupuesto: Vacaciones verano
Monto: 2,000 USD
Desde: 1 Dic 2024
Hasta: 31 Ene 2025
```

---

## Cómo se calcula el gasto

El presupuesto suma todos los gastos que:

1. Pertenecen a la **categoría** del presupuesto
2. Están **asignados específicamente** a ese presupuesto
3. Ocurrieron dentro del **período actual**

### Importante

- Se usa el **monto de referencia** (en tu moneda base)
- Solo cuenta gastos asignados al presupuesto
- No suma automáticamente todos los gastos de la categoría

### Asignar gastos a un presupuesto

Cuando registrás un gasto, podés elegir a qué presupuesto asignarlo:

```
Nuevo gasto:
  Cuenta: Tarjeta de crédito
  Monto: 50 USD
  Categoría: Supermercado
  Presupuesto: [Supermercado mensual] ← opcional
```

---

## Seguimiento del presupuesto

Finerdy te muestra en tiempo real:

| Métrica | Descripción |
|---------|-------------|
| **Gastado** | Total gastado en el período actual |
| **Disponible** | Cuánto te queda (Monto - Gastado) |
| **Porcentaje** | Qué porcentaje del presupuesto usaste |
| **Estado** | Si estás dentro o excedido |

### Ejemplo visual

```
Supermercado                          ████████░░░░ 64%
320 USD de 500 USD                    180 USD disponible

Entretenimiento                       ██████████████ 110%
220 USD de 200 USD                    ⚠️ Excedido por 20 USD
```

---

## Exceder el presupuesto

Cuando gastás más del límite:

- El porcentaje supera el 100%
- Finerdy te muestra una alerta visual
- El gasto sigue registrándose normalmente

Los presupuestos son **informativos**, no bloquean transacciones.

---

## Archivar presupuestos

Podés **archivar** un presupuesto que ya no usás:

- Desaparece de la lista activa
- Se conserva el historial
- Podés desarchivarlo cuando quieras

Útil para presupuestos de períodos únicos que ya terminaron.

---

## Consejos para presupuestos

1. **Empezá simple**: Creá 3-5 presupuestos para tus gastos principales.

2. **Sé realista**: Basate en lo que realmente gastás, no en lo que "deberías" gastar.

3. **Revisá y ajustá**: Si siempre te excedés, quizás el límite es muy bajo.

4. **Usá período único para metas**: Ahorro para vacaciones, compras grandes, etc.

5. **No todo necesita presupuesto**: Algunos gastos son fijos y no tiene sentido presupuestarlos.

---

## Próximos pasos

Aprendé a organizar tus finanzas en diferentes contextos con [Workspaces](/docs/workspaces/).
@endsection
