---
extends: _layouts.docs
section: content
language: es
title: API e Integraciones
description: Autenticate con la API de Finerdy usando tokens de acceso personal e integrá tus propias aplicaciones
---

# API e Integraciones

Finerdy tiene una **API pública**, así que podés construir tus propias integraciones sobre tus datos financieros. Conectá una planilla, un dashboard propio, un script que importe transacciones o cualquier herramienta de terceros que quieras.

Esta página explica cómo autenticarte como desarrollador externo. La referencia completa de endpoints vive en la [Documentación de la API](https://api.finerdy.app/docs/api#/).

## URL base

Cada request a la API va a:

```
https://api.finerdy.app
```

La referencia completa y siempre actualizada de cada endpoint, parámetro y respuesta está publicada en:

```
https://api.finerdy.app/docs/api
```

Esa referencia es pública a propósito — no necesitás una cuenta para leerla.

---

## Autenticación: tokens de acceso personal

Las integraciones externas se autentican **solo con tokens de acceso personal** generados desde la app. No existe un flujo de usuario y contraseña para la API.

Un **token de acceso personal** es una cadena de texto larga y secreta que te identifica y otorga acceso a tus datos. Lo enviás en cada request.

### Cómo obtener un token

1. Iniciá sesión en la app en [app.finerdy.app](https://app.finerdy.app).
2. Abrí **Perfil → API Tokens**.
3. Hacé clic en **Generar token**, ponele un nombre (ej: "Importar planilla") y elegí sus scopes.
4. **Copiá el token de inmediato.** Se muestra **una sola vez** — una vez que cerrás el diálogo no lo podés ver de nuevo.

Si perdés un token, no lo podés recuperar. Simplemente revocalo y generá uno nuevo.

### Cómo autenticar los requests

Enviá el token en el header `Authorization` como un token Bearer en cada request:

```
Authorization: Bearer <tu-token>
```

Un ejemplo completo con `curl`:

```bash
curl https://api.finerdy.app/api/transactions \
  -H "Authorization: Bearer 38|OT6JgUfXk8HW90xWuikvRZX6Lwg9rGpd3SYRqt0W29f2c48c" \
  -H "Accept: application/json"
```

Los requests sin un token válido se rechazan con `401 Unauthorized`.

---

## Scopes

Cuando generás un token elegís qué puede hacer. Los scopes mantienen los tokens con el mínimo privilegio: dale a un script de solo lectura únicamente `api:read`, y reservá `api:write` para integraciones que realmente necesiten modificar datos.

| Scope | Qué permite |
|-------|-------------|
| **`api:read`** | Acceso de solo lectura. Listar y ver cuentas, categorías, transacciones, presupuestos, reportes y tags. |
| **`api:write`** | Acceso de lectura y escritura. Todo lo que permite `api:read`, más crear, actualizar y eliminar datos. |

Un token con solo `api:read` será rechazado (`403 Forbidden`) si intenta modificar datos.

---

## ¿Y el usuario y contraseña?

Iniciar sesión con **email y contraseña es un flujo first-party solo para la app** — **no** es un método de integración.

El inicio de sesión, el registro y el restablecimiento de contraseña se manejan mediante páginas renderizadas en el servidor en [auth.finerdy.app](https://auth.finerdy.app), no mediante endpoints de la API. Como desarrollador externo nunca enviás credenciales a la API y no usás esas páginas para integrar. Siempre te autenticás con un token de acceso personal.

---

## Seguridad

Tratá tu token como una contraseña:

- **Mantenelo secreto.** Nunca lo subas a un repositorio público, lo pegues en un documento compartido ni lo expongas en código del lado del cliente que corra en un navegador.
- **Guardalo de forma segura.** Usá una variable de entorno o un gestor de secretos, no una cadena hardcodeada.
- **Usá el scope más acotado.** Si un token solo necesita leer, dale solo `api:read`.
- **Usá un token por integración.** Así podés revocar uno solo sin romper los demás.

### Revocar un token

Si un token se filtra o ya no lo necesitás, revocalo desde **Perfil → API Tokens** en la app. La revocación es inmediata: cualquier request que use ese token empieza a fallar con `401 Unauthorized`. Generá un token nuevo para la integración que siga necesitando acceso.

---

## Resumen

| Tema | Detalle |
|------|---------|
| **URL base de la API** | `https://api.finerdy.app` |
| **Referencia de endpoints** | [api.finerdy.app/docs/api](https://api.finerdy.app/docs/api) |
| **Método de auth** | Token de acceso personal (Bearer) |
| **Header** | `Authorization: Bearer <token>` |
| **Scopes** | `api:read`, `api:write` |
| **Obtener un token** | App → Perfil → API Tokens → Generar (se muestra una vez) |
| **Revocar un token** | App → Perfil → API Tokens |
| **Email + contraseña** | Solo login first-party de la app — no es método de integración |
