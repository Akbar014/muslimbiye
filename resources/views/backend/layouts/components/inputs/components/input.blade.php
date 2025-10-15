<div class="mb-4 {{ isset($div_css) ? $div_css : '' }}">
    <label for="{{ $slug }}">{!! $title !!} <span
            class="text-danger">{{ isset($required) && $required == true ? '*' : '' }}</span></label>
    <input type="{{ isset($input_type) ? $input_type : 'text' }}"
        class="form-control{{ $errors->has($slug) ? ' is-invalid' : '' }}" id="{{ $slug }}"
        name="{{ $slug }}{{ isset($array) ? '[]' : '' }}" value="{{ isset($input_value) ? $input_value : '' }}"
        placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
        {{ isset($required) && $required == true ? 'required' : '' }} {!! isset($decimal) ? "step='.01'" : '' !!} />
    <span id="error_{{ $slug }}" class="has-error text-danger"></span>
</div>
