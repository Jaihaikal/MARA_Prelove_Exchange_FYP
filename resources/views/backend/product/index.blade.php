@extends('backend.layouts.master')

@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Product Lists</h6>
            <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
                data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Product</a>
        </div>
        <div class="card-body">
            <table id="products-table" class="display table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Condition</th>
                        <th>Add By</th>
                        <th>Stock</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                        <!-- Add other headers as needed -->
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    {{-- <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <style>
        .zoom {
            transition: transform .2s;
            /* Animation */
        }

        .zoom:hover {
            transform: scale(2);
        }
    </style>
@endpush

@push('scripts')
    <!-- Page level plugins -->
    <!-- Core jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 (Recommended) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Page-level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#products-table').DataTable({
                processing: true,
                serverSide: true, // Enable server-side mode
                ajax: "{{ route('admin.product.data') }}", // Using the custom route
                columns: [{
                        data: 'id',
                        name: 'id',
                        title: 'S.N.',
                        orderable: true
                    },
                    {
                        data: 'title',
                        name: 'title',
                        title: 'Title',
                        orderable: true
                    },
                    {
                        data: 'category',
                        name: 'category',
                        title: 'Category - Sub-category',
                        orderable: true
                    },
                    {
                        data: 'price',
                        name: 'price',
                        title: 'Price',
                        orderable: true
                    },
                    {
                        data: 'discount',
                        name: 'discount',
                        title: 'Discount',
                        orderable: true
                    },
                    {
                        data: 'condition',
                        name: 'condition',
                        title: 'Condition',
                        orderable: true
                    },
                    {
                        data: 'add_by',
                        name: 'add_by',
                        title: 'Add By',
                        orderable: true
                    },
                    {
                        data: 'stock',
                        name: 'stock',
                        title: 'Stock',
                        orderable: true
                    },
                    {
                        data: 'photo',
                        name: 'photo',
                        title: 'Photo',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        title: 'Status',
                        orderable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        title: 'Action'
                    }
                ],
                pageLength: 10, // Set page length to 10
                lengthMenu: [10, 25, 50, 100], // Dropdown for page sizes
                paging: true, // Enables pagination (default is true)
                info: true,

            });
        });

        $(document).on('click', '.dltBtn', function(e) {
            e.preventDefault(); // Prevent default button behavior

            let form = $(this).closest('form'); // Get the form element
            let productName = $(this).data('name'); // Get the product name from data-name attribute

            if (confirm(`Are you sure you want to delete '${productName}'?`)) {
                form.submit(); // Submit the form if confirmed
            }
        });
    </script>
@endpush
