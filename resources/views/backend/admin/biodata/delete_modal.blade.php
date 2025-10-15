<form id='delete_biodata' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
      <input type="hidden" name="_method" value="DELETE">
    <div class="form-row">
        <div class="form-group col-md-12 col-sm-12">
            <label for=""> Why you want to delete the biodata? (Describe Briefly)<span class="color: red">*</span> </label>
            <textarea class="form-control" id="delete_note" name="delete_note" value="" placeholder="Why you delete this biodta ?"
                   required></textarea>
            <span id="error_delete_note" class="has-error"></span>
        </div>
        <div class="col-md-12 mb-3 mt-3">
            <button type="submit" class="btn btn-danger button-submit"
                    data-loading-text="Loading..."> Delete
            </button>
        </div>
    </div>
</form>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {


        $('#delete_biodata').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                delete_note: {
                    required: true
                }
            },
            // Messages for form validation
            messages: {
                delete_note: {
                    required: 'Enter note'
                }
            },
            submitHandler: function (form) {
                var myData = new FormData($("#delete_biodata")[0]);
                swal({
                    title: "Confirm to delete this biodata",
                    text: "Biodata will be submitted for review.",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete!"
                }, function () {
                    $.ajax({
                        url: 'softdestroy/' + '{{ $data->id }}',
                        type: 'POST',
                        data: myData,
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data.type === 'success') {
                                swal("Done!", "It was succesfully delete!", "success");
                                reload_table();
                                notify_view(data.type, data.message);
                                $('#loader').hide();
                                $("#submit").prop('disabled', false); // disable button
                                $("html, body").animate({scrollTop: 0}, "slow");
                                $('#myModal').modal('hide'); // hide bootstrap modal

                            } else if (data.type === 'error') {
                                if (data.errors) {
                                    $.each(data.errors, function (key, val) {
                                        $('#error_' + key).html(val);
                                    });
                                }
                                $("#status").html(data.message);
                                $('#loader').hide();
                                $("#submit").prop('disabled', false); // disable button
                                swal("Error sending!", "Please try again", "error");

                            }

                        }
                    });
                });

            }
            // <- end 'submitHandler' callback
        });                    // <- end '.validate()'

    });
</script>
