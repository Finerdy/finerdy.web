---
extends: _layouts.docs
section: content
language: en
title: Budgets
description: Budgets in Finerdy - Spending control by category and period
---

# Budgets

Budgets help you control how much you spend in each category. Set a limit and Finerdy shows you how much you've spent.

## What is a budget?

A **budget** is a spending limit for a specific category over a period of time.

### Example

```
Budget: Groceries
Amount: 500 USD
Period: Monthly

January 2025:
  Spent: 320 USD (64%)
  Available: 180 USD
```

---

## Creating a budget

To create a budget you need to define:

| Field | Description |
|-------|-------------|
| **Name** | Budget identifier |
| **Category** | The expense category to control |
| **Amount** | Maximum limit in your reference currency |
| **Period** | How often it resets |

---

## Available periods

Finerdy supports **5 types of periods**:

| Period | Description | When it resets |
|--------|-------------|----------------|
| **Monthly** | For recurring monthly expenses | The 1st of each month |
| **Biweekly** | For those who get paid every 15 days | The 1st and 16th of each month |
| **Quarterly** | For less frequent expenses | Every 3 months |
| **Yearly** | For annual expenses | January 1st |
| **Once** | For one-time expenses | Never (fixed dates) |

### Monthly period

The most common. Automatically resets on the first day of each month.

```
Budget: Entertainment - 200 USD/month

January: 0 → spend → 150 USD → Feb 1 resets → 0
February: 0 → spend → 180 USD → Mar 1 resets → 0
```

### Biweekly period

Ideal if you get paid biweekly. Splits into:
- **First half**: 1st to 15th
- **Second half**: 16th to end of month

```
Budget: Daily expenses - 300 USD/biweekly

Jan 1-15: maximum 300 USD
Jan 16-31: maximum 300 USD (resets)
```

### Once period

For non-repeating expenses, like a trip or big purchase.

```
Budget: Summer vacation
Amount: 2,000 USD
From: Dec 1, 2024
To: Jan 31, 2025
```

---

## How spending is calculated

The budget sums all expenses that:

1. Belong to the budget's **category**
2. Are **specifically assigned** to that budget
3. Occurred within the **current period**

### Important

- Uses the **reference amount** (in your base currency)
- Only counts expenses assigned to the budget
- Doesn't automatically sum all expenses in the category

### Assigning expenses to a budget

When recording an expense, you can choose which budget to assign it to:

```
New expense:
  Account: Credit Card
  Amount: 50 USD
  Category: Groceries
  Budget: [Monthly groceries] ← optional
```

---

## Budget tracking

Finerdy shows you in real time:

| Metric | Description |
|--------|-------------|
| **Spent** | Total spent in current period |
| **Available** | How much is left (Amount - Spent) |
| **Percentage** | What percentage of budget you've used |
| **Status** | Whether you're within or over budget |

### Visual example

```
Groceries                             ████████░░░░ 64%
320 USD of 500 USD                    180 USD available

Entertainment                         ██████████████ 110%
220 USD of 200 USD                    ⚠️ Exceeded by 20 USD
```

---

## Exceeding the budget

When you spend more than the limit:

- The percentage goes over 100%
- Finerdy shows you a visual alert
- The expense is still recorded normally

Budgets are **informational**, they don't block transactions.

---

## Changing a Budget's Category

When you change the category of a budget, you need to decide what happens to the transactions already linked to that budget.

### Category Synchronization Options

Finerdy gives you **three options** when changing a budget's category:

| Option | What happens | When to use |
|--------|-------------|-------------|
| **No sync (none)** | Only the budget category changes, transactions keep their original categories | When you want to reorganize budgets without affecting historical data |
| **Future only (future)** | Only transactions dated today or later will update to the new category | When you want past data unchanged but future expenses to use the new category |
| **All transactions (all)** | All transactions linked to this budget update to the new category | When you're fixing a categorization mistake or consolidating categories |

### How it works

1. Go to the budget you want to edit
2. Change the **Category** field
3. A modal appears asking: **"Do you want to update the category for linked transactions?"**
4. Choose one of the three options:
   - **No sync**: Keep transactions as they are
   - **Future only**: Update only transactions from today forward
   - **All transactions**: Update all linked transactions
5. Save

@component('_partials.callout', ['type' => 'info', 'title' => 'Example'])
You have a "Monthly Groceries" budget linked to the "Food" category with 50 transactions. You decide to change it to "Groceries" category.

- **No sync**: Budget uses "Groceries", but those 50 transactions still show as "Food"
- **Future only**: Budget uses "Groceries", past transactions stay "Food", new ones will be "Groceries"
- **All transactions**: Budget and all 50 transactions now use "Groceries"
@endcomponent

### When to use each option

**No sync (none):**
- You're reorganizing budgets for the future but don't want to change reports
- The old category still makes sense for historical data

**Future only (future):**
- You're changing your budget structure mid-period
- You want clean historical reports but a new organization going forward

**All transactions (all):**
- You made a mistake and assigned expenses to the wrong category
- You're consolidating duplicate categories
- You want all budget-related expenses to show under the same category in reports

@component('_partials.callout', ['type' => 'warning', 'title' => 'Important'])
Changing transaction categories affects your reports. If you use "All transactions," your historical category totals will change retroactively.
@endcomponent

---

## API Example: Changing Category with Sync

```http
PUT /budgets/{id}
Content-Type: application/json

{
  "category_id": 456,
  "sync_transactions": "all"
}
```

**Sync options:**
- `"none"` - No synchronization
- `"future"` - Sync transactions from today forward
- `"all"` - Sync all linked transactions

---

## Archiving budgets

You can **archive** a budget you no longer use:

- It disappears from the active list
- History is preserved
- You can unarchive it whenever you want

Useful for one-time period budgets that have ended.

---

## Budget tips

1. **Start simple**: Create 3-5 budgets for your main expenses.

2. **Be realistic**: Base it on what you actually spend, not what you "should" spend.

3. **Review and adjust**: If you always exceed it, maybe the limit is too low.

4. **Use once period for goals**: Vacation savings, big purchases, etc.

5. **Not everything needs a budget**: Some expenses are fixed and don't make sense to budget.

---

## Next steps

Learn how to organize your finances in different contexts with [Workspaces](/en/docs/workspaces/).
