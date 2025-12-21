---
extends: _layouts.docs
section: content
language: en
title: Reports
description: Reports in Finerdy - Balance sheet and Income statement
---

# Reports

Reports are where Finerdy shines. Here you can see your consolidated finances, with all currencies converted to your reference currency.

## Report types

Finerdy offers two main reports:

| Report | What it shows |
|--------|---------------|
| **Balance sheet** | Your net worth at a specific date |
| **Income statement** | Income and expenses over a period |

---

## Balance sheet

The **balance sheet** shows how much you have in total at a specific date.

### What does it show?

- List of all your accounts with their balances
- Each balance in its original currency AND converted to your reference currency
- Accumulated exchange differences
- **Net total** in your reference currency

### Example

```
Balance as of 01/31/2025
Reference currency: USD

ACCOUNTS
─────────────────────────────────────────
Chase Bank (USD)        2,500.00 USD     2,500.00 USD
Wise (EUR)                800.00 EUR       864.00 USD
Cash (ARS)            150,000.00 ARS       157.89 USD
─────────────────────────────────────────
Subtotal                                 3,521.89 USD

Exchange differences                        +12.50 USD
─────────────────────────────────────────
NET WORTH                                3,534.39 USD
```

### How it's calculated

1. For each account, sum all transactions up to the specified date
2. If the account is in another currency, convert at that date's exchange rate
3. Sum the exchange differences from all exchange operations
4. Total = Sum of balances + Exchange differences

### Filters

- **Date**: You can view the balance at any past date

---

## Income statement

The **income statement** shows how much you earned and spent over a period.

### What does it show?

- Income by category
- Expenses by category
- Exchange differences for the period
- **Net result** (profit or loss)

### Example

```
Income Statement
January 2025
Reference currency: USD

INCOME
─────────────────────────────────────────
Salary                               2,500.00 USD
Freelance                              350.00 USD
─────────────────────────────────────────
Total income                         2,850.00 USD

EXPENSES
─────────────────────────────────────────
Groceries                              280.00 USD
Utilities                              150.00 USD
Transportation                          85.00 USD
Entertainment                          120.00 USD
─────────────────────────────────────────
Total expenses                         635.00 USD

─────────────────────────────────────────
Operating result                     2,215.00 USD

Exchange differences                   +12.50 USD
─────────────────────────────────────────
NET RESULT                           2,227.50 USD
```

### How it's calculated

1. Take all income and expense transactions from the period
2. Use the **reference amount** (already converted to your base currency)
3. Group by category
4. Sum exchange differences from exchange operations in the period
5. Result = Income - Expenses + Exchange differences

### Filters

- **From**: Period start date
- **To**: Period end date

---

## Reference amount

A key concept for understanding reports is the **reference amount**.

### What is it?

Each transaction stores two amounts:

1. **Original amount**: In the account's currency
2. **Reference amount**: Converted to your base currency

### When is it calculated?

The reference amount is calculated **when the transaction is created**, using that day's exchange rate.

### Example

```
Transaction:
  Expense of 100 EUR
  Date: 01/15/2025
  EUR/USD exchange rate that day: 1.08

Original amount: 100.00 EUR
Reference amount: 108.00 USD
```

### Why does it matter?

This means reports reflect **historical** exchange rates, not current ones. This is correct for accounting: a 100 EUR expense in January shouldn't change in value just because the euro went up in March.

---

## Exchange differences

**Exchange differences** appear when you make a currency exchange and the rate you got differs from the market rate.

### Example

```
Exchange: 100,000 ARS → USD
Market exchange rate: 950 ARS/USD (you'd expect 105.26 USD)
What you received: 110 USD
Difference: +4.74 USD (gain)
```

### In reports

- **Balance sheet**: Shows the total accumulated exchange differences
- **Income statement**: Shows exchange differences for the period

---

## Tips for reports

1. **Review monthly**: The monthly income statement gives you a good picture of how you're doing.

2. **Compare periods**: Look at the same month from the previous year to see trends.

3. **Watch exchange differences**: If they're very large, it might indicate you're buying/selling currency at unfavorable times.

4. **Balance is your current snapshot**: Use it to know your real net worth.

---

## Next steps

Learn to control your spending with [Budgets](/en/docs/budgets/).
