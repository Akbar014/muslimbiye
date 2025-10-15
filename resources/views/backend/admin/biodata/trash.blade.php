@extends('backend.layouts.master')
@section('title', 'BioData')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>Trash Biodata</div>
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
                                <th>Father Name</th>
                                <th>Mother Name</th>
                                <th>Permanent Address</th>
                                <th>Present Address</th>
                                <th>Date Of Birth</th>
                                <th>Note</th>

                                <th>Submited Date</th>
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
        $(function () {
            table = $('#manage_all').DataTable({

                processing: true,
                serverSide: true,
                ajax:"{{ route('admin.biodata.trash')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'fatherName', name: 'fatherName'},
                    {data: 'motherName', name: 'motherName'},
                    {data: 'permanentAddress', name: 'permanentAddress'},
                    {data: 'presentAddress', name: 'presentAddress'},
                    {data: 'dateOfBirth', name: 'dateOfBirth'},
                    {data: 'note', name: 'note'},

                    {data: 'submited_date', name: 'submited_date'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action'}
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
            //     ajax_submit_view('settings', id)
            // });

            // // Edit Form
            // $("#manage_all").on("click", ".edit", function () {
            //     var id = $(this).attr('id');
            //     ajax_submit_edit('settings', id)
            // });
      // Delete
            $("#manage_all").on("click", ".delete", function () {
                var id = $(this).attr('id');
                ajax_submit_delete('destory',id)
            });
            $("#manage_all").on("click", ".reverse", function () {
                var id = $(this).attr('id');
                var button= 'Reverse to pending'
                var text= 'pending'
                ajax_submit_reverse('reverse',id,text,button)
            });
        });

    </script>
@stop
