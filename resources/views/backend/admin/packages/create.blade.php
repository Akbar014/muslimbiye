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
            <form id='store' action="{{ isset($data) ? route('admin.packages.update', $data->id) : route('admin.packages.store') }}"
                enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div id="status"></div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-4 d-block">
                                    <label for="name">Package Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Package Name" value="{{ isset($data) ? $data->name : '' }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4 d-block">
                                    <label for="connection_amount">Total Connections</label>
                                    <input type="number" name="connection_amount" id="connection_amount"
                                        class="form-control" value="{{ isset($data) ? $data->connection_amount : '' }}" placeholder="Total Connections" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4 d-block">
                                    <label for="price">Package Price (in BDT)</label>
                                    <input type="number" id="price" name="price" class="form-control"
                                        placeholder="Package Price" value="{{ isset($data) ? $data->price : '' }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="d-block">Status</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="inlineradio1"
                                            value="0" {{isset($data) && $data->status == '0'?'checked':''}}>
                                        <label class="form-check-label" for="inlineradio1">Inactive</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="inlineradio2" value="1" {{isset($data) && $data->status == '1'?'checked':''}}>
                                        <label class="form-check-label" for="inlineradio2">Active</label>
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
