@extends('frontend_new.layouts.master')
@section('title', 'MuslimBie | মুসলিম বিয়ে - হোম')
@section('content')
    <div class="od-content-main">
        <div class="od-user-account-container">
            <div class="od-row">
                @include('frontend_new.user.components.sidebar')
                @include('frontend_new.user.favourite.favourite')
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function removeFavouriteFromList(id, classname) {
            Swal.fire({
                title: "@lang('site.are_you_sure')",
                text: "@lang('site.biodata_will_not_listed')",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#e92f83",
                cancelButtonColor: "#522b79",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire({
                    //     title: "Deleted!",
                    //     text: "Your file has been deleted.",
                    //     icon: "success"
                    // });

                    removeFromFavourites(id, function(data) {
                        if (data?.status == 'success') {
                            document.getElementById(classname).style.display = 'none';
                        }
                    });
                }
            });
        }
    </script>
@endsection
