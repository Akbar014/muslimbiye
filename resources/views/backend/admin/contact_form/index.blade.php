@extends('backend.layouts.master')
@section('title', 'Contact Forms')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>All Contact Forms</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="manage_all"
                               class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                {{-- 
                                <th>Connection Amount</th>
                                <th>Price</th>
                                <th>Status</th> --}}
                                {{-- <th>Action</th> --}}
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
        $(function () {
            table = $('#manage_all').DataTable({

                processing: true,
                serverSide: true,
                ajax:"{{ route('admin.contact_form.all')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'user'},
                    {data: 'email', name: 'email'},
                    {data: 'subject', name: 'subject'},
                    {data: 'message', name: 'message'},
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

        $(document).ready(function () {
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
            $("#manage_all").on("click", ".approve", function () {
                var id = $(this).attr('id');
                ajax_submit_approve('approve', id)
            });
            // Delete
            $("#manage_all").on("click", ".delete", function () {
                    var id = $(this).attr('id');
                    ajax_submit_delete('destroy',id)
                });
            });

    </script>
@stop
