@extends('backend.layouts.master')
@section('title', 'Biodata')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>{{ $page_name }}</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="manage_all" class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    {{-- <th>#</th> --}}
                                    @if ($page != 'incomplete')
                                        <th>Name</th>
                                        <th>Parents</th>
                                        <th>Parmanent Address</th>
                                        <th>Contacts</th>
                                        @if ($page != 'delete')
                                            <th>Delete Date</th>
                                        @endif
                                        <th>Status<br />
                                            @if ($page != 'delete')
                                                <small>(Click To Change)</small>
                                            @endif
                                        </th>
                                        <th>Action</th>
                                    @else
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    @endif
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media screen and (min-width: 768px) {
            #myModal .modal-dialog {
                width: 85%;
                border-radius: 5px;
            }
        }
    </style>
    <script>
        $(function() {
            table = $('#manage_all').DataTable({

                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.biodata.all', ['page' => $page]) }}",
                columns: [
                    @if ($page != 'incomplete')
                        {
                            data: 'name',
                            name: 'name'
                        }, {
                            data: 'parents',
                            name: 'parents'
                        }, {
                            data: 'parmanent_address',
                            name: 'parmanent_address'
                        }, {
                            data: 'contacts',
                            name: 'contacts'
                        },
                        @if ($page != 'delete')
                            {
                                data: 'delete_date',
                                name: 'delete_date'
                            },
                        @endif {
                            data: 'status',
                            name: 'status'
                        }, {
                            data: 'action',
                            name: 'action'
                        }
                    @else
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                    @endif
                ],
                "autoWidth": false,
            });
            $('.dataTables_filter input[type="search"]').attr('placeholder', 'Type here to search...').css({
                'width': '220px',
                'height': '30px'
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // View Form
            // $("#manage_all").on("click", ".view", function () {
            //     var id = $(this).attr('id');
            //     ajax_submit_view('view', id)
            // });

            // // Edit Form
            // $("#manage_all").on("click", ".edit", function () {
            //     var id = $(this).attr('id');
            //     ajax_submit_edit('edit', id)
            // });
            // approve Form
            $("#manage_all").on("click", ".approve", function() {
                var id = $(this).attr('id');
                ajax_submit_approve('approve', id)
            });
            // Delete
            $("#manage_all").on("click", ".delete", function() {
                var id = $(this).attr('id');
                delete_modal('delete_modal', id)
            });
        });
    </script>
@stop
