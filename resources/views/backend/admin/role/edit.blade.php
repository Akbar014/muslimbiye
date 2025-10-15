@extends('backend.layouts.master')
@section('css')
<style>
    th,td {text-align: center;}
</style>
@endsection
@section('title', ' Roles Edit')
@section('content')
{!! Form::model($role, ['method' => 'PATCH','id'=>'edit']) !!}
{{-- <div class="form-row">
    <div id="status"></div>
    <div class="form-group col-md-12 col-sm-12">
        <label for=""> Role Name </label>
        <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}"
               placeholder="" required>
        <span id="error_name" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-12 col-md-12">
        <strong>Assign Permissions: </strong>
        <div class='row mb-3 mt-3'>
            @foreach($permissions as $permission)
                    <div class="col-md-3 col-sm-12 mb-1">
                        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions, array('class'=>'data-check flat-green')) }}
                        {{Form::label($permission->name, $permission->name, array('class'=>'')) }}
                    </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-12 mb-3 mt-3">
        <button type="submit" class="btn btn-success"><span class="fa fa-save fa-fw"></span> Save</button>
    </div>
</div> --}}
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="form-group">
            <h5>Role Name<span class="text-warning">*</span></h5>
            <div class="controls">
                <input type="text" class="form-control @error('name') is-invalid @enderror"  id="name" name="name" value="{{$role->name}}"
                    required>
                @error('name')
                    <label id="name-error" class="error" for="name">{{ $message }}</label>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Permissions (Multiple Selection)</label>
            <br>
            <div class="controls">
                <input type="checkbox" id="checkPermissionAll" value="1" class="filled-in chk-col-info" />
                <label for="checkPermissionAll">All Permission</label>
            </div>
            <hr>
            @php
                $i = 1;
            @endphp
            @foreach ($permissionGroups as $permissionGroup)
                <div class="row">
                    <div class="col-6">
                        <div class="controls">
                            <p><span class="text-info" style="font-weight: 500; text-transform: capitalize;">
                                    <b>{{ $loop->index + 1 }}.
                                        {{ $permissionGroup->name }}
                                    </b>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-6 role-{{ $i }}-management-checkbox">
                        @php
                            $permissions = App\Models\Permission::where('group_name',$permissionGroup->name)->get();
                            $j = 1;
                           // dd($permissions);
                        @endphp
                        @foreach ($permissions as $permission)
                            <div class="controls">
                                <input type="checkbox"   name="permissions[]" class="data-check"
                                    id="checkPermission{{ $permission->id }}" {{ $role->hasPermissionTo($permission->id) ? 'checked' : '' }} value="{{ $permission->id }}"/>
                                <label
                                    for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                            @php
                                $j++;
                            @endphp
                        @endforeach
                        <br>
                    </div>
                </div>
                @php
                    $i++;
                @endphp
            @endforeach
        </div>
    </div>
</div>
<div class="box-footer">
    <a href="{{ route('admin.roles.index') }}">
        <button type="button" class="btn btn-danger">Cancel</button>
    </a>
    <button type="submit" class="btn btn-success">Save Role</button>
</div>
{{ Form::close() }}
<script>
    /**
     * Check all the permissions
     */
    $("#checkPermissionAll").click(function() {

        if ($(this).is(':checked')) {
            //alert('asd');
            // check all the checkbox
            $('input[type=checkbox]').prop('checked', true);
        } else {
           // alert('uncheck');
            // un check all the checkbox
            $('input[type=checkbox]').prop('checked', false);
        }
    });

</script>
<script>
    $(document).ready(function () {

        $('input[type="checkbox"].flat-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
        });

        $('#edit').validate({
            submitHandler: function (form) {

                var list_id = [];
                $(".data-check:checked").each(function () {
                    list_id.push(this.value);
                });
                if (list_id.length > 0) {

                    var myData = new FormData($("#edit")[0]);
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    myData.append('_token', CSRF_TOKEN);

                    swal({
                        title: "Confirm to assign " + list_id.length + " permissions",
                        text: "Assign permission with that role!",
                        type: "warning",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, Assign!"
                    }, function () {

                        $.ajax({
                            url: '{{route('admin.roles.update',$role->id)}}',
                            type: 'POST',
                            data: myData,
                            dataType: 'json',
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function (data) {

                                if (data.type === 'success') {
                                    swal("Done!", "It was succesfully done!", "success");
                                    //reload_table();
                                    notify_view(data.type, data.message);
                                    $('#myModal').modal('hide');
                                    setTimeout(function() {
                                    window.location.href = "{{route('admin.roles.index')}}";
                                    }, 3000);
                                } else if (data.type === 'error') {
                                    if (data.errors) {
                                        $.each(data.errors, function (key, val) {
                                            $('#error_' + key).html(val);
                                        });
                                    }
                                    $("#status").html(data.message);
                                    swal("Error sending!", "Please try again", "error");
                                }
                            }
                        });
                    });
                }
                else {
                    swal("", "No Permission Have Selected!", "warning");
                }
            }
        });
    });
</script>
@endsection
