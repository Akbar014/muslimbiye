@extends('backend.layouts.master')
@section('title', 'Pending Bio Edit')

@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
      <div class="page-title-icon mr-2">
        <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
      </div>
      <h4 class="mb-0">Pending Bio Edit</h4>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-light">
      <i class="fa fa-arrow-left mr-1"></i> Back
    </a>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <form action="{{ route('admin.backend.admin.biodata.update', $biodata->id) }}" method="POST" autocomplete="off">
      @csrf
      @method('PUT')

      <input type="hidden" name="biodata_id" value="{{ $biodata->id }}">

      <div class="row">

        {{-- Name --}}
        <div class="col-md-6">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="groom_name"
                   value="{{ optional($contact_info)->groom_name }}"
                   class="form-control">
          </div>
        </div>


        {{-- bride Name --}}
        <div class="col-md-6">
          <div class="form-group">
            <label>Bride Name</label>
            <input type="text" name="bride_name"
                   value="{{ optional($contact_info)->bride_name }}"
                   class="form-control">
          </div>
        </div>


        {{-- biodata email --}}
        <div class="col-md-6">
          <div class="form-group">
            <label>Biodata Email</label>
            <input type="text" name="biodata_email"
                   value="{{ optional($contact_info)->biodata_email }}"
                   class="form-control">
          </div>
        </div>

        {{-- gurdian whats app num --}}
        <div class="col-md-6">
          <div class="form-group">
            <label>Gurdian Whatsapp Number</label>
            <input type="text" name="gurdian_whatsapp"
                   value="{{ optional($contact_info)->gurdian_whatsapp }}"
                   class="form-control">
          </div>
        </div>


        {{-- gurdian num --}}
        <div class="col-md-6">
          <div class="form-group">
            <label>Gurdian Number</label>
            <input type="text" name="gurdian_phone"
                   value="{{ optional($contact_info)->gurdian_phone }}"
                   class="form-control">
          </div>
        </div>
        
      </div>

      <div class="text-right">
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-save mr-1"></i> Save Changes
        </button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('css')
<style>
  .form-group label { font-weight: 600; }
</style>
@endsection
