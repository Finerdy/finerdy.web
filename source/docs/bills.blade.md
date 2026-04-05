---
extends: _layouts.docs
section: content
language: en
title: Bills & Due Dates
description: Track recurring bills, payment plans, and upcoming due dates in Finerdy
---

# Bills & Due Dates

Bills help you track recurring payments and upcoming due dates. Set up your bills once and Finerdy reminds you when they're due, lets you record payments, and projects your fixed expenses.

## What is a bill?

A **bill** is a payment obligation — either recurring (monthly rent, subscriptions) or a custom set of dates (installment plans, one-time payments).

### Example

```
Bill: Netflix
Amount: 15.99 USD
Frequency: Monthly
Category: Entertainment
Tags: [streaming, subscriptions]

Occurrences:
  May 1, 2025: Pending (due in 3 days)
  Apr 1, 2025: Paid → Transaction #142
  Mar 1, 2025: Paid → Transaction #128
```

---

## Creating a bill

| Field | Description |
|-------|-------------|
| **Name** | Bill identifier (e.g., "Netflix", "Rent") |
| **Description** | Optional details |
| **Currency** | From your existing accounts |
| **Amount** | Default amount for each occurrence |
| **Category** | Optional expense category (carried to transactions) |
| **Tags** | Default tags (carried to transactions, overridable per payment) |
| **External ID** | Optional reference (invoice number, service ID) |
| **Frequency** | How often it repeats |

---

## Frequencies

Finerdy supports two types of bill frequencies:

### Periodic bills

For recurring payments. You set a **first due date** (anchor date) and Finerdy generates the next occurrence automatically each time you pay.

| Frequency | Cycle |
|-----------|-------|
| **Weekly** | Every 7 days |
| **Biweekly** | Every 14 days |
| **Monthly** | Same day each month |
| **Bimonthly** | Every 2 months |
| **Quarterly** | Every 3 months |
| **Semiannual** | Every 6 months |
| **Yearly** | Every 12 months |

```
Bill: Rent
Frequency: Monthly
Anchor date: May 1, 2025

→ Creates occurrence for May 1
→ When paid, creates occurrence for Jun 1
→ When paid, creates occurrence for Jul 1
→ ...
```

### Custom bills

For payment plans or one-time payments. You manually define each due date and optionally set a different amount per occurrence.

```
Bill: TV Payment Plan
Amount: 500 USD (default)
Frequency: Custom

Occurrences:
  May 1: 500 USD
  Jun 1: 500 USD
  Jul 1: 250 USD (final payment, different amount)
```

---

## Occurrence statuses

Each bill occurrence has one of these statuses:

| Status | Description |
|--------|-------------|
| **Pending** | Not yet paid, due date in the future |
| **Overdue** | Not yet paid, due date has passed (calculated automatically) |
| **Paid** | Payment recorded, linked to a transaction |
| **Skipped** | Intentionally skipped |

@component('_partials.callout', ['type' => 'info', 'title' => 'Overdue is automatic'])
Overdue is not a stored status — it's calculated on-the-fly. Any pending occurrence with a past due date is automatically shown as overdue.
@endcomponent

---

## Paying a bill

When you pay an occurrence, Finerdy asks for:

| Field | Description |
|-------|-------------|
| **Account** | Which account to debit |
| **Amount** | Pre-filled from the occurrence (editable) |
| **Date & time** | When the payment happened |
| **Description** | Pre-filled with the bill name |
| **Tags** | Pre-filled from the bill's default tags (editable) |

This creates an **expense transaction** linked to the occurrence.

### Cross-currency payments

You can pay a bill in one currency using an account in another currency. For example, paying an ARS bill with a USD account:

1. Select a USD account
2. The currency indicator switches to USD
3. Enter the equivalent amount in USD
4. A hint shows the original bill amount in ARS

The transaction is recorded in the account's currency.

---

## Email reminders

Finerdy sends email reminders for occurrences due **within the next 3 days** to all workspace members. This runs automatically — no configuration needed. Each occurrence only receives one reminder, and missed reminders are caught up on the next run.

---

## Archiving bills

When a bill is no longer relevant, you can **archive** it instead of deleting it. Archived bills are hidden from the default list but preserved for history.

- Archive a bill from its detail page
- Archived bills can be found under the **Archived** section
- Unarchive at any time to bring it back to the active list
- Archiving a bill stops automatic generation of new occurrences

@component('_partials.callout', ['type' => 'tip', 'title' => 'Archive vs. delete'])
Deleting a bill removes it and all its occurrences permanently (linked transactions are preserved). Archiving keeps the full bill and payment history accessible.
@endcomponent

---

## Completed bills

A bill is shown with a **Completed** badge when all its occurrences have been paid or skipped and none are pending. This is especially useful for custom/installment bills with a fixed number of payments.

```
Bill: TV Payment Plan (Completed ✓)
Occurrences:
  May 1: Paid → Transaction #201
  Jun 1: Paid → Transaction #215
  Jul 1: Paid → Transaction #230
```

---

## Dashboard widget

The dashboard shows your **upcoming bills** widget with:

- Next 5 pending/overdue occurrences
- Days until due (color-coded: green > 7 days, yellow 3-7, red < 3)
- Quick-pay button to open the payment modal directly

---

## Transaction link

Every paid occurrence is linked to its transaction:

- **From the bill**: Click "View transaction" on a paid occurrence to see the transaction details
- **From the transaction**: A banner shows which bill the transaction came from, with a link back

---

## Tips

1. **Use tags on bills**: They carry to every payment transaction, making expense analysis easier.

2. **External ID for tracking**: Use it to link bills to invoice numbers or external service references.

3. **Custom for installments**: Use custom frequency when you have a fixed number of payments with known dates.

4. **Check the dashboard**: The upcoming bills widget gives you a quick overview of what's due soon.

---

## Next steps

Learn how to organize your finances in different contexts with [Workspaces](/docs/workspaces/).
