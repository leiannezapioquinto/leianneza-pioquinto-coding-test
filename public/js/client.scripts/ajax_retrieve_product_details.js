$(document).ready(function() {
    var prodID;

    jQuery(document).on('click', '.edit-btn', function () {
        var userId = jQuery(this).data('userid');
        prodID = userId;
        console.log(prodID);
    });

    jQuery(document).on('click', '.edit-btn', function () {
        jQuery.ajax({
            url: '/product/' + prodID,
            type: 'GET',
            success: function (data) {
                console.log("success");
                console.log(data.productDetails);
                console.log(data.productDetails.product_name);
                jQuery('#name').val(data.productDetails.product_name).data('initial-value', data.productDetails.product_name);
                jQuery('#description').val(data.productDetails.product_description).data('initial-value', data.productDetails.product_description);
                jQuery('#price').val(data.productDetails.product_price).data('initial-value', data.productDetails.product_price);
            },
            error: function (xhr, status, error){
                console.error("Error in retrieving the product details: " + error);
            }
        });
    });

    // AJAX function to handle form submission
    jQuery(document).on('click', '#saveBtn', function () {

        // Get form data
        var name = $('#name').val();
        var description = $('#description').val();
        var price = $('#price').val();

        const data = {
            _token: csr_token,
            product_name: name,
            product_description: description,
            product_price: price,
            id: prodID,
        };

        // AJAX request to update product
        $.ajax({
            url: '/update/' + prodID,
            type: 'PUT',
            data: data,
            success: function(response) {
                // Handle success response
                console.log(response);
                // Optionally close modal or perform any other actions
                $('#editModal').modal('hide');
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error("Error in updating product: " + error);
            }
        });
    });

    window.prodID = prodID;
});
