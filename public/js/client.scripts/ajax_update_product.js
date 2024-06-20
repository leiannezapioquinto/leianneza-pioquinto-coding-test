$(document).ready(function() {
    // Function to compare initial and current values of form fields
    function checkForChanges() {
        var initialName = $('#name').data('initial-value');
        var initialDescription = $('#description').data('initial-value');
        var initialPrice = $('#price').data('initial-value');

        var currentName = $('#name').val();
        var currentDescription = $('#description').val();
        var currentPrice = $('#price').val();

        // Check if any field values have changed
        var changesDetected = (initialName !== currentName || initialDescription !== currentDescription || initialPrice !== currentPrice);

        // Enable or disable save button based on changes detected
        $('#saveBtn').prop('disabled', !changesDetected);
    }

    // Call checkForChanges() when modal is opened and on input change
    $('#editModal').on('shown.bs.modal', function() {
        // Reset initial values to current values when modal is opened
        $('#name, #description, #price').each(function() {
            $(this).data('initial-value', $(this).val());
        });
        checkForChanges();
    });

    $('#editModal input, #editModal textarea').on('input', function() {
        checkForChanges();
        console.log("validating");
    });
});
