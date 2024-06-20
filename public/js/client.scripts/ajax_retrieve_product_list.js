$(document).ready(function() {
    $('#dataTable1').DataTable({
        processing: true,
        serverSide: false,
        searching: true,
        autoWidth: false,
        ajax: {
            url: '/getProductList'
        },
        columns: [
            { data: 'product_name', title: 'Product Name' },
            { data: 'product_description', title: 'Description' },
            { data: 'product_price', title: 'Price' },
            {
                data: null,
                title: 'Action',
                render: function(data, type, row) {
                    return `<button class="btn bg-transparent edit-btn" style="border: none; padding: 0;" data-bs-toggle="modal" data-bs-target="#editModal" data-userid="${row.id}">Edit</button>`;
                },
                orderable: false,
                searchable: false
            },
        ],
        initComplete: function(settings, json) {
            var api = new $.fn.dataTable.Api(settings);

            if (api.data().count() === 0) {
                var emptyCell = $('.dt-empty');
                if (emptyCell.length) {
                    emptyCell.html('No data available');
                }
            }
        }
    });
});
