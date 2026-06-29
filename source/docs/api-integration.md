---
extends: _layouts.docs
section: content
language: en
title: API & Integrations
description: Authenticate with the Finerdy API using personal access tokens and integrate your own apps
---

# API & Integrations

Finerdy has a **public API**, so you can build your own integrations on top of your financial data. Connect a spreadsheet, a custom dashboard, a script that imports transactions, or any third-party tool you like.

This page explains how to authenticate as an external developer. The complete endpoint reference lives in the [API Docs](https://api.finerdy.app/docs/api#/).

## Base URL

Every API request goes to:

```
https://api.finerdy.app
```

The full, always up-to-date reference of every endpoint, parameter, and response is published at:

```
https://api.finerdy.app/docs/api
```

That reference is public on purpose — you don't need an account to read it.

---

## Authentication: personal access tokens

External integrations authenticate **only with personal access tokens** generated from the app. There is no username-and-password flow for the API.

A **personal access token** is a long, secret string that identifies you and grants access to your data. You send it with every request.

### How to get a token

1. Log in to the app at [app.finerdy.app](https://app.finerdy.app).
2. Open **Profile → API Tokens**.
3. Click **Generate token**, give it a name (e.g., "Spreadsheet import"), and choose its scopes.
4. **Copy the token immediately.** It's shown **only once** — once you close the dialog you can't see it again.

If you lose a token, you can't recover it. Just revoke it and generate a new one.

### How to authenticate requests

Send the token in the `Authorization` header as a Bearer token on every request:

```
Authorization: Bearer <your-token>
```

A complete example with `curl`:

```bash
curl https://api.finerdy.app/api/transactions \
  -H "Authorization: Bearer 38|OT6JgUfXk8HW90xWuikvRZX6Lwg9rGpd3SYRqt0W29f2c48c" \
  -H "Accept: application/json"
```

Requests without a valid token are rejected with `401 Unauthorized`.

---

## Scopes

When you generate a token you choose what it's allowed to do. Scopes keep tokens least-privileged: give a read-only script only `api:read`, and reserve `api:write` for integrations that actually need to make changes.

| Scope | What it allows |
|-------|----------------|
| **`api:read`** | Read-only access. List and view accounts, categories, transactions, budgets, reports, and tags. |
| **`api:write`** | Read and write access. Everything `api:read` allows, plus creating, updating, and deleting data. |

A token granted only `api:read` will be rejected (`403 Forbidden`) if it tries to modify data.

---

## What about username and password?

Logging in with **email and password is a first-party flow for the app only** — it is **not** an integration method.

Sign-in, sign-up, and password reset are handled by server-rendered pages at [auth.finerdy.app](https://auth.finerdy.app), not by API endpoints. As an external developer you never send credentials to the API and you don't use those pages to integrate. You always authenticate with a personal access token.

---

## Security

Treat your token like a password:

- **Keep it secret.** Never commit it to a public repository, paste it into a shared document, or expose it in client-side code that runs in a browser.
- **Store it safely.** Use an environment variable or a secrets manager, not a hard-coded string.
- **Use the narrowest scope.** If a token only needs to read, give it `api:read` only.
- **Use one token per integration.** That way you can revoke a single one without breaking the others.

### Revoking a token

If a token is leaked or no longer needed, revoke it from **Profile → API Tokens** in the app. Revocation is immediate: any request using that token starts failing with `401 Unauthorized`. Generate a fresh token for the integration that still needs access.

---

## Summary

| Topic | Detail |
|-------|--------|
| **API base URL** | `https://api.finerdy.app` |
| **Endpoint reference** | [api.finerdy.app/docs/api](https://api.finerdy.app/docs/api) |
| **Auth method** | Personal access token (Bearer) |
| **Header** | `Authorization: Bearer <token>` |
| **Scopes** | `api:read`, `api:write` |
| **Get a token** | App → Profile → API Tokens → Generate (shown once) |
| **Revoke a token** | App → Profile → API Tokens |
| **Email + password** | First-party app login only — not an integration method |
