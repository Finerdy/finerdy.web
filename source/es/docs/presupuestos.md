---
extends: _layouts.docs
section: content
language: es
title: Presupuestos
description: Presupuestos en Finerdy - Control de gastos con filtros por categoría y tags
---

# Presupuestos

Los presupuestos te ayudan a controlar cuánto gastás. Definís un límite y Finerdy te muestra cuánto llevás gastado basándose en los filtros que definas.

## ¿Qué es un presupuesto?

Un **presupuesto** es un límite de gasto basado en filtros (categorías y/o tags) durante un período de tiempo.

### Ejemplo

```
Presupuesto: Supermercado
Filtros: Categorías [Comida, Supermercado] + Tags [#esencial]
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
| **Descripción** | Explicación opcional de qué cubre el presupuesto |
| **Filtros** | Categorías y/o tags que determinan qué gastos cuentan |
| **Monto** | El límite máximo en tu moneda de referencia |
| **Período** | Con qué frecuencia se reinicia |

---

## Filtros del presupuesto

Los filtros determinan qué gastos cuentan para tu presupuesto. Podés combinar categorías y tags para un seguimiento flexible.

### Opciones de filtro

| Filtro | Descripción |
|--------|-------------|
| **Categorías** | Una o más categorías de gasto |
| **Tags** | Uno o más tags |
| **Excluir transferencias** | Si excluir transacciones relacionadas con transferencias (por defecto: sí) |

@component('_partials.callout', ['type' => 'info', 'title' => 'Requisito'])
Se requiere al menos una categoría O un tag. Podés usar ambos juntos para un seguimiento más preciso.
@endcomponent

### Cómo funcionan los filtros

Los filtros usan la siguiente lógica:

- **Dentro de categorías**: OR - coincide con cualquiera de las categorías seleccionadas
- **Dentro de tags**: OR - coincide con cualquiera de los tags seleccionados
- **Entre categorías y tags**: AND - si ambos están definidos, el gasto debe coincidir con al menos una categoría Y tener al menos un tag

```
Presupuesto: Comida
Filtros:
  Categorías: [Supermercado, Restaurantes]
  Tags: [] (vacío)

