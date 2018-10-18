function getTotal() { // updates total amt
    let total = 0.00;
    $('.subtotal').each(function() {
        total += parseFloat($(this).val());
    });
    $('#total-field').val(total.toFixed(2));
}
function getSubtotal(input) { // Updates subtotal for specific table row
    let tr = $(input).parents("tr"); // Table row specific to product
    let qty = tr.find(".qty").val();
    let priceInput = tr.find("input[type=radio]:checked, input[type=hidden]"); // Checked/hidden <input>
    let price = priceInput.next().text(); // Price is in a <span> tag next to <input> (Inspect HTML)
    tr.find(".subtotal").val((price*qty).toFixed(2)); // Set value with 2 decimal places
    getTotal();
}