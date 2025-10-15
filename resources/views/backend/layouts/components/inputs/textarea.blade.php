<div class="mb-4 {{ isset($div_css) ? $div_css : '' }}" style="{{ isset($style) ? $style : '' }}"
    id="{{ isset($mainSectionId) ? $mainSectionId : '' }}">
    <label for="{{ $slug }}">{{ $title }} <span
            class="text-danger">{{ isset($required) && $required == true ? '*' : '' }}</span> </label>
    <textarea class="form-control{{ $errors->has($slug) ? ' is-invalid' : '' }}" id="{{ $slug }}"
        name="{{ $slug }}" placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
        {{ isset($required) && $required == true ? 'required' : '' }}>{{ isset($input_value) ? $input_value : '' }}</textarea>
    <span id="error_{{ $slug }}" class="has-error text-danger"></span>
</div>
