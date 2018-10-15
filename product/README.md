# Case Study 4(i) - Price Update

Objective: Update prices of product

We first need to create a `menu` table where we store the names, description, prices, etc of each product.


| field         | type          | null  | default   | extra |
|---------------|---------------|-------|-----------|-------|
| ID            | int(100)      | no    | none      |  AUTO_INCREMENT, PRIMARY KEY |
| name          | VARCHAR(100)  | no    | none      |       |
| description   | VARCHAR(200)  | no    | none      |       |
| endless       | float         | yes   | NULL      |       |
| single        | float         | yes   | NULL      |       |
| dbl           | float         | yes   | NULL      |       |

Populate the table with the 3 products.

| ID | name          | description              | endless | single | double |
|----|---------------|--------------------------|---------|--------|--------|
| 1  | Just Java     | Regular House blend...   | 2       | NULL   | NULL   |
| 2  | Just Java     | House blended coffee...  | NULL    | 2      | 3      |
| 3  | Iced Cappucino| Sweetened espresso...    | NULL    | 4.75   | 5.75   |


## File directory

### product_table.php
Fetches all entries from menu with sql query: `SELECT * FROM menu`.

The name, description, and prices for each product is displayed in a table row `<tr>`. Each row has a `<form>` for the prices. An Edit/Cancel button is used to toggle the display of the input fields. The toggling is handled by jQuery in `product.js`.

Within each form, there is an input field for each price, a hidden ID input and a submit button. The ID input allows us to send the ID of the product in the form, so we specify the product being updated. It is hidden because we don't want the user to change the corresponding ID for each table row.

Alternatively, you can use the product name to specify which product to update, if that is easier to understand.

On submit, the form calls `product_update.php` using `POST` method.

### product_update.php
Updates the products and displays the response

The variables sent using the form is store in `$_POST` which can be viewed using `var_dump($_POST)` e.g. 
```
array(3) {
    ["id"]=> string(1) "3"
    ["single"]=> string(4) "4.75"
    ["dbl"]=> string(4) "5.75"
}
```
Tip: Use `var_dump($_POST)` to make sure your data is passed correctly in the form.

A SQL statment then constructed to update the menu table. e.g.
```
UPDATE menu SET single=4.75, dbl=5.75 WHERE id=3
```
Tip: Echo your sql statement before running it for quick debugging (`echo $sql`). If there are errors, run the statement in myphpadmin to make sure the syntax is correct.

### product.php
Imports the menu table using `include` (line 29)
