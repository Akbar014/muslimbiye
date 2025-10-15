@extends('backend.layouts.master')
@section('title', 'Settings')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>Page Content</div>
            </div>
        </div>
        <div class="page-title-actions mt-5">
            <a href="{{route('admin.faqs.index')}}" class="btn-shadow mr-3 btn btn-dark" id="manage_all">
                <i class="fa fa-plus-circle"></i> Edit FAQs
            </a>
            <a href="{{route('admin.guides.index')}}" class="btn-shadow mr-3 btn btn-dark" id="manage_all">
                <i class="fa fa-plus-circle"></i> Edit Guides
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form id='edit' action="{{route('admin.settings.page_content_update')}}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div id="status"></div>
                {{-- {{method_field('PATCH')}} --}}
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h4>About Us (Bangla)</h4>
                        </div>
                        <div class="card-body">
                          <div class="form-group row mb-4 d-block">
                            <textarea class="tinymce-editor_about_us " name="about_us">{{$content ? $content->about_us : ""}}</textarea>

                          </div>
                          <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary button-submit">Publish</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <h4>About Us (English)</h4>
                        </div>
                        <div class="card-body">
                          <div class="form-group row mb-4 d-block">
                            <textarea class="tinymce-editor_about_us_en " name="about_us_en">{{$content ? $content->about_us_en : ""}}</textarea>

                          </div>
                          <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary button-submit">Publish</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <h4>Terms of Service</h4>
                        </div>
                        <div class="card-body">
                          <div class="form-group row mb-4 d-block">
                            <textarea class="tinymce-editor_terms " name="terms">{{$content ? $content->terms : ""}}</textarea>

                          </div>
                          <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary button-submit">Publish</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <h4>Privacy Policy</h4>
                        </div>
                        <div class="card-body">
                          <div class="form-group row mb-4 d-block">
                            <textarea class="tinymce-editor_privacy_policy " name="privacy_policy">{{$content ? $content->privacy_policy : ""}}</textarea>

                          </div>
                          <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary button-submit">Publish</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <h4>Refund Policy</h4>
                        </div>
                        <div class="card-body">
                          <div class="form-group row mb-4 d-block">
                            <textarea class="tinymce-editor_refund_policy " name="refund_policy">{{$content ? $content->refund_policy : ""}}</textarea>

                          </div>
                          <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary button-submit">Publish</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- <div class="card">
                        <div class="card-header">
                          <h4>Mission</h4>
                        </div>
                        <div class="card-body">
                          <div class="form-group row mb-4 d-block">
                            <textarea class="tinymce-editor " name="mission">{{$content ? $content->mission : ""}}</textarea>

                          </div>
                          <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-7">
                              <button class="btn btn-primary">Publish</button>
                            </div>
                          </div>
                        </div>
                      </div> --}}
                      {{-- <div class="card">
                        <div class="card-header">
                          <h4>Vision</h4>
                        </div>
                        <div class="card-body">
                          <div class="form-group row mb-4 d-block">
                            <textarea class="tinymce-editor_vision " name="vision">{{$content ? $content->vision : ""}}</textarea>

                          </div>
                          <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-7">
                              <button type="submit" class="btn btn-primary button-submit">Publish</button>
                            </div>
                          </div>
                        </div>
                      </div> --}}
                      {{-- <div class="card">
                        <div class="card-header">
                          <h4>Admin Info</h4>
                        </div>
                        <div class="card-body">
                          <div class="form-group row mb-4 d-block">
                            <textarea class="tinymce-editor_admin_info " name="admin_info">{{$content ? $content->admin_info : ""}}</textarea>

                          </div>
                          <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary button-submit">Publish</button>
                            </div>
                          </div>
                        </div>
                      </div> --}}
                      {{-- <div class="card">
                        <div class="card-header">
                          <h4>Achievement</h4>
                        </div>
                        <div class="card-body">
                          <div class="form-group row mb-4 d-block">
                            <textarea class="tinymce-editor_achievement " name="achievement">{{$content ? $content->achievement : ""}}</textarea>

                          </div>
                          <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary button-submit">Publish</button>
                            </div>
                          </div>
                        </div>
                      </div> --}}
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

    <script type="text/javascript">

        $(document).ready(function () {
            // View Form
            $("#manage_all").on("click", ".view", function () {
                var id = $(this).attr('id');
                ajax_submit_view('settings', id)
            });

            // Edit Form
            $("#manage_all").on("click", ".edit", function () {
                var id = $(this).attr('id');
                ajax_submit_edit('settings', id)
            });

        });
        $("#layout option").val(function (idx, val) {
        $(this).siblings("[value='" + this.value + "']").remove();
        return val;
    });
    // $('.button-submit').click(function () {
    //     // route name and record id
    //     ajax_submit_update('/page_content/update')
    // });
    </script>
@stop
@section('css')
<style>
  .tox-notifications-container {
    display: none;
  }
</style>
@endsection
@section('js')
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea.tinymce-editor',
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
    tinymce.init({
        selector: 'textarea.tinymce-editor_about_us',
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
    tinymce.init({
        selector: 'textarea.tinymce-editor_about_us_en',
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
    tinymce.init({
        selector: 'textarea.tinymce-editor_terms',
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
    tinymce.init({
        selector: 'textarea.tinymce-editor_vision',
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
    tinymce.init({
        selector: 'textarea.tinymce-editor_admin_info',
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
    tinymce.init({
        selector: 'textarea.tinymce-editor_privacy_policy',
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
    tinymce.init({
        selector: 'textarea.tinymce-editor_refund_policy',
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
    tinymce.init({
        selector: 'textarea.tinymce-editor_achievement',
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
