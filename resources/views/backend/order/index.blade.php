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
            <h6 class="m-0 font-weight-bold text-primary float-left">Order Lists</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($orders) > 0)
                <table class="table" style="border: 1px solid #ddd; border-collapse: collapse;">                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order Number</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @php
                                    $shipping_charge = DB::table('shippings')
                                        ->where('id', $order->shipping_id)
                                        ->pluck('price');
                                @endphp
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->product->title }}</td> <!-- Display seller's name -->
                                    <td>{{ $order->quantity }}</td>
                                    <td>${{ number_format($order->total_amount, 2) }}</td>
                                    <td>
                                        @if ($order->status == 'new')
                                            <span class="badge badge-primary">{{ $order->status }}</span>
                                        @elseif($order->status == 'process')
                                            <span class="badge badge-warning">{{ $order->status }}</span>
                                        @elseif($order->status == 'delivered')
                                            <span class="badge badge-success">{{ $order->status }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $order->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('order.show', $order->id) }}">View</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('order.edit', $order->id) }}">Edit</a>
                                                <form method="POST" action="{{ route('order.destroy', [$order->id]) }}"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="dropdown-item dltBtn"
                                                        data-id={{ $order->id }}>Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span style="float:right">{{ $orders->links() }}</span>
                @else
                    <h6 class="text-center">No orders found!!! Please order some products</h6>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }

        table.table-sm th,
        table.table-sm td {
            padding: 0.3rem;
            font-size: 0.875rem;
        }

        .table td,
        .table th {
            word-wrap: break-word;
            word-break: break-all;
            white-space: normal;
        }
    </style>
@endpush

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script>
        $('#order-dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [8]
            }]
        });

        // Sweet alert

        function deleteData(id) {

        }
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.dltBtn').click(function(e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
                // alert(dataID);
                e.preventDefault();
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("Your data is safe!");
                        }
                    });
            })
        })
    </script>
@endpush
