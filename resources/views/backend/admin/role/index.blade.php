@extends('backend.layouts.master')
@section('css')
<style>
    th,td {text-align: center;}
</style>
@endsection
@section('title', 'All Roles')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>All Roles</div>
                <div class="d-inline-block ml-2">
                    @can('role-create')
                        {{-- <button class="btn btn-success" onclick="create()"><i
                                class="glyphicon glyphicon-plus"></i>
                            New Role
                        </button> --}}
                        <a href="{{route('admin.roles.create')}}">
                            <button class="btn btn-success" ><i
                                class="glyphicon glyphicon-plus"></i>
                                New Role
                            </button>
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <section class="section">
                <div class="section-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h4>Export Table</h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-striped table-hover" id="manage_all" style="width:100%;">
                              <thead>

                                <tr>
                                  <th>Sl</th>
                                  <th>Action</th>
                                  <th>Role Name</th>
                                  <th>Permission Name</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($role as $row)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @if ($row->name === 'superadmin')
                                                <span class="text-danger">N/A</span>
                                            @else                                                
                                                @if (Auth::guard('admin')->user()->can('role-update'))
                                                    <a href="{{route('admin.roles.edit',$row->id)}}" data-toggle="tooltip" id="{{$row->id}}" class="btn btn-xs btn-primary mr-1" title="Edit"><i class="fa fa-edit"></i> </a>
                                                @endif
                                                @if (Auth::guard('admin')->user()->can('role-delete'))
                                                    <a data-toggle="tooltip"id="{{$row->id}}" class="btn btn-xs btn-danger mr-1 delete" title="Delete"><i class="fa fa-trash"></i> </a>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        @if ($row->name === 'superadmin')
                                            <span class="text-danger">All Permissions are granted</span>
                                        @else
                                            {{join(', ', $row->permissions()->pluck('name')->toArray())}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
        </div>
    </div>
    <style>
        @media screen and (min-width: 768px) {
            #myModal .modal-dialog {
                width: 90%;
                border-radius: 5px;
            }
        }
    </style>
    <script>
        // $(function () {
        //     table = $('#manage_all').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax:"{{ route('admin.allRoles')}}",
        //         columns: [
        //             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        //             {data: 'name', name: 'name'},
        //             {data: 'guard_name', name: 'guard_name'},
        //             {data: 'action', name: 'action'}
        //         ],
        //         "autoWidth": false,
        //     });
        //     $('.dataTables_filter input[type="search"]').attr('placeholder', 'Type here to search...').css({
        //         'width': '220px',
        //         'height': '30px'
        //     });
        // });
    </script>
    <script type="text/javascript">
        function create() {
            ajax_submit_create('roles');
        }

        $(document).ready(function () {
            // View Form
            $("#manage_all").on("click", ".view", function () {
                var id = $(this).attr('id');
                ajax_submit_view('roles', id)
            });

            // Edit Form
            $("#manage_all").on("click", ".edit", function () {
                var id = $(this).attr('id');
                ajax_submit_edit('roles', id)
            });


            // Delete
            $("#manage_all").on("click", ".delete", function () {
                var id = $(this).attr('id');
                ajax_submit_delete('roles', id)
            });

        });

    </script>
    <!-- Page Specific JS File -->
  <script src="{{asset('assets')}}/bundles/datatables/datatables.min.js"></script>
  <script src="{{asset('assets')}}/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('assets')}}/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="{{asset('assets')}}/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="{{asset('assets')}}/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="{{asset('assets')}}/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="{{asset('assets')}}/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="{{asset('assets')}}/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="{{asset('assets')}}/js/page/datatables.js"></script>
@stop
