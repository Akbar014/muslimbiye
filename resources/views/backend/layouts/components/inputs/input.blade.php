<div class="mb-4 pt-3 {{ isset($div_css) ? $div_css : '' }}" style="{{ isset($style) ? $style : '' }}">
    <label for="{{ $slug }}">{!! $title !!} <span
            class="text-danger">{{ isset($required) && $required == true ? '*' : '' }}</span></label>
    <input type="{{ isset($input_type) ? $input_type : 'text' }}"
        class="form-control{{ $errors->has($slug) ? ' is-invalid' : '' }} mt-2" id="{{ $slug }}"
        name="{{ $slug }}{{ isset($array) ? '[]' : '' }}" value="{{ isset($input_value) ? $input_value : '' }}"
        placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
        {{ isset($required) && $required == true ? 'required' : '' }} {!! isset($decimal) ? "step='.01'" : '' !!} />
    @error($slug)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
