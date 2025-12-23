---
extends: _layouts.docs
section: content
language: en
title: Archiving and Protected Deletion
description: How to safely manage accounts, categories, and tags without losing transaction history
---

# Archiving and Protected Deletion

Finerdy protects your financial history by preventing accidental deletion of accounts, categories, and tags that have associated transactions. Instead, you can archive items you no longer use.

---

## Protected Deletion

You cannot directly delete accounts, categories, or tags that have transactions linked to them.

### Why this protection exists

Deleting an account, category, or tag with transactions would leave orphaned data and corrupt your financial history. Imagine deleting your "Cash" account—all those transactions would no longer make sense.

@component('_partials.callout', ['type' => 'warning', 'title' => 'Protection in action'])
If you try to delete an account with transactions, Finerdy will show an error message and prevent the deletion.
@endcomponent

### What gets protected

| Item | Protection |
|------|-----------|
| **Accounts** | Cannot delete if it has any transactions (income, expense, transfer, exchange, or correction) |
| **Categories** | Cannot delete if any transactions use this category |
| **Tags** | Cannot delete if any transactions are tagged with it |

---

## Archive Instead of Delete

The solution is **archiving**. When you archive an item, it becomes hidden from regular use but preserves all historical data.

### What happens when you archive

- **Disappears from lists**: Won't show in dropdowns when creating new transactions
- **Hidden from active view**: Main lists only show active items
- **Accessible in archive**: View all archived items in a dedicated section
- **History intact**: All past transactions remain untouched
- **Reversible**: Unarchive anytime to restore it

### How to archive

**For accounts:**
1. Go to the account detail page
2. Tap the menu (⋮) or settings icon
3. Select **"Archive account"**
4. Confirm

**For categories and tags:**
1. Go to settings or the item's edit page
2. Select **"Archive"**
3. Confirm

@component('_partials.callout', ['type' => 'info', 'title' => 'Example use case'])
You had a "Business Expenses" category for a freelance project that ended. Archive it—your historical data stays intact, but it won't clutter your active category list.
@endcomponent

---

## Viewing Archived Items

Archived items are not deleted—they're just hidden from normal view.

### How to see archived items

1. Go to **Settings**
2. Navigate to **Accounts**, **Categories**, or **Tags**
3. Toggle **"Show Archived"** or select the **"Archived"** tab
4. View all archived items

### What you can do with archived items

| Action | Allowed? |
|--------|----------|
| **View** | Yes |
| **See transactions** | Yes (they still appear in reports and history) |
| **Unarchive** | Yes (restores to active status) |
| **Edit details** | Yes (name, description, etc.) |
| **Use in new transactions** | No (must unarchive first) |
| **Delete** | Only if you transfer transactions first |

---

## Unarchiving

Changed your mind? Unarchiving is simple and instant.

### How to unarchive

1. View archived items (see previous section)
2. Select the item you want to restore
3. Tap **"Unarchive"**
4. The item returns to active status immediately

@component('_partials.callout', ['type' => 'tip', 'title' => 'Quick restore'])
Unarchiving has no side effects—all transactions that were linked to the item remain exactly as they were.
@endcomponent

---

## Transfer and Delete

If you really need to delete an account, category, or tag with transactions, you can **transfer** all associated transactions to another item first.

### How it works

1. Select the item you want to delete
2. Choose **"Delete with transfer"**
3. Select a destination item of the same type
4. All transactions transfer to the new item
5. The original item is permanently deleted

### Transfer rules

**For accounts:**
- Can only transfer to another account with the **same currency**
- Transfers, exchanges, and corrections are also moved
- Balance of the destination account updates accordingly

**For categories:**
- Can only transfer to another category of the **same type** (income or expense)
- All budgets linked to transactions will update

**For tags:**
- Can transfer to any other tag
- Tags are cross-cutting, so no restrictions

@component('_partials.callout', ['type' => 'danger', 'title' => 'Permanent action'])
Transfer and delete is **irreversible**. Once completed, you cannot recover the original item. All transactions will permanently show the new account, category, or tag.
@endcomponent

---

## API Examples

If you're integrating with the Finerdy API, here's how archiving and deletion work:

### Archive an account

```http
PUT /accounts/{id}
Content-Type: application/json

{
  "archived": true
}
```

### Unarchive an account

```http
PUT /accounts/{id}
Content-Type: application/json

{
  "archived": false
}
```

### Delete with transfer

```http
DELETE /accounts/{id}
Content-Type: application/json

{
  "transfer_to_account_id": 123
}
```

### Same pattern for categories and tags

```http
PUT /categories/{id}
{ "archived": true }

DELETE /categories/{id}
{ "transfer_to_category_id": 456 }

PUT /tags/{id}
{ "archived": true }

DELETE /tags/{id}
{ "transfer_to_tag_id": 789 }
```

---

## Common Scenarios

### Scenario 1: Old bank account you no longer use

**Situation:** You closed your "Chase Checking" account and moved to a new bank.

**Best approach:**
1. **Archive** the old account
2. Your historical transactions remain visible in reports
3. The account won't appear when creating new transactions

**Don't:** Transfer and delete—you'll lose the historical context.

---

### Scenario 2: Duplicate categories

**Situation:** You have both "Groceries" and "Supermarket" categories and want to consolidate.

**Best approach:**
1. Choose which category to keep (e.g., "Groceries")
2. **Transfer and delete** the duplicate (e.g., "Supermarket")
3. All past transactions now use "Groceries"

**Why:** This actually fixes data inconsistency.

---

### Scenario 3: Temporary project tag

**Situation:** You used "renovation-2024" to track home renovation expenses, and the project is done.

**Best approach:**
1. **Archive** the tag
2. Reports can still filter by this tag for historical analysis
3. Won't clutter your active tag list

**Don't:** Delete it—you might want to reference those costs later.

---

## Best Practices

### 1. Archive instead of delete

Unless you're consolidating duplicates or fixing errors, **always prefer archiving**. It's reversible and preserves context.

### 2. Review before transfer

Before using "transfer and delete," review a few transactions to ensure the destination item makes sense.

### 3. Use descriptive names

If you have similar accounts or categories, clear names help you choose the right transfer destination:
- Good: "Chase Checking (Closed 2024)"
- Bad: "Bank Account 2"

### 4. Archive periodically

Every few months, review your accounts, categories, and tags. Archive anything you haven't used recently.

### 5. Don't fear archiving

Archiving is low-risk. If you archive something by mistake, unarchiving takes 2 seconds.

---

## Summary

| Feature | What it does | When to use |
|---------|-------------|-------------|
| **Protected deletion** | Prevents deleting items with transactions | Automatic—you can't accidentally delete |
| **Archive** | Hides item from active use, preserves history | When you no longer use an account, category, or tag |
| **Unarchive** | Restores item to active status | When you need to use an archived item again |
| **Transfer and delete** | Moves all transactions to a new item, then deletes | When consolidating duplicates or fixing errors |

---

## Next steps

Learn about other features:
- [Transactions](/en/docs/transactions/) - How to record income, expenses, transfers, and more
- [Corrections](/en/docs/corrections/) - How to adjust account balances
- [Budgets](/en/docs/budgets/) - Control spending by category
