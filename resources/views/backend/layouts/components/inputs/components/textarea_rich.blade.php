<div class="mb-4 {{ isset($div_css) ? $div_css : '' }}">
    <label for="{{ $slug }}">{{ $title }} <span
            class="text-danger">{{ isset($required) && $required == true ? '*' : '' }}</span> </label>
    <textarea class="form-control{{ $errors->has($slug) ? ' is-invalid' : '' }}" id="{{ $slug }}"
        name="{{ $slug }}" placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
        {{ isset($required) && $required == true ? 'required' : '' }}>{{ isset($input_value) ? $input_value : '' }}</textarea>
    <span id="error_{{ $slug }}" class="has-error text-danger"></span>
</div>
{{-- tinymce --}}
@php
    $blogBody = isset($input_value) ? $input_value : '';
    $blogBody = str_replace('`', '\`', $blogBody);
    $blogBody = str_replace("$", "\\$", $blogBody);
@endphp
<script>
    tinymce.remove();
    tinymce.init({
        selector: '#{{ $slug }}',
        plugins: 'lists',
        toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright  | image link | bullist numlist outdent indent codesample | removeformat | code table help',

        setup: function(editor) {
            editor.on('init', function(e) {
                //this gets executed AFTER TinyMCE is fully initialized
                editor.setContent(`{!! $blogBody !!}`);
            });
        }
    });
</script>
{{-- tinymce end --}}
