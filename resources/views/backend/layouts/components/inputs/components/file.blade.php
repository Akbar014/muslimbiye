<div class="form-group col-12 {{ isset($previous_file) && $previous_file != null ? 'col-md-6' : '' }}">
    <label for="{{ $slug }}">{{ $title }} <span
            class="text-danger">{{ isset($required) && $required == true ? '*' : '' }}</span></label>
    <input type="file" class="form-control{{ $errors->has($slug) ? ' is-invalid' : '' }}"
        accept="{{ isset($file_accept) ? $file_accept : '' }}" id="{{ $slug }}" name="{{ $slug }}"
        {{ isset($required) && $required == true && !isset($previous_file) ? 'required' : '' }}>
    <span id="error_{{ $slug }}" class="has-error text-danger"></span>
</div>
@if (isset($previous_file))
    <div class="form-group col-12 col-md-6">
        <label for="{{ $slug }}">Previous {{ $title }}</label>
        <div class="form-control">
            @if (isset($previous_file) && $previous_file != null)
                <a href="{{ $previous_file }}" target="_BLANK">Show Attachment</a>
            @else
                <span>No Previous Attachment Added</span>
            @endif
        </div>
    </div>
@endif
