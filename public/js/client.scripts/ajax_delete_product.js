$(document).ready(function() {
    var prodID;

    jQuery(document).on('click', '.delt-btn', function () {
        var userId = jQuery(this).data('userid');
        prodID = userId;
        console.log(prodID);
    });

    jQuery(document).on('click', '#confirmDelete', function () {
        jQuery('#confirmModal').modal('hide');
        jQuery.ajax({
            url: '/delete/' + prodID,
            type: 'GET',
            success: function (response) {
                console.log(response);
                if (response.res === false) {
                    // Show error modal with message
                    jQuery('#errorModalBody').text('Error encountered while deleting selected product');
                    jQuery('#errorModal').modal('show');
                } else {
                    // Show success modal with message
                    jQuery('#successModalBody').text('Successfully deleted the product');
                    jQuery('#successModal').modal('show');
                }
                reloadTable();
            },
            error: function (xhr, status, error){
                console.error("Error in deleting product: " + error);
                // Show error modal with message
                jQuery('#errorModalBody').text('Error encountered while deleting selected product');
                jQuery('#errorModal').modal('show');
            }
        });
    });
});
