---
language: es
title: Conceptos básicos
description: Cuentas, categorías y moneda de referencia en Finerdy
---

@extends('_layouts.docs')

@section('content')
# Conceptos básicos

Antes de empezar a usar Finerdy, es importante entender los conceptos fundamentales que organizan tus finanzas.

## Cuentas

Una **cuenta** representa cualquier lugar donde guardás dinero:

- Cuentas bancarias (corriente, ahorro)
- Billeteras digitales (PayPal, Wise, Mercado Pago)
- Efectivo
- Criptomonedas
- Inversiones

### Propiedades de una cuenta

Cada cuenta tiene:

- **Nombre** - Cómo la identificás (ej: "Banco Santander", "Efectivo USD")
- **Moneda** - La moneda en la que opera (USD, EUR, ARS, etc.)
- **Balance** - El saldo actual, calculado automáticamente de las transacciones

### Monedas soportadas

Finerdy soporta las siguientes monedas:

| Código | Moneda |
|--------|--------|
| USD | Dólar estadounidense |
| EUR | Euro |
| GBP | Libra esterlina |
| ARS | Peso argentino |
| BRL | Real brasileño |
| MXN | Peso mexicano |
| CLP | Peso chileno |
| COP | Peso colombiano |
| CAD | Dólar canadiense |
| AUD | Dólar australiano |
| CHF | Franco suizo |
| JPY | Yen japonés |
| CNY | Yuan chino |

### Importante sobre las cuentas

- Una cuenta solo puede tener **una moneda**.
- El balance se calcula **automáticamente** sumando todas las transacciones.
- No podés cambiar la moneda de una cuenta después de crearla (tendrías que crear una nueva).

---

## Categorías

Las **categorías** organizan tus transacciones por tipo de ingreso o gasto.

### Tipos de categorías

Cada categoría pertenece a un tipo de transacción:

| Tipo | Uso |
|------|-----|
| **Ingreso** | Dinero que entra (Salario, Ventas, Freelance) |
| **Gasto** | Dinero que sale (Supermercado, Servicios, Transporte) |

Las transferencias y cambios de moneda no usan categorías.

### Ejemplos de categorías

**Para ingresos:**
- Salario
- Freelance
- Ventas
- Inversiones
- Otros ingresos

**Para gastos:**
- Supermercado
- Servicios (luz, gas, internet)
- Transporte
- Entretenimiento
- Salud
- Educación

### Consejos para categorías

- No crees demasiadas categorías. 10-15 suele ser suficiente.
- Las categorías son por workspace, así que cada contexto puede tener las suyas.
- Podés crear categorías nuevas en cualquier momento.

---

## Moneda de referencia

La **moneda de referencia** (o moneda base) es el concepto más importante de Finerdy.

### ¿Qué es?

Es la moneda en la que querés ver todos tus reportes consolidados. Cuando tenés cuentas en diferentes monedas, Finerdy convierte todo a tu moneda de referencia para que puedas ver:

- Tu patrimonio neto total
- Cuánto ganaste este mes (sumando ingresos en distintas monedas)
- Cuánto gastaste (sumando gastos en distintas monedas)

### ¿Cómo funciona?

1. Al crear un workspace, elegís tu moneda de referencia.
2. Cada transacción guarda dos valores:
   - El **monto original** en la moneda de la cuenta
   - El **monto de referencia** convertido a tu moneda base
3. Los reportes usan el monto de referencia para sumar todo.

### Ejemplo práctico

Supongamos que tu moneda de referencia es USD:

```
Gasto 1: 100 EUR (cuenta en euros)
  → Convertido: 108 USD (al tipo de cambio del día)

Gasto 2: 50 USD (cuenta en dólares)
  → Convertido: 50 USD

Gasto 3: 10,000 ARS (cuenta en pesos)
  → Convertido: 10 USD (al tipo de cambio del día)

Total del mes: 168 USD
```

### Tipos de cambio

Finerdy obtiene tipos de cambio de:

- **Frankfurter** - Para monedas principales (EUR, GBP, etc.)
- **DolarAPI** - Para el peso argentino (usa el tipo de cambio blue)

Los tipos de cambio se actualizan automáticamente y se guardan para reportes históricos.

### ¿Puedo cambiar mi moneda de referencia?

La moneda de referencia se define al crear el workspace y **no se puede cambiar** después. Esto es intencional: cambiarla requeriría recalcular todas las transacciones históricas con tipos de cambio que podrían no estar disponibles.

Si necesitás otra moneda de referencia, creá un nuevo workspace.

---

## Próximos pasos

Ahora que entendés los conceptos básicos, aprendé sobre los diferentes [tipos de transacciones](/docs/transacciones/).
@endsection
