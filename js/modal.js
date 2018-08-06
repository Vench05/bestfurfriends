function showDetails(button) {
    const id = button.id;
    // ajax to call specific id
    $.ajax({
        url: '../php/detail.php',
        method: 'GET',
        data: {"id": id},
        success: function(response) {
            // parsing the json string to js object
            const product =JSON.parse(response);
            // display in proper fields
            $("#name").text(product.name);
        }
    });
}