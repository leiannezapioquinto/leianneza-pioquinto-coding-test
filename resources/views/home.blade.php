@extends('layouts.app')
<style>
.edit-btn:hover {
    background-color: rgba(0, 0, 255, 0.1); /* Blue with 0.1 opacity */
}

/* Green */
    .bg-success-dark {
        background-color: #28a745;
        color: #fff;
    }

/* Red */
    .bg-danger-dark {
        background-color: #C12512;
        color: #fff;
    }

/* Orange */
    .bg-warning-dark {
        background-color: #D86708;
        color: #fff;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Products') }}</span>
                    <button id="registerProduct" type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#createModal">Register Product</button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive container">
                        <table id="dataTable1" class="table table-hover mb-0 display">
                            <thead></thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1"  role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Product Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="container">
                        <div class="card-body mb-0">
                            <form id="editProductForm">
                                <div class="row mt-3">
                                    <label for="name" class="form-label"><strong><span style="color: #5864dc;">Product Name</span></strong></label>
                                    <input type="text" class="form-control" id="name" name="name" maxlength="255" required>                            </div>
                                <div class="row mt-3">
                                    <label for="description" class="form-label"><strong><span style="color: #5864dc;">Product Description</span></strong></label>
                                    <textarea class="form-control" id="description" name="description" required></textarea>
                                </div>
                                <div class="row mt-3">
                                    <label for="price" class="form-label"><strong><span style="color: #5864dc;">Product Price</span></strong></label>
                                    <input type="number" class="form-control" id="price" name="productPrice" step="0.01" min="0" max="9999999.99" required>
                                    <div id="priceHelp" class="form-text">Please enter the price with a maximum of 2 decimal values.</div>                            </div>
                                </div>
                                <button id="saveBtn" type="submit" class="btn btn-primary center" disabled>Save Changes</button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1"  role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Product Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productForm">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" maxlength="255" required>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Product Description</label>
                        <textarea class="form-control" id="productDescription" name="productDescription" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Product Price</label>
                        <input type="number" class="form-control" id="productPrice" name="productPrice" step="0.01" min="0" max="9999999.99" required>
                        <div id="priceHelp" class="form-text">Please enter the price with a maximum of 2 decimal values.</div>
                    </div>
                    <button id="registerBtn" type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success-dark">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
            </div>
            <div class="modal-body" id="successModalBody">

            </div>
        </div>
    </div>
</div>


<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger-dark">
                <h5 class="modal-title" id="errorModalLabel">Error Encountered</h5>
            </div>
            <div class="modal-body" id="errorModalBody">

            </div>
        </div>
    </div>
</div>

<!-- Confirm Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning-dark">
                <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="confirmModalBody">
                Are you sure you want to delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Confirm</button>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('../js/client.scripts/ajax_retrieve_product_list.js') }}"></script>
<script src="{{ asset('../js/client.scripts/ajax_retrieve_product_details.js') }}"></script>
<script src="{{ asset('../js/client.scripts/ajax_delete_product.js') }}"></script>
<script src="{{ asset('../js/client.scripts/ajax_register_product.js') }}"></script>
<script src="{{ asset('../js/client.scripts/ajax_update_product.js') }}"></script>
<script src="{{ asset('../js/client.scripts/refresh_table.js') }}"></script>

<script>
    var csr_token = "{{ csrf_token() }}";
</script>

@endsection
