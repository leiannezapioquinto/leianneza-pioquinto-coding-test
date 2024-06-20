$(document).ready(function() {
    // Function to enable/disable register button based on form validation
    function validateForm() {
        var name = $('#productName').val();
        var description = $('#productDescription').val();
        var price = $('#productPrice').val();

        if (name.trim() !== '' && description.trim() !== '' && price.trim() !== '') {
            $('#registerBtn').prop('disabled', false);
        } else {
            $('#registerBtn').prop('disabled', true);
        }
    }

    // Call validateForm() on input change in any of the form fields
    $('#productName, #productDescription, #productPrice').on('input', function() {
        console.log("validating");
        validateForm();
    });

    // AJAX function to handle form submission
    $('#registerBtn').on('click', function() {
        var name = $('#productName').val();
        var description = $('#productDescription').val();
        var price = $('#productPrice').val();

        const data = {
            _token: csr_token,
            name: name,
            description: description,
            price: price
        };

        // AJAX request
        $.ajax({
            url: '/register_product',
            type: 'POST',
            data: data,
            success: function(response) {
                console.log("success");
                // Handle success response
                console.log(response);
                // Optionally, close the modal after successful submission
                //$('#createModal').modal('hide');
                //reloadTable();
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error("Error in registering product: " + error);
            }
        });
    });
});
