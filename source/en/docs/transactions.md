---
extends: _layouts.docs
section: content
language: en
title: Transactions
description: Transaction types in Finerdy - income, expenses, transfers, exchanges, and corrections
---

# Transactions

Transactions are the heart of Finerdy. Every money movement is recorded as a transaction.

## Transaction types

Finerdy has **5 types** of transactions, each with a specific purpose:

| Type | Description | Affects balance |
|------|-------------|-----------------|
| **Income** | Money entering an account | + |
| **Expense** | Money leaving an account | - |
| **Transfer** | Moving money between accounts of the same currency | +/- |
| **Exchange** | Converting money between accounts of different currencies | +/- |
| **Correction** | Manual balance adjustment | +/- |

---

## Income

An **income** represents money entering an account.

### When to use it

- You receive your salary
- You get paid for freelance work
- You sell something
- You receive a refund
- Investment returns

### Fields

- **Account** - Where the money goes
- **Amount** - How much you received
- **Category** - Type of income (Salary, Sales, etc.)
- **Description** - Optional details
- **Date** - When it happened

### Example

```
Type: Income
Account: Chase Bank (USD)
Amount: 2,500.00 USD
Category: Salary
Description: January 2025 paycheck
Date: 2025-01-05
```

---

## Expense

An **expense** represents money leaving an account.

### When to use it

- You buy something
- You pay for a service
- You pay taxes
- Any money outflow

### Fields

- **Account** - Where the money comes from
- **Amount** - How much you spent
- **Category** - Type of expense (Groceries, Utilities, etc.)
- **Description** - Optional details
- **Date** - When it happened
- **Budget** - Optional, to track against a budget

### Example

```
Type: Expense
Account: Credit Card (USD)
Amount: 150.00 USD
Category: Groceries
Description: Weekly shopping
Date: 2025-01-10
```

---

## Transfer

A **transfer** moves money between two accounts of the **same currency**.

### When to use it

- You move money from checking to savings
- You transfer cash to a digital wallet
- Any internal movement without currency change

### How it works

A transfer creates **two linked transactions**:
1. A negative transaction in the source account
2. A positive transaction in the destination account

### Fields

- **Source account** - Where the money comes from
- **Destination account** - Where the money goes (same currency)
- **Amount** - How much you're transferring
- **Description** - Optional details
- **Date** - When it happened

### Example

```
Type: Transfer
Source account: Chase Bank (USD)
Destination account: Wise (USD)
Amount: 500.00 USD
Description: Fund Wise
Date: 2025-01-15

Result:
  - Chase Bank: -500 USD
  - Wise: +500 USD
```

### Important

- Both accounts must have the **same currency**.
- If currencies are different, use an **Exchange** instead of a transfer.

---

## Currency exchange

An **exchange** converts money from one currency to another.

### When to use it

- You buy dollars with pesos
- You sell euros to get dollars
- Any conversion between currencies

### How it works

An exchange creates **two linked transactions**:
1. A negative transaction in the source account (currency A)
2. A positive transaction in the destination account (currency B)

It also records the **exchange difference** if your actual rate differs from the market rate.

### Fields

- **Source account** - Where the money comes from
- **Source amount** - How much you're selling
- **Destination account** - Where the money goes (different currency)
- **Destination amount** - How much you receive
- **Description** - Optional details
- **Date** - When it happened

### Example

```
Type: Exchange
Source account: Cash ARS
Source amount: 100,000.00 ARS
Destination account: Cash USD
Destination amount: 105.00 USD
Description: Blue dollar purchase
Date: 2025-01-20

Implied exchange rate: 952.38 ARS/USD

Result:
  - Cash ARS: -100,000 ARS
  - Cash USD: +105 USD
```

### Exchange difference

If the exchange rate you got is better or worse than the market rate, Finerdy calculates the **exchange difference**:

- **Gain**: You got more than expected
- **Loss**: You got less than expected

This difference appears in your reports.

---

## Correction

A **correction** adjusts an account's balance without a category.

### When to use it

- You find a difference between Finerdy's balance and the real one
- You need to adjust for an error
- Initial balance for an account

### Fields

- **Account** - The account to adjust
- **Amount** - The adjustment (positive or negative)
- **Description** - Reason for the adjustment
- **Date** - When to apply it

### Example

```
Type: Correction
Account: Cash (USD)
Amount: +50.00 USD
Description: Cash count adjustment
Date: 2025-01-25
```

### Important

- Corrections **don't have a category**.
- They don't affect income/expense reports.
- Use them only when necessary.

---

## Common fields

All transactions have these fields:

| Field | Description |
|-------|-------------|
| **Date** | When the transaction occurred |
| **Description** | Free text for details |
| **Attachments** | You can attach receipts (images, PDFs) |
| **Created by** | User who recorded the transaction |

---

## Next steps

Now that you understand transaction types, learn about [Reports](/en/docs/reports/) to analyze your finances.
