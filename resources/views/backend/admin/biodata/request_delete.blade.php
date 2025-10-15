@extends('backend.layouts.master')
@section('title', 'Biodata')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>User Request Delete Biodata</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive PendingData">
                        <table id="manage_all"
                               class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                {{-- <th>Filling up for</th>
                                <th>Filling Biodata</th> --}}
                                <th>Name</th>
                                <th>Father Name</th>
                                {{-- <th>Father Occupation</th> --}}
                                <th>Mother Name</th>
                                {{-- <th>Mother Occupation</th> --}}
                                <th>Permanent Address</th>
                                {{-- <th>Present Address</th> --}}
                                <th>Date Of Birth</th>
                                {{-- <th>Height</th>
                                <th>Weight</th>
                                <th>Complexion</th>
                                <th>Blood Groop</th> --}}

                                <th style="width: 200px">Note</th>
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
        .PendingData tbody td:nth-child(7){
            width: 200px ;
            display: block;
        }
    </style>
    <script>
        $(function () {
            table = $('#manage_all').DataTable({

                processing: true,
                serverSide: true,
                ajax:"{{ route('admin.biodata.request_deleteData')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    // {data: 'bride_groom', name: 'bride_groom'},
                    // {data: 'person_name', name: 'person_name'},
                    {data: 'name', name: 'name'},
                    {data: 'fatherName', name: 'fatherName'},
                    // {data: 'fatherOccupation', name: 'fatherOccupation'},
                    {data: 'motherName', name: 'motherName'},
                    // {data: 'motherOccupation', name: 'motherOccupation'},
                    {data: 'permanentAddress', name: 'permanentAddress'},
                    // {data: 'presentAddress', name: 'presentAddress'},
                    {data: 'dateOfBirth', name: 'dateOfBirth'},
                    // {data: 'height', name: 'height'},
                    // {data: 'weight', name: 'weight'},
                    // {data: 'complexion', name: 'complexion'},
                    // {data: 'blood_groop', name: 'blood_groop'},

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
            // $("#manage_all").on("click", ".delete", function () {
            //         var id = $(this).attr('id');
            //         ajax_submit_delete('softdestroy',id)
            //     });

            // $("#manage_all").on("click", ".delete", function () {
            //         var id = $(this).attr('id');
            //         delete_modal('delete_modal',id)
            // });
            $("#manage_all").on("click", ".delete", function () {
                var id = $(this).attr('id');
                ajax_submit_delete('softdestroy',id)
            });
            });

    </script>
@stop
