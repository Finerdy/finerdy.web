---
extends: _layouts.docs
section: content
language: en
title: Workspaces
description: Workspaces in Finerdy - Separate spaces for different financial contexts
---

# Workspaces

Workspaces let you separate your finances into different contexts. You can have one for your personal expenses, another for family expenses, and another for your business.

## What is a workspace?

A **workspace** is an isolated space with its own:

- Accounts
- Categories
- Transactions
- Budgets
- Reference currency

Each workspace is independent. What you record in one doesn't affect the others.

---

## Why use multiple workspaces?

### Personal vs family finances

```
Workspace: Personal
  - Account: Personal bank
  - Categories: Gym, Hobbies, Going out
  - Reference currency: USD

Workspace: Family
  - Account: Joint account
  - Categories: Groceries, School, Home
  - Reference currency: USD
```

### Independent business

```
Workspace: Freelance
  - Account: Wise (USD)
  - Account: PayPal (USD)
  - Categories: Client income, Software, Taxes
  - Reference currency: USD
```

### Different base currencies

```
Workspace: Argentina
  - Reference currency: ARS
  - Reports in pesos

Workspace: International
  - Reference currency: USD
  - Reports in dollars
```

---

## Creating a workspace

When creating a workspace you define:

| Field | Description |
|-------|-------------|
| **Name** | Identifier (e.g., "Personal", "Family") |
| **Reference currency** | The currency for your reports |

### Important about currency

The reference currency **cannot be changed** after creating the workspace. Choose wisely from the start.

---

## Collaboration

Workspaces allow you to **share finances** with other people.

### Available roles

| Role | Permissions |
|------|-------------|
| **Owner** | Full control. Can invite, edit settings, delete |
| **Member** | Can create and edit transactions, accounts, categories |
| **Viewer** | Can only view. Cannot modify anything |

### Use cases

**Couple sharing expenses:**
- Both as **Member**
- Each records their expenses
- Both see the reports

**Accountant reviewing:**
- Client as **Owner**
- Accountant as **Viewer**
- Views reports without being able to modify

---

## Inviting users

To invite someone to your workspace:

1. Go to workspace settings
2. Enter the person's email
3. Choose the role (Member or Viewer)
4. The person receives an invitation

### Important

- Only the **Owner** can invite users
- The invitee needs to create an account if they don't have one
- You can change roles or remove users later

---

## Switching between workspaces

You can switch workspaces at any time from the app menu.

```
┌─ Current workspace ────────────┐
│ 👤 Personal           ✓       │
│ 👥 Family                     │
│ 💼 Freelance                  │
└────────────────────────────────┘
```

Each time you switch, you see that workspace's accounts, categories, and transactions.

---

## Data isolation

Data in each workspace is **completely isolated**:

| Element | Shared between workspaces? |
|---------|---------------------------|
| Accounts | No |
| Categories | No |
| Transactions | No |
| Budgets | No |
| Reports | No |
| Exchange rates | Yes (they're global) |

### Why does it matter?

- A "Chase Bank" account in the Personal workspace is different from one in Family
- You can have categories with the same name but different in each workspace
- Reports only show data from the active workspace

---

## Default workspace

When you register, Finerdy automatically creates your first workspace. This is your **default workspace**.

You can:
- Rename it
- Create other workspaces
- Keep using just one if you don't need to separate contexts

---

## Deleting a workspace

Only the **Owner** can delete a workspace.

**Warning**: Deleting a workspace **permanently** deletes:
- All accounts
- All transactions
- All categories
- All budgets
- All collaborator access

This action cannot be undone.

---

## Workspace tips

1. **Start with one**: Don't create multiple workspaces until you really need to.

2. **Think about currency**: What currency do you want to see your reports in? That defines the workspace.

3. **Clear separation**: If you mix personal with business, consider separating them.

4. **Invite carefully**: A **Member** can modify everything. Use **Viewer** if they only need to see.

5. **Don't duplicate**: If you only use an account personally, don't create it in the family workspace.

---

## Summary

| Concept | Description |
|---------|-------------|
| **Workspace** | Isolated space with its own data |
| **Reference currency** | Defined at creation, cannot be changed |
| **Owner** | Owner with full control |
| **Member** | Can view and modify |
| **Viewer** | Can only view |

---

That's it! You now know how Finerdy works. Start recording your transactions and take control of your finances.
