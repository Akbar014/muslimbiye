<div class="mb-4 select_container {{ isset($div_css) ? $div_css : '' }}">
    <label for="{{ $slug }}">{{ $title }} <span
            class="text-danger">{{ isset($required) && $required == true ? '*' : '' }}</span></label>
    <select class="form-control cursor-pointer {{ $errors->has($slug) ? ' is-invalid' : '' }}" id="{{ $slug }}"
        name="{{ $slug }}{{ isset($multiple) ? '[]' : '' }}"
        {{ isset($required) && $required == true ? 'selected' : '' }}
        {{ isset($multiple) && $multiple ? 'multiple' : '' }}>
        @if (!isset($multiple) && !isset($placeholder))
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
    <span id="error_{{ $slug }}" class="has-error text-danger"></span>
</div>
<script>
    {!! isset($multiple) && $multiple ? "multiselect_ids.push('" . $slug . "')" : '' !!}

    if (typeof triggerMultiSelect === "function") {
        triggerMultiSelect();
    }
</script>
<style>
    .select_container .dropdown-toggle {
        padding: .75rem 1rem;
    }

    .select_container .filter-multi-select>.dropdown-menu>.filter>button {
        font-size: 23px;
        margin-top: 1px;
    }
</style>



{{-- 
<div class="form-group col-12 col-md-4">
    <label for="assigned_to">Assigned To <sup class="text-danger">*</sup></label>
    <select class="form-control{{ $errors->has('assigned_to') ? ' is-invalid' : '' }}"
        value="{{ old('assigned_to', isset($task) ? $task->assigned_to : '') }}" id="assigned_to"
        name="assigned_to[]" required multiple>
        @foreach ($users as $user)
            <option value="{{ $user->id }}"
                {{ isset($task) && in_array($user->id, json_decode($task->assigned_to ?? '[]')) ? 'selected' : '' }}>
                {{ $user->name }}</option>
        @endforeach
    </select>
    <span id="error_assigned_to" class="has-error text-danger"></span>
</div> --}}
