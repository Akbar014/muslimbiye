<div class="flex items-center justify-between w-full">
    @if ($page_id > 0)
        <button class="!py-2 !px-4 rounded-sm cursor-pointer bg-slate-200" type="button" onclick="prevPage({{ $page_id }})">@lang('site.previous_page')</button>
    @else
        <div></div>
    @endif
    <input type="hidden" name="page_id" value="{{ $page_id }}">
    <button class="!py-2 !px-4 rounded-sm cursor-pointer bg-secondary-color text-white" type="submit" id="submit_biodata_page_{{ $page_id }}">@lang('site.submit')</button>
</div>
