# Case Study 4(i) - Price Update

Objective: Update prices of products

## Workflow

The proposed workflow:
1. User visits `product.php` page and is shown a table of products
2. User clicks on Edit button for a product, which displays a form within the table row
3. User keys in a new price using the form and hits submit
4. User is directed to `product_update.php` page and is shown that the update is successful
5. User clicks on a 'Return to product' link to return to `product.php` page

There are other workflows:
- 3 pages: `product`, `product_form` & `product_update`. It is simplier to code but more troublesome for the user.
- 1 page for everything. User friendly but a pain in the ass to code.

IMO having 2 pages - `product.php` and `product_update.php` - is a good balance between coding and user friendliness.

## Database

We first need to create a `menu` table where we store the names, description, prices, etc of each product.


| Name          | Type      | Length    | Null  | Default   | Index         | A_I   |
|---------------|-----------|-----------|-------|-----------|---------------|-------|
| ID            | int       | 100       |       | None      | PRIMARY KEY   |  ✔    |
| name          | VARCHAR   | 100       |       | None      |               |       |
| description   | VARCHAR   | 200       |       | None      |               |       |
| endless       | float     |           | ✔     | NULL      |               |       |
| single        | float     |           | ✔     | NULL      |               |       |
| dbl           | float     |           | ✔     | NULL      |               |       |

***A_I** (Auto Increment) ensures that no ID is repeated i.e. each product has a unique ID. **dbl** is used instead of **double**, because **double** is a reserved word.*

Populate the table with the 3 products.

| ID | name             | description              | endless | single | double |
|----|------------------|--------------------------|---------|--------|--------|
| 1  | Just Java        | Regular House blend...   | 2       | NULL   | NULL   |
| 2  | Cafe au Lait     | House blended coffee...  | NULL    | 2      | 3      |
| 3  | Iced Cappucino   | Sweetened espresso...    | NULL    | 4.75   | 5.75   |


## File directory

### product.php
Does not do any PHP stuff. It simply imports the menu table wrapped in `product_table.php`. See the source code to understand.

### product_table.php
> Displays menu table with a price update form in each product row

Fetches all entries from menu with sql query: `SELECT * FROM menu`.

The name, description, and prices for each product is displayed in a table row `<tr>`. Each row has a `<form>` for the updating the prices. An Edit/Cancel button is used to toggle the display of the input fields. The toggling is handled by jQuery in `product.js`.

Within each form, there is a hidden ID input, an input for each price and a submit button. The ID input allows us to send the unique product ID in the form, so we can specify which product is being updated. It is hidden because we don't want the user to change the corresponding ID for each table row. E.g.

```html
<form action='product_update.php' method='post' ...>
    <input type='hidden' name='id' ...>         // product id
    ...
    <input type='number' name='single' ...>     // new single price
    ...
    <input type='number' name='dbl' ...>        // new double price
    <button type='submit' ...>Update</button>   // submit form
</form>
```

~~Alternatively, you can use the product name to specify which product to update, if that is easier to understand.~~

On submit, the form calls `product_update.php` using `POST` method.

`product_table.php` as viewed in the browser:
![product_table.php](https://raw.githubusercontent.com/vamonke/javajam/master/product/product.png)

### product_update.php
> Updates the products using incoming form data

On submiting the form, the browser will be redirected to `product_update.php`. The incoming form data can be accessed using the `$_POST` variable which can be viewed with `var_dump($_POST)` e.g. 
```
array(3) {
    ["id"]=> string(1) "3"
    ["single"]=> string(4) "4.75"
    ["dbl"]=> string(4) "5.75"
}
```
*Tip: Use `var_dump($_POST)` to make sure your data is passed correctly in the form.*

A SQL statment then constructed to update the menu table. e.g.
```
UPDATE menu SET single=4.75, dbl=5.75 WHERE id=3
```
*Tip: Echo your sql statement before running it for quick debugging (`echo $sql`). If there are errors, run the statement in myphpadmin to make sure the syntax is correct.*

The result of the update (success/failure) is then displayed.
