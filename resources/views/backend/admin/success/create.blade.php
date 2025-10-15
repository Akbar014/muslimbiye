@extends('backend.layouts.master')
@section('title', 'Success Story')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>Create Success Story</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form id='store' action="{{route('admin.success.store')}}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div id="status"></div>
                {{-- {{method_field('PATCH')}} --}}
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                            <div class="form-group row mb-4 d-block">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" required>
                            </div>
                          <div class="form-group row mb-4 d-block">
                            <label for="">Story</label>
                            <textarea class="success-story" name="story"></textarea>
                          </div>
                          <div class="form-group row mb-4 mx-1">
                            <label class="form-check-label" for="image">Image (Optional)</label>
                            <input class="form-control" type="file" name="image" id="image">
                          </div>
                          <div class="form-group">
                            <label class="d-block">Status</label>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="inlineradio1" value="0">
                              <label class="form-check-label" for="inlineradio1">Pending</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" checked name="status" id="inlineradio2" value="1">
                              <label class="form-check-label" for="inlineradio2">Approve</label>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-7">
                              <button class="btn btn-primary">Publish</button>
                            </div>
                          </div>
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
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea.success-story',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount', 'image'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });

</script>
@endsection
@section('css')
<style>
  .tox-notifications-container {
    display: none;
  }
</style>
@endsection