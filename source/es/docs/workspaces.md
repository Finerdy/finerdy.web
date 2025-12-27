---
extends: _layouts.docs
section: content
language: es
title: Workspaces
description: Workspaces en Finerdy - Espacios separados para diferentes contextos financieros
---

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
| **Zona horaria** | La zona horaria para reportes y filtros de fecha |

### Importante sobre la moneda

La moneda de referencia **no se puede cambiar** después de crear el workspace. Elegí bien desde el inicio.

---

## Zonas horarias

Finerdy maneja dos zonas horarias diferentes para darte flexibilidad y consistencia.

### Zona horaria del usuario vs del workspace

| Zona horaria | Se usa para | Se configura en |
|--------------|-------------|-----------------|
| **Zona horaria del usuario** | Crear/editar transacciones, mostrar fechas en la UI | Tu configuración de perfil |
| **Zona horaria del workspace** | Reportes, filtros de fecha, cálculo de períodos de presupuestos | Configuración del workspace |

### ¿Por qué dos zonas horarias?

La **zona horaria del usuario** es personal. Cada usuario ve las fechas formateadas en su hora local cuando mira transacciones.

La **zona horaria del workspace** es compartida. Asegura que todos los colaboradores vean los mismos cortes de fecha en reportes y filtros, sin importar dónde estén.

### Ejemplo práctico

Imaginá un workspace compartido entre dos personas:

```
Usuario A: Ciudad de México (UTC-6)
Usuario B: Madrid (UTC+1)
Zona horaria del workspace: Buenos Aires (UTC-3)
```

Cuando ambos piden "transacciones de enero":

- **Ven las mismas transacciones** - porque la zona horaria del workspace (Buenos Aires) determina qué significa "enero"
- **Pero cada uno ve las fechas en su formato** - Usuario A ve las horas en hora de México, Usuario B las ve en hora de Madrid

### Cuándo importa

Sin una zona horaria compartida del workspace, la misma consulta podría devolver resultados diferentes:

```
Consulta: "transacciones de enero 2024"

Usuario A en México (UTC-6):
  Enero = 31 dic 18:00 UTC a 31 ene 18:00 UTC

Usuario B en España (UTC+1):
  Enero = 31 dic 23:00 UTC a 31 ene 23:00 UTC
```

Con una zona horaria del workspace, ambos usuarios ven datos idénticos porque "enero" está definido por el workspace (Buenos Aires), no por su ubicación personal.

### Comportamiento por defecto

- Si no configurás una zona horaria del workspace, por defecto es UTC
- La zona horaria del usuario afecta cómo ves las fechas, no cómo se filtran los datos
- Los períodos de presupuestos siempre usan la zona horaria del workspace para mantener consistencia

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
4. Hacé clic en "Invitar"

La persona recibirá un email con un enlace para unirse. Tiene 7 días para aceptar antes de que la invitación expire.

### Si no recibe el email

Podés reenviar la invitación desde la configuración del workspace. Esto también extiende el tiempo de expiración.

### Si cambiás de opinión

Podés cancelar una invitación pendiente en cualquier momento desde la configuración del workspace.

### Cuando alguien recibe tu invitación

Hace clic en el enlace del email, inicia sesión (o crea una cuenta), y acepta o rechaza. Una vez aceptada, el workspace aparece en su lista de workspaces.

### Importante

- Solo el **Owner** puede invitar usuarios
- Podés cambiar el rol de alguien o removerlo después

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
| **Zona horaria del usuario** | Configuración personal para mostrar fechas y crear transacciones |
| **Zona horaria del workspace** | Configuración compartida para reportes y filtros de fecha |
| **Owner** | Dueño con control total |
| **Member** | Puede ver y modificar |
| **Viewer** | Solo puede ver |

---

¡Eso es todo! Ya sabés cómo funciona Finerdy. Empezá a registrar tus transacciones y tomá el control de tus finanzas.