Este presupuesto incluirá:
- Cualquier gasto en la categoría "Supermercado" O "Restaurantes"
```

```
Presupuesto: Gastos de proyecto
Filtros:
  Categorías: [Viajes, Software]
  Tags: [#proyecto-alfa]

Este presupuesto incluirá:
- Gastos en categoría "Viajes" o "Software"
  Y que tengan el tag #proyecto-alfa
```

@component('_partials.callout', ['type' => 'warning', 'title' => 'Importante'])
Si querés lógica OR entre categorías y tags, creá presupuestos separados o usá solo un tipo de filtro.
@endcomponent

### Ejemplos de filtros

**Presupuesto solo por categorías:**
```
Presupuesto: Entretenimiento
Filtros:
  Categorías: [Cine, Juegos, Streaming]
  Tags: []
```

**Presupuesto solo por tags:**
```
Presupuesto: Gastos Proyecto Alfa
Filtros:
  Categorías: []
  Tags: [#proyecto-alfa]
```

**Filtros combinados:**
```
Presupuesto: Esenciales mensuales
Filtros:
  Categorías: [Supermercado, Servicios, Transporte]
  Tags: [#esencial, #recurrente]
```

---

## Períodos disponibles

Finerdy soporta **6 tipos de períodos**:

| Período | Descripción | Cuándo se reinicia |
|---------|-------------|-------------------|
| **Semanal** | Para gastos semanales | Cada 7 días desde la fecha ancla |
| **Quincenal** | Para quienes cobran cada 2 semanas | Cada 14 días desde la fecha ancla |
| **Bimensual** | Para seguimiento dos veces al mes | El 1° y el 16 de cada mes |
| **Mensual** | Para gastos mensuales recurrentes | El mismo día cada mes |
| **Trimestral** | Para gastos menos frecuentes | Cada 3 meses |
| **Único** | Para gastos puntuales | Nunca (fechas fijas) |

### Período mensual

El más común. Usa la fecha ancla para determinar cuándo empieza el período.

```
Presupuesto: Entretenimiento - 200 USD/mes
Ancla: 15 de enero

Período 1: 15 Ene - 14 Feb
Período 2: 15 Feb - 14 Mar
Período 3: 15 Mar - 14 Abr
```

### Períodos semanal / quincenal

Usan la fecha ancla como punto de inicio.

```
Presupuesto: Gastos diarios - 300 USD/quincenal
Ancla: 1 de enero

1-14 Ene: máximo 300 USD
15-28 Ene: máximo 300 USD (se reinicia)
29 Ene - 11 Feb: máximo 300 USD (se reinicia)
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

El presupuesto suma automáticamente todos los gastos que:

1. Coinciden con **cualquiera** de las categorías del filtro O tienen **cualquiera** de los tags del filtro
2. Son de tipo **gasto**
3. Ocurrieron dentro del **período actual**
4. No son transferencias (si "excluir transferencias" está activado)

### Importante

- Se usa el **monto de referencia** (en la moneda base de tu workspace)
- Los gastos se detectan automáticamente según los filtros
- No necesitás asignar manualmente - si un gasto coincide con los filtros, cuenta

### Detección automática de gastos

A diferencia del sistema anterior, no necesitás asignar manualmente los gastos a presupuestos. Finerdy detecta automáticamente los gastos que coinciden:

```
Presupuesto: Supermercado
Filtros: Categorías [Comida, Supermercado]

Cuando registrás:
  Cuenta: Tarjeta de crédito
  Monto: 50 USD
  Categoría: Comida  ← ¡Coincide con el filtro!

Este gasto cuenta automáticamente para el presupuesto "Supermercado".
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
220 USD de 200 USD                    Excedido por 20 USD
```

---

## Exceder el presupuesto

Cuando gastás más del límite:

- El porcentaje supera el 100%
- Finerdy te muestra una alerta visual
- El gasto sigue registrándose normalmente

Los presupuestos son **informativos**, no bloquean transacciones.

---

## Editar filtros del presupuesto

Cuando cambiás los filtros de un presupuesto:

- El gasto se **recalcula inmediatamente** basándose en los nuevos filtros
- Todos los gastos que coinciden dentro del período actual se incluyen
- No necesitás sincronización - es automático

@component('_partials.callout', ['type' => 'info', 'title' => 'Ejemplo'])
Tenés un presupuesto "Supermercado mensual" con filtro [categoría Comida]. Muestra 500 USD gastados.

Agregás [categoría Supermercado] a los filtros.

El presupuesto recalcula inmediatamente y ahora muestra 650 USD gastados (incluyendo todos los gastos de Comida + Supermercado).
@endcomponent

---

## Ejemplo de API: Crear un Presupuesto con Filtros

```http
POST /budgets
Content-Type: application/json

{
  "name": "Comida mensual",
  "description": "Todos los gastos relacionados con comida",
  "filters": {
    "categories": [1, 2, 3],
    "tags": [5, 8],
    "exclude_transfers": true
  },
  "amount": 500,
  "period": "monthly",
  "anchor_date": "2025-01-15"
}
```

**Opciones de filtro:**
- `categories` - Array de IDs de categorías (al menos uno requerido si no hay tags)
- `tags` - Array de IDs de tags (al menos uno requerido si no hay categorías)
- `exclude_transfers` - Booleano, por defecto `true`

---

## Archivar presupuestos

Podés **archivar** un presupuesto que ya no usás:

- Desaparece de la lista activa
- Se conserva el historial
- Podés desarchivarlo cuando quieras

Útil para presupuestos de períodos únicos que ya terminaron.

---

## Consejos para presupuestos

1. **Usá filtros inteligentemente**: Combiná categorías y tags para un seguimiento preciso sin crear demasiados presupuestos.

2. **Empezá simple**: Creá 3-5 presupuestos para tus gastos principales.

3. **Sé realista**: Basate en lo que realmente gastás, no en lo que "deberías" gastar.

4. **Revisá y ajustá**: Si siempre te excedés, quizás el límite es muy bajo.

5. **Usá tags para proyectos**: Seguí gastos de proyectos a través de categorías con un solo presupuesto basado en tags.

6. **Usá período único para metas**: Ahorro para vacaciones, compras grandes, etc.

---

## Próximos pasos

Aprendé a organizar tus finanzas en diferentes contextos con [Workspaces](/es/docs/workspaces/).
