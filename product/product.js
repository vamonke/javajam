// Toggles between edit and normal state for the table row
function toggleEdit(button) {
    // Show/hide .priceInput and .priceDisplay in the same table row
    $(button).parents("tr").find(".priceInput, .priceDisplay").toggle();
    // Toggle button text between "edit" and "cancel"
    if ($(button).text() == "Edit") {
        $(button).text("Cancel");
    } else {
        $(button).text("Edit");
    }
}