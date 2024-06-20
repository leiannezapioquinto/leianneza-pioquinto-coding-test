$(document).ready(function() {
    jQuery(document).on('click', '.edit-btn', function () {
        var userId = jQuery(this).data('userid');
        console.log(userId);
        jQuery.ajax({
            url: '/product/' + userId,
            type: 'GET',
            success: function (data) {
                console.log("success");
                console.log(data.productDetails[0].product_name);
                jQuery('#name').val(data.productDetails[0].product_name).data('initial-value', data.productDetails.product_name);
                jQuery('#description').val(data.productDetails[0].product_description).data('initial-value', data.productDetails.product_description);
                jQuery('#price').val(data.productDetails[0].product_price).data('initial-value', data.productDetails.product_price);

                jQuery('#editModal input, #editModal select').off('change keyup').on('change keyup', function() {
                    //();
                });
            },
            error: function (xhr, status, error){
                console.error("Error in retrieving the product details: " + error);
            }
        });
    });
});
