<div class="mb-4  pt-3 select_container {{ isset($div_css) ? $div_css : '' }}" style="{{ isset($style) ? $style : '' }}">
    <label for="{{ $slug }}">{{ $title }} <span
            class="text-danger">{{ isset($required) && $required == true ? '*' : '' }}</span></label>
    <select
        class="form-control cursor-pointer  mt-2 {{ isset($multiple) ? 'select2' : '' }} {{ $errors->has($slug) ? ' is-invalid' : '' }}"
        id="{{ $slug }}" name="{{ $slug }}{{ isset($multiple) ? '[]' : '' }}" style="cursor: pointer;"
        {{ isset($required) && $required == true ? 'selected' : '' }}
        {{ isset($multiple) && $multiple ? 'multiple' : '' }} {!! isset($additional) ? $additional : '' !!}>
        @if (!isset($multiple))
            <option value="">Select One</option>
        @endif
        @if (isset($input_options))
            @foreach ($input_options as $key => $option)
                @if (isset($multiple))
                    <option value="{{ $key }}"
                        {{ isset($input_value) && in_array($key, $input_value ?? '[]') ? 'selected' : '' }}>
                        {{ $option }}</option>
                @else
                    <option value="{{ $key }}"
                        {{ isset($input_value) && $input_value == $key ? 'selected' : '' }}>
                        {{ $option }}</option>
                @endif
            @endforeach
        @endif
    </select>
    @error($slug)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
{{-- <script>
    {!! isset($multiple) && $multiple ? "multiselect_ids.push('" . $slug . "')" : '' !!}

    if (typeof triggerMultiSelect === "function") {
        triggerMultiSelect();
    }
</script> --}}
<style>
    .select_container .dropdown-toggle {
        padding: .75rem 1rem;
    }

    .select_container .filter-multi-select>.dropdown-menu>.filter>button {
        font-size: 23px;
        margin-top: 1px;
    }
</style>
