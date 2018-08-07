function showDetails(button) {
    const id = button.id;
    console.log(id);
    
    // ajax to call specific id
    $.ajax({
    url: './detail.php',
    method: 'GET',
    data: {"id": id},
    success: function(response) {
        // parsing the json string to js object
        var product = JSON.parse(response);
        // display in proper fields
        $("#name").text(product.name);
        $("#image").attr("src", product.image);
        $("#name2").text(product.name);
        $("#description").text(product.description);
        $("#price").text(product.price);
        }
    });
}

$('#add').click(function () {
    $(this).prev().val(+$(this).prev().val() + 1);
});
$('#sub').click(function () {
    if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
});
