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
| **Timezone** | The timezone for reports and date filters |

### Important about currency

The reference currency **cannot be changed** after creating the workspace. Choose wisely from the start.

---

## Timezones

Finerdy handles two different timezones to give you flexibility and consistency.

### User timezone vs workspace timezone

| Timezone | Used for | Configured in |
|----------|----------|---------------|
| **User timezone** | Creating/editing transactions, displaying dates in UI | Your profile settings |
| **Workspace timezone** | Reports, date filters, budget period calculations | Workspace settings |

### Why two timezones?

The **user timezone** is personal. Each user sees dates formatted in their local time when viewing transactions.

The **workspace timezone** is shared. It ensures all collaborators see the same date cutoffs in reports and filters, regardless of where they are.

### Practical example

Imagine a workspace shared between two people:

```
User A: Mexico City (UTC-6)
User B: Madrid (UTC+1)
Workspace timezone: Buenos Aires (UTC-3)
```

When both request "January transactions":

- **They see the same transactions** - because the workspace timezone (Buenos Aires) determines what "January" means
- **But each sees dates in their own format** - User A sees times in Mexico City time, User B sees them in Madrid time

### When it matters

Without a shared workspace timezone, the same query could return different results:

```
Query: "January 2024 transactions"

User A in Mexico (UTC-6):
  January = Dec 31 18:00 UTC to Jan 31 18:00 UTC

User B in Spain (UTC+1):
  January = Dec 31 23:00 UTC to Jan 31 23:00 UTC
```

With a workspace timezone, both users see identical data because "January" is defined by the workspace (Buenos Aires), not their personal location.

### Default behavior

- If you don't set a workspace timezone, it defaults to UTC
- The user timezone affects how you see dates, not how data is filtered
- Budget periods always use the workspace timezone for consistency

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
4. Click "Invite"

The person will receive an email with a link to join. They have 7 days to accept before the invitation expires.

### If they don't receive the email

You can resend the invitation from workspace settings. This also extends the expiration time.

### If you change your mind

You can cancel a pending invitation anytime from workspace settings.

### When someone receives your invitation

They click the link in the email, log in (or create an account), and accept or decline. Once accepted, the workspace appears in their workspace list.

### Important

- Only the **Owner** can invite users
- You can change someone's role or remove them later

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
| **User timezone** | Personal setting for date display and transaction entry |
| **Workspace timezone** | Shared setting for reports and date filters |
| **Owner** | Owner with full control |
| **Member** | Can view and modify |
| **Viewer** | Can only view |

---

That's it! You now know how Finerdy works. Start recording your transactions and take control of your finances.
