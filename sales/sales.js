$('.salesTable').each(function() {
    let maxValue = 0;
    let maxIndex = null;
    $(this).find('.salesValue').each(function(index, td) {
        let currentValue = Number($(td).text());
        // console.log(currentValue);
        if (currentValue > maxValue) {
            maxIndex = index;
            maxValue = currentValue;
        }
    })
    $(this).find('.salesValue').eq(maxIndex).parents('tr').addClass('maxTr');
})