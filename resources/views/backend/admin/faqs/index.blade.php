@extends('backend.layouts.master')
@section('title', 'All Faqs')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper justify-content-between">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>All Faqs</div>
            </div>
            <div>
                <a href="{{ route('admin.faqs.create') }}" class="btn-shadow btn btn-dark">
                    <i class="fa fa-plus-circle"></i> Create
                </a>
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
                                    <th>#</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                ajax: "{{ route('admin.faqs.all') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'question',
                        name: 'question'
                    },
                    {
                        data: 'answer',
                        name: 'answer'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
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

            // Edit Form
            $("#manage_all").on("click", ".edit", function () {
                var id = $(this).attr('id');
                ajax_submit_edit('edit', id)
            });
            // approve Form
            // $("#manage_all").on("click", ".approve", function() {
            //     var id = $(this).attr('id');
            //     ajax_submit_approve('approve', id)
            // });
            // Delete
            $("#manage_all").on("click", ".delete", function() {
                var id = $(this).attr('id');
                ajax_submit_delete('destroy', id)
            });
        });
    </script>
@stop
