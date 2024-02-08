$(document).ready(function() {
    $('#wishlist-btn').click(function(e) {
        e.preventDefault();
        console.log('click');

        var productId = $(this).attr('href').split('=')[1];

        $.ajax({
            url: '{$wishlist_link}', // Make sure this variable is correctly defined
            type: 'POST',
            data: {
                product_id: productId
            },
            success: function(response) {
                console.log(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
            }
        });
    });
});
