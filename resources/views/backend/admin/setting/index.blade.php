@extends('backend.layouts.master')
@section('title', 'Settings')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>Website Settings</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div id="status"></div>
                {{ method_field('PATCH') }}
                <div class="form-row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6">
                        <label>Website Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $settings ? $settings->name : '' }}" placeholder="" required>
                        <span id="error_name" class="has-error"></span>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6">
                        <label>Email:</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ $settings ? $settings->email : '' }}" placeholder="">
                        <span id="error_email" class="has-error"></span>
                    </div>
                    <div class="clearfix"></div>



                    <div class="form-group col-xs-12 col-sm-12 col-md-6">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" id="contact" name="contact"
                            value="{{ $settings ? $settings->contact : '' }}" placeholder="">
                        <span id="error_contact" class="has-error"></span>
                    </div>


                    <div class="clearfix"></div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6">
                        <label>Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $settings ? $settings->address : '' }}" placeholder="" required>
                        <span id="error_address" class="has-error"></span>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-4">
                        <label class="imagecheck mb-4">
                            <img width="100" src="{{ $settings ? url('storage/' . $settings->logo) : '' }}" alt=logo
                                class="imagecheck-image">
                        </label>
                        <br>
                        <label for="logo">Logo (File must be jpg, jpeg, png)</label>
                        <div class="input-group">
                            <input id="logo" type="file" name="logo" style="display:none">
                            <div class="input-group-prepend">
                                <a class="btn btn-secondary text-white" onclick="$('input[id=logo]').click();">Browse</a>
                            </div>
                            <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName"
                                value="{{ $settings ? $settings->logo : '' }}" readonly>
                        </div>
                        <script type="text/javascript">
                            $('input[id=logo]').change(function() {
                                $('#SelectedFileName').val($(this).val());
                            });
                        </script>
                        <span id="error_logo" class="has-error"></span>
                    </div>
                    <div class="col-md-4">
                        <label class="imagecheck mb-4">
                            <img width="100" src="{{ $settings ? url('storage/' . $settings->footer_logo) : '' }}" alt=logo
                                class="imagecheck-image">
                        </label>
                        <br>
                        <label for="footer_logo">Logo (File must be jpg, jpeg, png)</label>
                        <div class="input-group">
                            <input id="footer_logo" type="file" name="footer_logo" style="display:none">
                            <div class="input-group-prepend">
                                <a class="btn btn-secondary text-white"
                                    onclick="$('input[id=footer_logo]').click();">Browse</a>
                            </div>
                            <input type="text" name="SelectedFileNamefooter_logo" class="form-control"
                                id="SelectedFileNamefooter_logo" value="{{ $settings ? $settings->footer_logo : '' }}"
                                readonly>
                        </div>
                        <script type="text/javascript">
                            $('input[id=footer_logo]').change(function() {
                                $('#SelectedFileNamefooter_logo').val($(this).val());
                            });
                        </script>
                        <span id="error_footer_logo" class="has-error"></span>
                    </div>
                    <div class="col-md-4">
                        <label class="imagecheck mb-4">
                            <img width="100" src="{{ $settings ? url('storage/' . $settings->favicon) : '' }}" alt=logo
                                class="imagecheck-image">
                        </label>
                        <br>
                        <label for="favicon">favicon (File must be jpg, jpeg, png)</label>
                        <div class="input-group">
                            <input id="favicon" type="file" name="favicon" style="display:none">
                            <div class="input-group-prepend">
                                <a class="btn btn-secondary text-white"
                                    onclick="$('input[id=favicon]').click();">Browse</a>
                            </div>
                            <input type="text" name="SelectedFavicon" class="form-control" id="SelectedFavicon"
                                value="{{ $settings ? $settings->favicon : '' }}" readonly>
                        </div>
                        <script type="text/javascript">
                            $('input[id=favicon]').change(function() {
                                $('#SelectedFileName').val($(this).val());
                            });
                        </script>
                        <span id="error_favicon" class="has-error"></span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 mt-4">
                        <label>Facebook:</label>
                        <input type="text" class="form-control" id="social_facebook" name="social_facebook"
                            value="{{ $settings ? $settings->social_facebook : '' }}" placeholder="">
                        <span id="error_social_facebook" class="has-error"></span>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 mt-4">
                        <label>Twitter:</label>
                        <input type="text" class="form-control" id="social_twitter" name="social_insta"
                            value="{{ $settings ? $settings->social_insta : '' }}" placeholder="">
                        <span id="error_social_twitter" class="has-error"></span>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6">
                        <label>Linkedin:</label>
                        <input type="text" class="form-control" id="social_linkedin" name="social_linkedin"
                            value="{{ $settings ? $settings->social_linkedin : '' }}" placeholder="">
                        <span id="error_social_linkedin" class="has-error"></span>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-6">
                        <label>Youtube:</label>
                        <input type="text" class="form-control" id="social_youtube" name="social_youtube"
                            value="{{ $settings ? $settings->social_youtube : '' }}" placeholder="">
                        <span id="error_social_social_youtube" class="has-error"></span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6">
                        <label>Tutorial Video Link (Youtube)</label>
                        <input type="text" class="form-control" id="ytLink" name="ytLink"
                            value="{{ $settings ? $settings->ytLink : '' }}"
                            placeholder="https://youtube.com/watch?v=..." />
                        <span id="error_ytLink" class="has-error"></span>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6">
                        <label>Show Statistics</label>
                        <select class="form-control" id="show_statistics" name="show_statistics"
                            value="{{ $settings ? $settings->show_statistics : '' }}" >
                            <option value="1" {{ $settings->show_statistics == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $settings->show_statistics == 0 ? 'selected' : '' }}>No</option>
                        </select>
                        <span id="error_show_statistics" class="has-error"></span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success button-submit" data-loading-text="Loading..."><span
                                class="fa fa-save fa-fw"></span> Save
                        </button>
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
    <script>
        $(function() {
            table = $('#manage_all').DataTable({

                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.allSettings') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'layout',
                        name: 'layout'
                    },
                    {
                        data: 'running_year',
                        name: 'running_year'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                "autoWidth": false,
            });
            $('.dataTables_filter input[type="search"]').attr('placeholder', 'Type here to search...').css({
                'width': '220px',
                'height': '30px'
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // View Form
            $("#manage_all").on("click", ".view", function() {
                var id = $(this).attr('id');
                ajax_submit_view('settings', id)
            });

            // Edit Form
            $("#manage_all").on("click", ".edit", function() {
                var id = $(this).attr('id');
                ajax_submit_edit('settings', id)
            });

        });
        $("#layout option").val(function(idx, val) {
            $(this).siblings("[value='" + this.value + "']").remove();
            return val;
        });
        $('.button-submit').click(function() {
            // route name and record id
            ajax_submit_update('settings', "{{ $settings ? $settings->id : 0 }}")
        });
    </script>

@stop
