function getCartCount(username) {
    $.ajax({
        type: 'GET',
        url: 'epaddcart.php?username=' + username,
        success: function(data){
            console.log('Total In Cart: ' + data);
            var itemCount = $("#item_count").text(data);
        },
        error: function(data){
            console.log('Error: ' + data);
        }
    });
}