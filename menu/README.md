# Case Study 4 (ii) - Placing orders

Objective: Allow orders on menu page

Before we can generate sales reports, we need to be able to let users place orders. To achieve this, we have to update the menu page to insert orders into a MySQL table.

## Database

We first create an `orders` table where we store the order details e.g. product, size, quantity and amount.

| Name          | Type      | Length    | Default           | Index         | A_I   |
|---------------|-----------|-----------|-------------------|---------------|-------|
| ID            | int       | 100       | None              | PRIMARY KEY   |  ✔    |
| product_id    | int       | 100       | None              |               |       |
| size          | VARCHAR   | 200       | None              |               |       |
| qty           | int       | 100       | None              |               |       |
| amt           | float     |           | None              |               |       |
| date          | timestamp |           | CURRENT_TIMESTAMP |               |       |

CURRENT_TIMESTAMP records the time and date of the order. This allows us to seperate the orders by date for the sales report later.

## File directory

### menu.php
Does not do any PHP stuff. It simply imports the menu table wrapped in `menu_table.php`. See the source code to understand.

### menu_table.php
> Displays a menu table in an order form
