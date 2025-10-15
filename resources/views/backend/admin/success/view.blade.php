@extends('backend.layouts.master')
@section('title', 'Success Story')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>View Success Story</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form id='store' action="{{route('admin.success.update', $data->id )}}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                <div id="status"></div>
                {{-- {{method_field('PATCH')}} --}}
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                            <div class="media-body">
                                <h5 class="mt-0">Title</h5>
                                <p class="mb-0">{{$data->title}}</p>
                            </div>
                            <div class="media-body mt-4">
                                <h5 class="mt-0">Story</h5>
                                <p class="mb-0">{!! $data->story !!}</p>
                            </div>
                            <div class="media-body mt-4">
                                <h5 class="mt-0">Status</h5>
                                <p class="mb-0">
                                    @if ($data->status == 0)
                                        <span class="badge badge-danger">Pending</span>
                                    @else
                                     <span class="badge badge-success">Approve</span>
                                    @endif
                                </p>
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
