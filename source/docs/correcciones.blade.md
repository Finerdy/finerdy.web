---
extends: _layouts.docs
section: content
language: es
title: Correcciones y Checkpoints
description: Cómo usar correcciones para ajustar balances y entender los checkpoints
---

# Correcciones y Checkpoints

Las correcciones son una herramienta poderosa para mantener tus cuentas sincronizadas con la realidad. Pero tienen un efecto importante: **crean un checkpoint** que bloquea el historial anterior.

---

## ¿Qué es una corrección?

Una corrección te permite ajustar el balance de una cuenta cuando hay una diferencia entre lo que Finerdy muestra y lo que realmente tenés.

### Cuándo usarla

- Contaste tu efectivo y no coincide con Finerdy
- El extracto del banco muestra un balance diferente
- Encontraste transacciones que olvidaste registrar
- Querés establecer el balance inicial de una cuenta nueva

@component('_partials.callout', ['type' => 'info', 'title' => 'Ejemplo'])
Finerdy dice que tenés $500 en tu billetera, pero al contar encontrás $480. Creás una corrección con el balance real ($480) y Finerdy ajusta automáticamente.
@endcomponent

---

## Cómo crear una corrección

1. Andá a la cuenta que querés corregir
2. Tocá el botón **"Corregir balance"**
3. Ingresá el **balance real actual** (no la diferencia)
4. Opcionalmente agregá una descripción
5. Guardá

@component('_partials.callout', ['type' => 'warning', 'title' => 'Importante'])
El monto que ingresás es el **balance total** que debería tener la cuenta, no la diferencia. Finerdy calcula el ajuste automáticamente.
@endcomponent

---

## Checkpoints: El historial queda congelado

Cuando creás una corrección, Finerdy crea un **checkpoint**. Esto significa que todas las transacciones anteriores a la corrección quedan **bloqueadas**.

### ¿Por qué se bloquean?

Imaginá este escenario:
1. Tu cuenta muestra $1,000
2. Creás una corrección ajustando a $950 (detectaste que faltaban $50)
3. Finerdy ahora sabe que el balance correcto al momento de la corrección es $950

Si permitiéramos editar transacciones anteriores, el balance de la corrección ya no tendría sentido. Por eso, las transacciones previas se bloquean.

@component('_partials.callout', ['type' => 'tip', 'title' => 'Pensalo así'])
Una corrección es como una "foto" del balance en ese momento. Todo lo que pasó antes queda congelado para que esa foto siga siendo válida.
@endcomponent

---

## Transacciones bloqueadas

Las transacciones bloqueadas se identifican con un **ícono de candado** en la app.

### ¿Qué podés hacer?

| Acción | ¿Permitida? |
|--------|-------------|
| **Ver** la transacción | Sí |
| **Editar** la transacción | No |
| **Eliminar** la transacción | No |

### ¿Y si necesito editar una transacción bloqueada?

Si realmente necesitás modificar el historial, tenés que **eliminar la corrección** que lo bloqueó. Esto desbloqueará las transacciones, pero también perderás el checkpoint.

@component('_partials.callout', ['type' => 'danger', 'title' => 'Cuidado'])
Eliminar una corrección desbloquea el historial pero también elimina la referencia del balance corregido. Hacelo solo si estás seguro.
@endcomponent

---

## Múltiples correcciones

Podés crear varias correcciones en la misma cuenta a lo largo del tiempo. Cada corrección crea un nuevo checkpoint.

### Reglas

- Solo la **última corrección** de cada cuenta es editable
- Las correcciones anteriores también quedan bloqueadas
- Cada corrección bloquea todo lo anterior a ella

### Ejemplo

```
Enero 15: Corrección → Balance $1,000 (bloquea todo antes del 15)
Febrero 28: Corrección → Balance $1,500 (bloquea todo entre el 15 de enero y el 28 de febrero)
```

Las transacciones después del 28 de febrero siguen siendo editables.

---

## Transfers y Exchanges

Las transferencias y cambios de moneda involucran **dos cuentas**. Si cualquiera de las dos tiene un checkpoint que afecta a la transacción, **toda la operación queda bloqueada**.

### Ejemplo

Tenés una transferencia de tu cuenta "Banco" a tu cuenta "Efectivo" del 10 de enero.

- Si "Banco" tiene una corrección del 15 de enero → La transferencia queda bloqueada
- Si "Efectivo" tiene una corrección del 15 de enero → La transferencia también queda bloqueada
- Si ninguna tiene corrección → La transferencia es editable

@component('_partials.callout', ['type' => 'info', 'title' => 'En la app'])
Si una transferencia está bloqueada por la cuenta destino, el modal te mostrará un aviso indicando que para editarla necesitás ir a la transacción origen.
@endcomponent

---

## Buenas prácticas

### 1. Corregí al final de un período

El mejor momento para hacer correcciones es al cierre de un mes o período. Así verificás que todo esté en orden y bloqueás el historial de manera ordenada.

### 2. Revisá bien antes de crear la corrección

Una vez creada la corrección, el historial queda bloqueado. Asegurate de que todas las transacciones anteriores estén bien registradas.

### 3. No uses correcciones para transacciones normales

Si compraste algo, usá un **Gasto**. Si recibiste dinero, usá un **Ingreso**. Las correcciones son solo para ajustes cuando no podés determinar qué transacciones faltan.

### 4. Agregá una descripción

Cuando crees una corrección, explicá brevemente por qué la estás haciendo. Tu yo del futuro te lo va a agradecer.

@component('_partials.callout', ['type' => 'tip', 'title' => 'Ejemplo de buena descripción'])
"Arqueo de caja mensual - diferencia de $50 sin identificar" es mejor que solo "Ajuste".
@endcomponent

---

## Resumen

| Concepto | Descripción |
|----------|-------------|
| **Corrección** | Ajuste de balance cuando la realidad no coincide con Finerdy |
| **Checkpoint** | Punto de referencia que bloquea el historial anterior |
| **Transacciones bloqueadas** | No se pueden editar ni eliminar, solo ver |
| **Para desbloquear** | Eliminá la corrección que creó el checkpoint |

---

## Próximos pasos

¿Querés aprender más sobre otros tipos de transacciones? Volvé a la página de [Transacciones](/docs/transacciones/).
