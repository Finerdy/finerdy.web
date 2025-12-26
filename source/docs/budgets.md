---
extends: _layouts.docs
section: content
language: en
title: Budgets
description: Budgets in Finerdy - Spending control with filters by category and tags
---

# Budgets

Budgets help you control how much you spend. Set a limit and Finerdy shows you how much you've spent based on your defined filters.

## What is a budget?

A **budget** is a spending limit based on filters (categories and/or tags) over a period of time.

### Example

```
Budget: Groceries
Filters: Categories [Food, Supermarket] + Tags [#essential]
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
| **Description** | Optional explanation of what the budget covers |
| **Filters** | Categories and/or tags that determine which expenses count |
| **Amount** | Maximum limit in your reference currency |
| **Period** | How often it resets |

---

## Budget filters

Filters determine which expenses count toward your budget. You can combine categories and tags for flexible tracking.

### Filter options

| Filter | Description |
|--------|-------------|
| **Categories** | One or more expense categories |
| **Tags** | One or more tags |
| **Exclude transfers** | Whether to exclude transfer-related transactions (default: yes) |

@component('_partials.callout', ['type' => 'info', 'title' => 'Requirement'])
At least one category OR one tag is required. You can use both together for more precise tracking.
@endcomponent

### How filters work

Filters use the following logic:

- **Within categories**: OR - matches any of the selected categories
- **Within tags**: OR - matches any of the selected tags
- **Between categories and tags**: AND - if both are defined, the expense must match at least one category AND have at least one tag

```
Budget: Food & Dining
Filters:
  Categories: [Groceries, Restaurants]
  Tags: [] (empty)

This budget will include:
- Any expense in "Groceries" OR "Restaurants" category
```

```
Budget: Project expenses
Filters:
  Categories: [Travel, Software]
  Tags: [#project-alpha]

This budget will include:
- Expenses in "Travel" or "Software" category
  AND tagged with #project-alpha
```

@component('_partials.callout', ['type' => 'warning', 'title' => 'Important'])
If you want OR logic between categories and tags, create separate budgets or use only one filter type.
@endcomponent

### Filter examples

**Category-only budget:**
```
Budget: Entertainment
Filters:
  Categories: [Movies, Games, Streaming]
  Tags: []
```

**Tag-only budget:**
```
Budget: Project Alpha expenses
Filters:
  Categories: []
  Tags: [#project-alpha]
```

**Combined filters:**
```
Budget: Monthly essentials
Filters:
  Categories: [Groceries, Utilities, Transport]
  Tags: [#essential, #recurring]
```

---

## Available periods

Finerdy supports **6 types of periods**:

| Period | Description | When it resets |
|--------|-------------|----------------|
| **Weekly** | For weekly expenses | Every 7 days from anchor date |
| **Biweekly** | For those who get paid every 2 weeks | Every 14 days from anchor date |
| **Semimonthly** | For twice-a-month tracking | The 1st and 16th of each month |
| **Monthly** | For recurring monthly expenses | Same day each month |
| **Quarterly** | For less frequent expenses | Every 3 months |
| **Once** | For one-time expenses | Never (fixed dates) |

### Monthly period

The most common. Uses the anchor date to determine when the period starts.

```
Budget: Entertainment - 200 USD/month
Anchor: January 15

Period 1: Jan 15 - Feb 14
Period 2: Feb 15 - Mar 14
Period 3: Mar 15 - Apr 14
```

### Weekly / Biweekly periods

Use the anchor date as the starting point.

```
Budget: Daily expenses - 300 USD/biweekly
Anchor: January 1

Jan 1-14: maximum 300 USD
Jan 15-28: maximum 300 USD (resets)
Jan 29 - Feb 11: maximum 300 USD (resets)
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

The budget automatically sums all expenses that:

1. Match **any** of the budget's filter categories OR have **any** of the filter tags
2. Are of type **expense**
3. Occurred within the **current period**
4. Are not transfers (if "exclude transfers" is enabled)

### Important

- Uses the **reference amount** (in your workspace's base currency)
- Expenses are matched automatically based on filters
- No manual assignment needed - if an expense matches the filters, it counts

### Automatic expense matching

Unlike the old system, you don't need to manually assign expenses to budgets. Finerdy automatically detects matching expenses:

```
Budget: Groceries
Filters: Categories [Food, Supermarket]

When you record:
  Account: Credit Card
  Amount: 50 USD
  Category: Food  ← Matches budget filter!

This expense automatically counts toward "Groceries" budget.
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
220 USD of 200 USD                    Exceeded by 20 USD
```

---

## Exceeding the budget

When you spend more than the limit:

- The percentage goes over 100%
- Finerdy shows you a visual alert
- The expense is still recorded normally

Budgets are **informational**, they don't block transactions.

---

## Editing budget filters

When you change a budget's filters:

- The spending is **recalculated immediately** based on the new filters
- All matching expenses within the current period are included
- No synchronization needed - it's automatic

@component('_partials.callout', ['type' => 'info', 'title' => 'Example'])
You have a "Monthly Groceries" budget with filter [Food category]. It shows 500 USD spent.

You add [Supermarket category] to the filters.

The budget immediately recalculates and now shows 650 USD spent (including all Food + Supermarket expenses).
@endcomponent

---

## API Example: Creating a Budget with Filters

```http
POST /budgets
Content-Type: application/json

{
  "name": "Monthly Food",
  "description": "All food-related expenses",
  "filters": {
    "categories": [1, 2, 3],
    "tags": [5, 8],
    "exclude_transfers": true
  },
  "amount": 500,
  "period": "monthly",
  "anchor_date": "2025-01-15"
}
```

**Filter options:**
- `categories` - Array of category IDs (at least one required if no tags)
- `tags` - Array of tag IDs (at least one required if no categories)
- `exclude_transfers` - Boolean, defaults to `true`

---

## Archiving budgets

You can **archive** a budget you no longer use:

- It disappears from the active list
- History is preserved
- You can unarchive it whenever you want

Useful for one-time period budgets that have ended.

---

## Budget tips

1. **Use filters wisely**: Combine categories and tags for precise tracking without creating too many budgets.

2. **Start simple**: Create 3-5 budgets for your main expenses.

3. **Be realistic**: Base it on what you actually spend, not what you "should" spend.

4. **Review and adjust**: If you always exceed it, maybe the limit is too low.

5. **Use tags for projects**: Track project expenses across categories with a single tag-based budget.

6. **Use once period for goals**: Vacation savings, big purchases, etc.

---

## Next steps

Learn how to organize your finances in different contexts with [Workspaces](/en/docs/workspaces/).
