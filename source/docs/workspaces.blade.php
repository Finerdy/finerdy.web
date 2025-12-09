---
language: es
title: Workspaces
description: Workspaces en Finerdy - Espacios separados para diferentes contextos financieros
---

@extends('_layouts.docs')

@section('content')
# Workspaces

Los workspaces te permiten separar tus finanzas en diferentes contextos. Podés tener uno para tus gastos personales, otro para los gastos familiares, y otro para tu negocio.

## ¿Qué es un workspace?

Un **workspace** es un espacio aislado con sus propias:

- Cuentas
- Categorías
- Transacciones
- Presupuestos
- Moneda de referencia

Cada workspace es independiente. Lo que registrás en uno no afecta a los otros.

---

## ¿Para qué usar varios workspaces?

### Finanzas personales vs familiares

```
Workspace: Personal
  - Cuenta: Banco personal
  - Categorías: Gimnasio, Hobbies, Salidas
  - Moneda referencia: USD

Workspace: Familia
  - Cuenta: Cuenta conjunta
  - Categorías: Supermercado, Colegio, Casa
  - Moneda referencia: USD
```

### Negocio independiente

```
Workspace: Freelance
  - Cuenta: Wise (USD)
  - Cuenta: PayPal (USD)
  - Categorías: Ingresos clientes, Software, Impuestos
  - Moneda referencia: USD
```

### Diferentes monedas base

```
Workspace: Argentina
  - Moneda referencia: ARS
  - Reportes en pesos

Workspace: Internacional
  - Moneda referencia: USD
  - Reportes en dólares
```

---

## Crear un workspace

Al crear un workspace definís:

| Campo | Descripción |
|-------|-------------|
| **Nombre** | Identificador (ej: "Personal", "Familia") |
| **Moneda de referencia** | La moneda para tus reportes |

### Importante sobre la moneda

La moneda de referencia **no se puede cambiar** después de crear el workspace. Elegí bien desde el inicio.

---

## Colaboración

Los workspaces permiten **compartir finanzas** con otras personas.

### Roles disponibles

| Rol | Permisos |
|-----|----------|
| **Owner** | Control total. Puede invitar, editar configuración, eliminar |
| **Member** | Puede crear y editar transacciones, cuentas, categorías |
| **Viewer** | Solo puede ver. No puede modificar nada |

### Casos de uso

**Pareja compartiendo gastos:**
- Ambos como **Member**
- Cada uno registra sus gastos
- Ambos ven los reportes

**Contador revisando:**
- Cliente como **Owner**
- Contador como **Viewer**
- Ve los reportes sin poder modificar

---

## Invitar usuarios

Para invitar a alguien a tu workspace:

1. Andá a la configuración del workspace
2. Ingresá el email de la persona
3. Elegí el rol (Member o Viewer)
4. La persona recibe una invitación

### Importante

- Solo el **Owner** puede invitar usuarios
- El invitado necesita crear una cuenta si no tiene una
- Podés cambiar el rol o remover usuarios después

---

## Cambiar entre workspaces

Podés cambiar de workspace en cualquier momento desde el menú de la aplicación.

```
┌─ Workspace actual ─────────────┐
│ 👤 Personal           ✓       │
│ 👥 Familia                    │
│ 💼 Freelance                  │
└────────────────────────────────┘
```

Cada vez que cambiás, ves las cuentas, categorías y transacciones de ese workspace.

---

## Aislamiento de datos

Los datos de cada workspace están **completamente aislados**:

| Elemento | ¿Compartido entre workspaces? |
|----------|------------------------------|
| Cuentas | No |
| Categorías | No |
| Transacciones | No |
| Presupuestos | No |
| Reportes | No |
| Tipos de cambio | Sí (son globales) |

### ¿Por qué importa?

- Una cuenta "Banco Santander" en el workspace Personal es diferente a una en Familia
- Podés tener categorías con el mismo nombre pero diferentes en cada workspace
- Los reportes solo muestran datos del workspace activo

---

## Workspace por defecto

Al registrarte, Finerdy crea automáticamente tu primer workspace. Este es tu **workspace por defecto**.

Podés:
- Renombrarlo
- Crear otros workspaces
- Seguir usando solo uno si no necesitás separar contextos

---

## Eliminar un workspace

Solo el **Owner** puede eliminar un workspace.

**Advertencia**: Eliminar un workspace borra **permanentemente**:
- Todas las cuentas
- Todas las transacciones
- Todas las categorías
- Todos los presupuestos
- Todos los accesos de colaboradores

Esta acción no se puede deshacer.

---

## Consejos para workspaces

1. **Empezá con uno**: No crees múltiples workspaces hasta que realmente lo necesites.

2. **Pensá en la moneda**: ¿En qué moneda querés ver tus reportes? Eso define el workspace.

3. **Separación clara**: Si mezclás personal con negocio, considerá separarlos.

4. **Invitá con cuidado**: Un **Member** puede modificar todo. Usá **Viewer** si solo necesitás que vean.

5. **No dupliques**: Si una cuenta la usás solo personalmente, no la crees en el workspace familiar.

---

## Resumen

| Concepto | Descripción |
|----------|-------------|
| **Workspace** | Espacio aislado con sus propios datos |
| **Moneda de referencia** | Se define al crear, no se puede cambiar |
| **Owner** | Dueño con control total |
| **Member** | Puede ver y modificar |
| **Viewer** | Solo puede ver |

---

¡Eso es todo! Ya sabés cómo funciona Finerdy. Empezá a registrar tus transacciones y tomá el control de tus finanzas.
@endsection
