@extends('backend.layouts.master')
@section('title', 'Create Coupons')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>{{ isset($data) ? 'Update Coupon' : 'Create New Coupon' }}</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form id='store'
                action="{{ isset($data) ? route('admin.coupons.update', $data->id) : route('admin.coupons.store') }}"
                enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div id="status"></div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group mb-4 d-block">
                                    <label for="code">Coupon Code</label>
                                    <input type="text" name="code" id="code" class="form-control"
                                        placeholder="Coupon Code" value="{{ isset($data) ? $data->code : '' }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4 d-block">
                                    <label for="connection_amount">Connection Amount</label>
                                    <input type="number" name="connection_amount" id="connection_amount"
                                        class="form-control" value="{{ isset($data) ? $data->connection_amount : '' }}"
                                        placeholder="Total Connections" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4 d-block">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control"
                                        value="{{ isset($data) ? $data->start_date : '' }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4 d-block">
                                    <label for="end_date">End Date</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control"
                                        value="{{ isset($data) ? $data->end_date : '' }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4 d-block">
                                    <label for="usage_limit">Usage Limit</label>
                                    <input type="number" id="usage_limit" name="usage_limit" placeholder="Eg: 10"
                                        class="form-control" value="{{ isset($data) ? $data->usage_limit : '' }}" required>
                                </div>
                            </div>
                            @if (isset($data))
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="d-block">Status</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineradio1"
                                                value="0" {{ isset($data) && $data->status == '0' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineradio1">Inactive</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineradio2"
                                                value="1" {{ isset($data) && $data->status == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineradio2">Active</label>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
