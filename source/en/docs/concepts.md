---
extends: _layouts.docs
section: content
language: en
title: Basic concepts
description: Accounts, categories, and reference currency in Finerdy
---

# Basic concepts

Before you start using Finerdy, it's important to understand the fundamental concepts that organize your finances.

## Accounts

An **account** represents any place where you keep money:

- Bank accounts (checking, savings)
- Digital wallets (PayPal, Wise, Venmo)
- Cash
- Cryptocurrencies
- Investments

### Account properties

Each account has:

- **Name** - How you identify it (e.g., "Chase Bank", "Cash USD")
- **Currency** - The currency it operates in (USD, EUR, ARS, etc.)
- **Balance** - The current balance, automatically calculated from transactions

### Supported currencies

Finerdy supports the following currencies:

| Code | Currency |
|------|----------|
| USD | US Dollar |
| EUR | Euro |
| GBP | British Pound |
| ARS | Argentine Peso |
| BRL | Brazilian Real |
| MXN | Mexican Peso |
| CLP | Chilean Peso |
| COP | Colombian Peso |
| CAD | Canadian Dollar |
| AUD | Australian Dollar |
| CHF | Swiss Franc |
| JPY | Japanese Yen |
| CNY | Chinese Yuan |

### Important notes about accounts

- An account can only have **one currency**.
- The balance is **automatically calculated** by summing all transactions.
- You cannot change an account's currency after creating it (you'd need to create a new one).

---

## Categories

**Categories** organize your transactions by type of income or expense.

### Category types

Each category belongs to a transaction type:

| Type | Use |
|------|-----|
| **Income** | Money coming in (Salary, Sales, Freelance) |
| **Expense** | Money going out (Groceries, Utilities, Transportation) |

Transfers and currency exchanges don't use categories.

### Category examples

**For income:**
- Salary
- Freelance
- Sales
- Investments
- Other income

**For expenses:**
- Groceries
- Utilities (electricity, gas, internet)
- Transportation
- Entertainment
- Health
- Education

### Tips for categories

- Don't create too many categories. 10-15 is usually enough.
- Categories are per workspace, so each context can have its own.
- You can create new categories at any time.

---

## Categories vs Tags

**Categories** and **tags** are two complementary ways to organize your transactions, but they work differently.

### Categories: vertical classification

Categories function as a **vertical classification**: each transaction belongs to a single category. It's an exclusive organization.

```
Categories
├── Food
├── Transportation
├── Utilities
└── Entertainment
```

If you buy something at the grocery store, it goes in the "Food" category. It can't be in two categories at once.

### Tags: cross-cutting grouping

Tags function as a **cross-cutting grouping**: they can span multiple categories. A transaction can have multiple tags.

```
Tag "vacation-2025"
├── Hotel (category: Lodging)
├── Restaurant (category: Food)
├── Flight (category: Transportation)
└── Tour (category: Entertainment)
```

All these expenses share the "vacation-2025" tag, even though each has its own category.

### Practical example

Imagine you want to track expenses for a trip to Miami:

| Expense | Category | Tags |
|---------|----------|------|
| Hotel | Lodging | vacation, miami-2025 |
| Uber to airport | Transportation | vacation, miami-2025 |
| Restaurant dinner | Food | vacation, miami-2025 |
| Museum entry | Entertainment | vacation, miami-2025 |

With **categories**, you can see how much you spend on food overall (including your daily life and vacations).

With **tags**, you can filter "miami-2025" and see the total trip cost, regardless of which categories the expenses fell into.

### When to use each

| Need | Use |
|------|-----|
| Classify an expense by type | Category |
| Group expenses for a project or event | Tag |
| See totals by category (food, transportation) | Category |
| See totals by context (vacation, work) | Tag |
| Monthly reports by expense type | Category |
| Track a specific goal | Tag |

---

## Reference currency

The **reference currency** (or base currency) is Finerdy's most important concept.

### What is it?

It's the currency in which you want to see all your consolidated reports. When you have accounts in different currencies, Finerdy converts everything to your reference currency so you can see:

- Your total net worth
- How much you earned this month (summing income in different currencies)
- How much you spent (summing expenses in different currencies)

### How does it work?

1. When creating a workspace, you choose your reference currency.
2. Each transaction stores two values:
   - The **original amount** in the account's currency
   - The **reference amount** converted to your base currency
3. Reports use the reference amount to sum everything.

### Practical example

Let's say your reference currency is USD:

```
Expense 1: 100 EUR (euro account)
  → Converted: 108 USD (at that day's exchange rate)

Expense 2: 50 USD (dollar account)
  → Converted: 50 USD

Expense 3: 10,000 ARS (peso account)
  → Converted: 10 USD (at that day's exchange rate)

Month total: 168 USD
```

### Exchange rates

Finerdy gets exchange rates from:

- **Frankfurter** - For major currencies (EUR, GBP, etc.)
- **DolarAPI** - For the Argentine peso (uses the blue dollar rate)

Exchange rates are automatically updated and saved for historical reports.

### Can I change my reference currency?

The reference currency is defined when creating the workspace and **cannot be changed** afterward. This is intentional: changing it would require recalculating all historical transactions with exchange rates that might not be available.

If you need a different reference currency, create a new workspace.

---

## Next steps

Now that you understand the basic concepts, learn about the different [transaction types](/en/docs/transactions/).
