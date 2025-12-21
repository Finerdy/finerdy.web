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
