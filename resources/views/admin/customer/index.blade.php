@extends('front_master')
@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .badge-xl {
            font-size: 14px;
            padding: 20;
        }

        .dataTables_wrapper .dataTables_filter input[type="search"] {
            width: 700px !important;
            padding: 12px !important;
            font-size: 16px !important;
            border-radius: 10px !important;
            color: #3559e0;
            border-color: #3559e0;
            margin-left: 10px;
            margin-bottom: 10px;

        }

        .dataTables_wrapper .dataTables_filter input[type="search"]::placeholder {
            color: #3559e0;
        }

        .btn-primary {
            background-color: #3559e0;
            border: none
        }

        .btn-primary:hover {
            background-color: #3559e0;
            border: none
        }

        /* Custom toast background color */
        .swal-toast {
            background-color: #007bff;
        }
    </style>
@endpush
@section('content')
    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
                customClass: {
                    popup: 'swal-toast'
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
                customClass: {
                    popup: 'swal-toast'
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ session('error') }}"
            });
        </script>
    @endif
    <div class="container-fluid mt-3">
        <div class="table-responsive" style="background-color: #ffffff">
            <div class="card-header" style="background-color: #3559e0 ; color:#ffffff">
                <h3 class="card-title" style="font-size: 35px">Customer List</h3>
            </div>
            <div class="card-body">

                <table id="example1" class="table">

                    <thead style=" color: #3559e0; border-bottom: 2px solid #3559e0;font-size:18px">
                        <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Company Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Address</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody style=" color: #3559e0; border-bottom: 2px solid #3559e0; font-size: 16px">
                        @foreach ($customers as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->customername }}</td>
                                <td>{{ $item->companyname }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->ishidden == 1)
                                        <span class="badge bg-success badge-xl">Active</span>
                                    @else
                                        <span class="badge bg-danger badge-xl">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    <form id="deleteForm_{{ $item->id }}"
                                        action="{{ route('admin.customer.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.customer.show', $item->id) }}" class="btn btn-primary"><i
                                                class="fa fa-eye" style="color: #ffffff;"></i> </a>
                                        <a href="{{ route('admin.customer.edit', $item->id) }}" class="btn btn-primary"><i
                                                class="fa fa-edit"></i> </a>
                                        <button type="button" class="btn btn-danger deleteButton"
                                            data-id="{{ $item->id }}" data-toggle="modal"
                                            data-target="#confirmDeleteModal">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Custom JavaScript for Delete Confirmation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Attach click event listener to all delete buttons
            const deleteButtons = document.querySelectorAll('.deleteButton');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission

                    const customerId = e.currentTarget.getAttribute('data-id');

                    // Display SweetAlert2 confirmation dialog
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user confirms deletion, submit the form
                            const deleteForm = document.querySelector(
                                `#deleteForm_${customerId}`);
                            deleteForm.submit(); // Submit the form for deletion
                        }
                    });
                });
            });
        });
    </script>
@endsection
@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "language": {
                    "search": "",
                    "searchPlaceholder": "        Search for something...",
                },
                "pageLength": 9,
                "buttons": [ // Custom button configuration
                    {
                        text: 'Create New Customer',
                        className: 'btn btn-primary btn-default',
                        action: function() {
                            window.location.href = "{{ route('admin.customer.create') }}";
                        }
                    }
                ]

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            // Add custom search icon
            $('.dataTables_filter input[type="search"]').css({
                'background-image': 'url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' fill=\'%233559e0\' viewBox=\'0 0 512 512\'%3e%3cpath d=\'M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.8 44-128C416 85.96 330.1 0 224 0S32 85.96 32 192s85.96 192 192 192c48.17 0 92.66-16.38 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.38 9.38 24.6 9.38 33.98 0l28.3-28.3c9.38-9.37 9.38-24.56.02-33.94zM224 336c-70.7 0-128-57.3-128-128s57.3-128 128-128 128 57.3 128 128-57.3 128-128 128z\'/%3e%3c/svg%3e")',
                'background-repeat': 'no-repeat',
                'background-position': 'left 10px center',
                'background-size': '22px'
            });
            $('.dataTables_filter input[type="search"]').on('input', function() {
                var input = $(this);
                if (input.val().length > 0) {
                    input.css('background-image', 'none');
                } else {
                    input.css('background-image',
                        'url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' fill=\'%233559e0\' viewBox=\'0 0 512 512\'%3e%3cpath d=\'M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.8 44-128C416 85.96 330.1 0 224 0S32 85.96 32 192s85.96 192 192 192c48.17 0 92.66-16.38 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.38 9.38 24.6 9.38 33.98 0l28.3-28.3c9.38-9.37 9.38-24.56.02-33.94zM224 336c-70.7 0-128-57.3-128-128s57.3-128 128-128 128 57.3 128 128z\'/%3e%3c/svg%3e")'
                    );
                }
            });
        });
    </script>
@endpush
