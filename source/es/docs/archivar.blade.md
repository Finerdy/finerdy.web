---
extends: _layouts.docs
section: content
language: es
title: Archivado y Eliminación Protegida
description: Cómo gestionar cuentas, categorías y etiquetas de forma segura sin perder el historial de transacciones
---

# Archivado y Eliminación Protegida

Finerdy protege tu historial financiero evitando la eliminación accidental de cuentas, categorías y etiquetas que tienen transacciones asociadas. En su lugar, podés archivar los elementos que ya no usás.

---

## Eliminación Protegida

No podés eliminar directamente cuentas, categorías o etiquetas que tengan transacciones vinculadas.

### Por qué existe esta protección

Eliminar una cuenta, categoría o etiqueta con transacciones dejaría datos huérfanos y corrompería tu historial financiero. Imaginá eliminar tu cuenta "Efectivo"—todas esas transacciones ya no tendrían sentido.

@component('_partials.callout', ['type' => 'warning', 'title' => 'Protección en acción'])
Si intentás eliminar una cuenta con transacciones, Finerdy te mostrará un mensaje de error y evitará la eliminación.
@endcomponent

### Qué se protege

| Elemento | Protección |
|----------|-----------|
| **Cuentas** | No se pueden eliminar si tienen transacciones (ingresos, gastos, transferencias, cambios o correcciones) |
| **Categorías** | No se pueden eliminar si alguna transacción usa esta categoría |
| **Etiquetas** | No se pueden eliminar si alguna transacción está etiquetada con ella |

---

## Archivar en lugar de Eliminar

La solución es **archivar**. Cuando archivás un elemento, queda oculto del uso regular pero preserva todos los datos históricos.

### Qué pasa cuando archivás

- **Desaparece de las listas**: No aparecerá en los menús desplegables al crear nuevas transacciones
- **Oculto de la vista activa**: Las listas principales solo muestran elementos activos
- **Accesible en archivo**: Podés ver todos los elementos archivados en una sección dedicada
- **Historial intacto**: Todas las transacciones pasadas quedan sin tocar
- **Reversible**: Podés desarchivar en cualquier momento para restaurarlo

### Cómo archivar

**Para cuentas:**
1. Andá a la página de detalle de la cuenta
2. Tocá el menú (⋮) o ícono de configuración
3. Seleccioná **"Archivar cuenta"**
4. Confirmá

**Para categorías y etiquetas:**
1. Andá a configuración o la página de edición del elemento
2. Seleccioná **"Archivar"**
3. Confirmá

@component('_partials.callout', ['type' => 'info', 'title' => 'Ejemplo de uso'])
Tenías una categoría "Gastos de Negocio" para un proyecto freelance que terminó. Archivala—tus datos históricos quedan intactos, pero no va a saturar tu lista de categorías activas.
@endcomponent

---

## Ver Elementos Archivados

Los elementos archivados no están eliminados—solo están ocultos de la vista normal.

### Cómo ver elementos archivados

1. Andá a **Configuración**
2. Navegá a **Cuentas**, **Categorías** o **Etiquetas**
3. Activá **"Mostrar Archivados"** o seleccioná la pestaña **"Archivados"**
4. Mirá todos los elementos archivados

### Qué podés hacer con elementos archivados

| Acción | ¿Permitida? |
|--------|-------------|
| **Ver** | Sí |
| **Ver transacciones** | Sí (siguen apareciendo en reportes e historial) |
| **Desarchivar** | Sí (restaura al estado activo) |
| **Editar detalles** | Sí (nombre, descripción, etc.) |
| **Usar en nuevas transacciones** | No (tenés que desarchivar primero) |
| **Eliminar** | Solo si transferís las transacciones primero |

---

## Desarchivar

¿Cambiaste de opinión? Desarchivar es simple e instantáneo.

### Cómo desarchivar

1. Mirá los elementos archivados (ver sección anterior)
2. Seleccioná el elemento que querés restaurar
3. Tocá **"Desarchivar"**
4. El elemento vuelve al estado activo inmediatamente

@component('_partials.callout', ['type' => 'tip', 'title' => 'Restauración rápida'])
Desarchivar no tiene efectos secundarios—todas las transacciones que estaban vinculadas al elemento permanecen exactamente como estaban.
@endcomponent

---

## Transferir y Eliminar

Si realmente necesitás eliminar una cuenta, categoría o etiqueta con transacciones, podés **transferir** todas las transacciones asociadas a otro elemento primero.

### Cómo funciona

1. Seleccioná el elemento que querés eliminar
2. Elegí **"Eliminar con transferencia"**
3. Seleccioná un elemento destino del mismo tipo
4. Todas las transacciones se transfieren al nuevo elemento
5. El elemento original se elimina permanentemente

### Reglas de transferencia

