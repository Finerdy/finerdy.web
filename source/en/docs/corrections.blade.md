---
extends: _layouts.docs
section: content
language: en
title: Corrections and Checkpoints
description: How to use corrections to adjust balances and understand checkpoints
---

# Corrections and Checkpoints

Corrections are a powerful tool for keeping your accounts in sync with reality. But they have an important effect: **they create a checkpoint** that locks previous history.

---

## What is a correction?

A correction lets you adjust an account's balance when there's a difference between what Finerdy shows and what you actually have.

### When to use it

- You counted your cash and it doesn't match Finerdy
- Your bank statement shows a different balance
- You found transactions you forgot to record
- You want to set the initial balance for a new account

@component('_partials.callout', ['type' => 'info', 'title' => 'Example'])
Finerdy says you have $500 in your wallet, but when you count it, you find $480. You create a correction with the actual balance ($480) and Finerdy adjusts automatically.
@endcomponent

---

## How to create a correction

1. Go to the account you want to correct
2. Tap the **"Correct balance"** button
3. Enter the **actual current balance** (not the difference)
4. Optionally add a description
5. Save

@component('_partials.callout', ['type' => 'warning', 'title' => 'Important'])
The amount you enter is the **total balance** the account should have, not the difference. Finerdy calculates the adjustment automatically.
@endcomponent

---

## Checkpoints: History gets frozen

When you create a correction, Finerdy creates a **checkpoint**. This means all transactions before the correction become **locked**.

### Why do they get locked?

Imagine this scenario:
1. Your account shows $1,000
2. You create a correction adjusting to $950 (you detected $50 was missing)
3. Finerdy now knows that the correct balance at the time of correction is $950

If we allowed editing previous transactions, the correction's balance would no longer make sense. That's why previous transactions get locked.

@component('_partials.callout', ['type' => 'tip', 'title' => 'Think of it this way'])
A correction is like a "snapshot" of the balance at that moment. Everything that happened before gets frozen so that snapshot remains valid.
@endcomponent

---

## Locked transactions

Locked transactions are identified with a **lock icon** in the app.

### What can you do?

| Action | Allowed? |
|--------|----------|
| **View** the transaction | Yes |
| **Edit** the transaction | No |
| **Delete** the transaction | No |

### What if I need to edit a locked transaction?

If you really need to modify history, you have to **delete the correction** that locked it. This will unlock the transactions but you'll also lose the checkpoint.

@component('_partials.callout', ['type' => 'danger', 'title' => 'Be careful'])
Deleting a correction unlocks history but also removes the corrected balance reference. Only do this if you're sure.
@endcomponent

---

## Multiple corrections

You can create multiple corrections on the same account over time. Each correction creates a new checkpoint.

### Rules

- Only the **most recent correction** for each account is editable
- Previous corrections also become locked
- Each correction locks everything before it

### Example

```
January 15: Correction → Balance $1,000 (locks everything before the 15th)
February 28: Correction → Balance $1,500 (locks everything between Jan 15 and Feb 28)
```

Transactions after February 28 remain editable.

---

## Transfers and Exchanges

Transfers and currency exchanges involve **two accounts**. If either account has a checkpoint that affects the transaction, **the entire operation gets locked**.

### Example

You have a transfer from your "Bank" account to your "Cash" account on January 10.

- If "Bank" has a correction from January 15 → The transfer is locked
- If "Cash" has a correction from January 15 → The transfer is also locked
- If neither has a correction → The transfer is editable

@component('_partials.callout', ['type' => 'info', 'title' => 'In the app'])
If a transfer is locked by the destination account, the modal will show a notice indicating that to edit it you need to go to the origin transaction.
@endcomponent

---

## Best practices

### 1. Correct at the end of a period

The best time to make corrections is at the end of a month or period. This way you verify everything is in order and lock history in an organized manner.

### 2. Review carefully before creating the correction

Once created, history gets locked. Make sure all previous transactions are properly recorded.

### 3. Don't use corrections for normal transactions

If you bought something, use an **Expense**. If you received money, use an **Income**. Corrections are only for adjustments when you can't determine which transactions are missing.

### 4. Add a description

When you create a correction, briefly explain why you're making it. Your future self will thank you.

@component('_partials.callout', ['type' => 'tip', 'title' => 'Good description example'])
"Monthly cash count - $50 unidentified difference" is better than just "Adjustment".
@endcomponent

---

## Summary

| Concept | Description |
|---------|-------------|
| **Correction** | Balance adjustment when reality doesn't match Finerdy |
| **Checkpoint** | Reference point that locks previous history |
| **Locked transactions** | Cannot be edited or deleted, only viewed |
| **To unlock** | Delete the correction that created the checkpoint |

---

## Next steps

Want to learn more about other transaction types? Go back to the [Transactions](/en/docs/transactions/) page.
