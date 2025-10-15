@extends('backend.layouts.master')
@section('title', (isset($data) ? 'Edit' : 'Create') . ' Guides')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>{{ isset($data) ? 'Edit' : 'Create' }} New Guide</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form id='store'
                action="{{ isset($data) ? route('admin.guides.update', $data->id) : route('admin.guides.store') }}"
                enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div id="status"></div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-4 d-block">
                                    <label for="question_bn">Guide Question (Bangla)</label>
                                    <input type="text" name="question_bn" id="question_bn" class="form-control"
                                        placeholder="Guide Question (Bangla)"
                                        value="{{ isset($data) ? $data->question_bn : '' }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-4 d-block">
                                    <label for="answer_bn">Answer (Bangla)</label>
                                    <textarea name="answer_bn" id="answer_bn" class="answer_bn form-control" placeholder="Answer (Bangla)" required>{{ isset($data) ? $data->answer_bn : '' }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-4 d-block">
                                    <label for="question_en">Guide Question (English)</label>
                                    <input type="text" name="question_en" id="question_en" class="form-control"
                                        placeholder="Guide Question (English)"
                                        value="{{ isset($data) ? $data->question_en : '' }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-4 d-block">
                                    <label for="answer_en">Answer (English)</label>
                                    <textarea name="answer_en" id="answer_en" class="answer_en form-control" placeholder="Answer (English)" required>{{ isset($data) ? $data->answer_en : '' }}</textarea>
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
    <script>
        tinymce.init({
            selector: 'textarea.answer_bn',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });


        tinymce.init({
            selector: 'textarea.answer_en',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
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
