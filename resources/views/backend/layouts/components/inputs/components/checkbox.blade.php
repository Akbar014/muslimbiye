<div class="mb-4 {{ isset($div_css) ? $div_css : 'col-12' }}">
    <input type="checkbox" class="form-form-check-input {{ $errors->has($slug) ? ' is-invalid' : '' }}"
        id="{{ $slug }}" name="{{ $slug }}" {{ isset($checked) && $checked == true ? 'checked' : '' }}
        {{ isset($required) && $required == true ? 'required' : '' }} />
    <label for="{{ $slug }}"  style="cursor: pointer; user-select: none;">{{ $title }} <span
            class="text-danger">{{ isset($required) && $required == true ? '*' : '' }}</span></label>
    <span id="error_{{ $slug }}" class="has-error text-danger"></span>
</div>
