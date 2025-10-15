@extends('backend.layouts.master')
@section('title', 'Create Packages')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>Create New Package</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form id='store' action="{{ route('admin.biodata.update_status', $data->id) }}" enctype="multipart/form-data"
                method="post" accept-charset="utf-8">
                @csrf
                <div id="status">asfd</div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="d-block">Status</label>
                                    <div class="form-check form-check-inline d-flex align-items-baseline">
                                        <input class="form-check-input" type="radio" name="status" id="pending"
                                            value="1" {{ isset($data) && $data->status == '1' ? 'checked' : '' }}
                                            style="margin-top: 0.4rem;">
                                        <label class=" d-inline-block ml-3 cursor-pointer" for="pending">
                                            <span class="badge badge-warning" style='cursor:pointer'>Pending</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline d-flex align-items-baseline">
                                        <input class="form-check-input" type="radio" name="status" id="approved"
                                            value="2" {{ isset($data) && $data->status == '2' ? 'checked' : '' }}
                                            style="margin-top: 0.4rem;">
                                        <label class=" d-inline-block ml-3" for="approved"><span class="badge badge-success"
                                            style='cursor:pointer'>Approved</span></label>
                                    </div>
                                    <div class="form-check form-check-inline d-flex align-items-baseline">
                                        <input class="form-check-input" type="radio" name="status" id="suspended"
                                            value="3" {{ isset($data) && $data->status == '3' ? 'checked' : '' }}
                                            style="margin-top: 0.4rem;">
                                        <label class=" d-inline-block ml-3" for="suspended"><span class="badge badge-danger"
                                                style='cursor:pointer'>Suspended</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <button class="btn btn-primary">Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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


@stop
@section('js')

@endsection
@section('css')
    <style>
        .tox-notifications-container {
            display: none;
        }
    </style>
@endsection