**Para cuentas:**
- Solo se puede transferir a otra cuenta con la **misma moneda**
- Las transferencias, cambios y correcciones también se mueven
- El balance de la cuenta destino se actualiza en consecuencia

**Para categorías:**
- Solo se puede transferir a otra categoría del **mismo tipo** (ingreso o gasto)
- Todos los presupuestos vinculados a las transacciones se actualizarán

**Para etiquetas:**
- Se puede transferir a cualquier otra etiqueta
- Las etiquetas son transversales, así que no hay restricciones

@component('_partials.callout', ['type' => 'danger', 'title' => 'Acción permanente'])
Transferir y eliminar es **irreversible**. Una vez completado, no podés recuperar el elemento original. Todas las transacciones mostrarán permanentemente la nueva cuenta, categoría o etiqueta.
@endcomponent

---

## Ejemplos de API

Si estás integrando con la API de Finerdy, así es como funcionan el archivado y la eliminación:

### Archivar una cuenta

```http
PUT /accounts/{id}
Content-Type: application/json

{
  "archived": true
}
```

### Desarchivar una cuenta

```http
PUT /accounts/{id}
Content-Type: application/json

{
  "archived": false
}
```

### Eliminar con transferencia

```http
DELETE /accounts/{id}
Content-Type: application/json

{
  "transfer_to_account_id": 123
}
```

### Mismo patrón para categorías y etiquetas

```http
PUT /categories/{id}
{ "archived": true }

DELETE /categories/{id}
{ "transfer_to_category_id": 456 }

PUT /tags/{id}
{ "archived": true }

DELETE /tags/{id}
{ "transfer_to_tag_id": 789 }
```

---

## Escenarios Comunes

### Escenario 1: Cuenta bancaria vieja que ya no usás

**Situación:** Cerraste tu cuenta "Banco Galicia" y te pasaste a otro banco.

**Mejor enfoque:**
1. **Archivá** la cuenta vieja
2. Tus transacciones históricas siguen visibles en los reportes
3. La cuenta no aparecerá al crear nuevas transacciones

**No hagas:** Transferir y eliminar—perderás el contexto histórico.

---

### Escenario 2: Categorías duplicadas

**Situación:** Tenés las categorías "Supermercado" y "Compras de comida" y querés consolidar.

**Mejor enfoque:**
1. Elegí qué categoría mantener (ej: "Supermercado")
2. **Transferí y eliminá** el duplicado (ej: "Compras de comida")
3. Todas las transacciones pasadas ahora usan "Supermercado"

**Por qué:** Esto realmente corrige la inconsistencia de datos.

---

### Escenario 3: Etiqueta de proyecto temporal

**Situación:** Usaste "refaccion-2024" para seguir los gastos de refacción de tu casa, y el proyecto terminó.

**Mejor enfoque:**
1. **Archivá** la etiqueta
2. Los reportes todavía pueden filtrar por esta etiqueta para análisis histórico
3. No va a saturar tu lista de etiquetas activas

**No hagas:** Eliminarla—quizás quieras consultar esos costos más adelante.

---

## Buenas Prácticas

### 1. Archivar en lugar de eliminar

A menos que estés consolidando duplicados o corrigiendo errores, **preferí siempre archivar**. Es reversible y preserva el contexto.

### 2. Revisá antes de transferir

Antes de usar "transferir y eliminar", revisá algunas transacciones para asegurarte de que el elemento destino tenga sentido.

### 3. Usá nombres descriptivos

Si tenés cuentas o categorías similares, nombres claros te ayudan a elegir el destino de transferencia correcto:
- Bueno: "Banco Galicia (Cerrado 2024)"
- Malo: "Cuenta Bancaria 2"

### 4. Archivá periódicamente

Cada pocos meses, revisá tus cuentas, categorías y etiquetas. Archivá cualquier cosa que no hayas usado recientemente.

### 5. No le tengas miedo a archivar

Archivar es de bajo riesgo. Si archivás algo por error, desarchivarlo lleva 2 segundos.

---

## Resumen

| Función | Qué hace | Cuándo usarla |
|---------|----------|---------------|
| **Eliminación protegida** | Evita eliminar elementos con transacciones | Automático—no podés eliminar accidentalmente |
| **Archivar** | Oculta el elemento del uso activo, preserva el historial | Cuando ya no usás una cuenta, categoría o etiqueta |
| **Desarchivar** | Restaura el elemento al estado activo | Cuando necesitás usar nuevamente un elemento archivado |
| **Transferir y eliminar** | Mueve todas las transacciones a un nuevo elemento, luego elimina | Cuando consolidás duplicados o corregís errores |

---

## Próximos pasos

Aprendé sobre otras funcionalidades:
- [Transacciones](/docs/transacciones/) - Cómo registrar ingresos, gastos, transferencias y más
- [Correcciones](/docs/correcciones/) - Cómo ajustar los balances de cuentas
- [Presupuestos](/docs/presupuestos/) - Controlá el gasto por categoría
