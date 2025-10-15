<div class="col-md-4">
    <label for="{{ $slug }}">{{ $title }} <span
            class="text-danger">{{ isset($required) && $required == true ? '*' : '' }}</span></label>
    <input type="file" onchange="previewImage('{{ $slug }}_prev')"
        class="form-control{{ $errors->has($slug) ? ' is-invalid' : '' }}" id="{{ $slug }}"
        name="{{ $slug }}{{ isset($multiple) ? '[]' : '' }}" value="{{ env($slug) }}"
        {{ isset($required) && $required == true && !isset($img_output) ? 'required' : '' }}>
    <span id="error_{{ $slug }}" class="has-error text-danger"></span>
</div>
<div class="col-md-4">
    <label for="{{ $slug }}">New {{ $title }}</label>
    <label for="{{ $slug }}" class="d-block">
        <img src="" alt="" id="{{ $slug }}_prev" height="80">
    </label>
</div>
<div class="col-md-4">
    <label for="{{ $slug }}">Previous {{ $title }}</label>
    <label for="{{ $slug }}" class="d-block">
        <img src="{{ isset($img_output) ? $img_output : '' }}" alt="" height="80">
    </label>
</div>
