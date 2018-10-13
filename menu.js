function getTotal() {
    let total = 0.00;
    $('.subtotal').each(function() {
        total += parseFloat($(this).val());
    });
    $('#total-field').val(total.toFixed(2));
}
function getSubtotal(input) {
    let tr = $(input).parents("tr");
    let qty = tr.find("input[type=number]").first().val();
    let price = tr.find("input[type=radio]:checked, input[type=hidden]").next().text();
    tr.find(".subtotal").val((price*qty).toFixed(2));
    getTotal();
}