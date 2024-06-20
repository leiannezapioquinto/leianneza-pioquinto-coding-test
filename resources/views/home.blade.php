@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive container">
                        <table id="dataTable1" class="table table-hover mb-0 display nowrap">
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
                            <div class="row mt-3">
                                <label for="name" class="form-label"><strong><span style="color: #5864dc;">Product Name</span></strong></label>
                                <input type="text" class="form-control" id="name" name="name" maxlength="255" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                            </div>
                            <div class="row mt-3">
                                <label for="description" class="form-label"><strong><span style="color: #5864dc;">Product Description</span></strong></label>
                                <input type="text" class="form-control" id="description" name="description" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                            </div>
                            <div class="row mt-3">
                                <label for="price" class="form-label"><strong><span style="color: #5864dc;">Product Price</span></strong></label>
                                <input type="text" class="form-control" id="price" name="price" maxlength="25" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Save Changes Button -->
                    <div class="text-center">
                        <button id="saveChangesBtn" type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#confirmEditModal" disabled>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('../js/client.scripts/ajax_retrieve_product_list.js') }}"></script>
<script src="{{ asset('../js/client.scripts/ajax_retrieve_product_details.js') }}"></script>

@endsection
