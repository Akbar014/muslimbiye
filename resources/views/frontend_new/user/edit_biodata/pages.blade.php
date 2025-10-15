@php
    $i = 0;
@endphp

<div class="nav_pages_container odd-biodata-content overflow-x-hidden">
    @include('frontend_new.user.edit_biodata.components.general', ['page_id' => $i++])
    @include('frontend_new.user.edit_biodata.components.address', ['page_id' => $i++])
    @include('frontend_new.user.edit_biodata.components.education', ['page_id' => $i++])
    @include('frontend_new.user.edit_biodata.components.family', ['page_id' => $i++])
    @include('frontend_new.user.edit_biodata.components.personal', ['page_id' => $i++])
    @include('frontend_new.user.edit_biodata.components.professional', ['page_id' => $i++])
    @include('frontend_new.user.edit_biodata.components.marrage', ['page_id' => $i++])
    @include('frontend_new.user.edit_biodata.components.expected', ['page_id' => $i++])
    @include('frontend_new.user.edit_biodata.components.commitment', ['page_id' => $i++])
    @include('frontend_new.user.edit_biodata.components.contact', ['page_id' => $i++])
</div>