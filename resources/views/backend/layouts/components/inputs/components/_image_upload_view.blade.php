<div class="form-group col-12">
    <label for="{{ $name }}">{{ $title }}</label>
    <label class="upload_drag_area {{ $errors->has($name) ? 'upload_invalid' : '' }} {{ isset($class) ? $class : '' }}"
        for="{{ $name }}">
        <i class="gd-upload"></i>
        <span>
            Click or Drag to Upload
        </span>
        <input type="file" accept="{{ isset($accept) ? $accept : '' }}" id="{{ $name }}"
            name="{{ $name }}[]" class="upload_input" multiple>
    </label>
    <span id="error_{{ $name }}" class="has-error text-danger"></span>
</div>
<div class="form-group col-12">
    <label for="{{ $name }}">Selected/Previous Files</label>
    <div class="list">
        <div class="fileDiv">
            @forelse (json_decode($previous_data->images??'[]') as $key => $image)
                <img src="{{ asset('storage/' . $previous_data->getImage($key)?->external_link) }}"
                    style="width: 100px; margin-right: 10px; margin-bottom:10px;">
            @empty
                <span class="text-light">No Files has been Selected</span>
            @endforelse
        </div>
    </div>
</div>


<style>
    .upload_drag_area {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: #fafafa;
        height: 200px;
        border-radius: 10px;
        border: 3px dashed #ddd;
        position: relative;
        cursor: pointer;
    }

    .dragOver {
        border: 3px solid #62df96 !important;
    }

    .upload_drag_area i {
        font-size: 30px;
    }

    .upload_drag_area input {
        display: none;
    }

    .upload_drag_area span {
        font-size: 20px;
        padding-top: 10px;
    }

    .upload_invalid {
        border: 2px solid #ff4b4b !important;
    }

    .upload_invalid span {
        color: #ff4b4b !important;
    }

    .list {
        border: 2px solid #f0f0f0;
        border-radius: 5px;
        padding: 5px 10px;
    }

    .fileDiv {
        width: 100%;
        padding: 10px 20px;
        border-bottom: 2px solid #f0f0f0;
        /* display: flex; */
    }

    .fileDiv p {
        margin-left: 10px;
    }
</style>

<script>
    var dropArea = document.querySelector(".upload_drag_area");
    var fileSelectorInput = document.querySelector(".upload_input");
    var listContainer = document.querySelector('.list')

    fileSelectorInput.addEventListener('change', showFiles);

    function showFiles() {
        // const files = event.target.files ?? event.dataTransfer.files; // Get the selected files
        const files = fileSelectorInput.files;


        // Clear any previous previews
        listContainer.innerHTML = '';

        // Loop through each file
        for (let i = 0; i < files.length; i++) {
            const file = files[i];

            // Check if the file is an image
            if (file.type.match('image.*')) {
                // Create a FileReader object
                const reader = new FileReader();


                // When the file is loaded, add it to the preview
                reader.onload = function(event) {
                    const imageUrl = reader.result;
                    const imgElement = document.createElement('img');
                    imgElement.src = imageUrl;
                    imgElement.style.maxWidth = '20px'; // Optional: set max width for preview

                    const fileDiv = document.createElement('div');
                    fileDiv.classList.add('fileDiv');
                    fileDiv.appendChild(imgElement);
                    fileDiv.insertAdjacentHTML('beforeend', `<p>${file.name}</p>`);


                    listContainer.appendChild(fileDiv);
                };

                // Read the image file as a data URL
                reader.readAsDataURL(file);
            }
        }
    }

    // when file is over the drag area
    dropArea.ondragover = (e) => {
        e.preventDefault();
        dropArea.classList.add('dragOver');
    }

    // when file leave the drag area
    dropArea.ondragleave = () => {
        dropArea.classList.remove('dragOver')
    }


    // when file drop on the drag area
    dropArea.ondrop = (e) => {
        e.preventDefault();
        const files = event.dataTransfer.files;
        const newTransfer = new DataTransfer();


        dropArea.classList.remove('dragOver');

        for (let i = 0; i < files.length; i++) {
            newTransfer.items.add(files[i]);
        }
        for (let i = 0; i < fileSelectorInput.files.length; i++) {
            newTransfer.items.add(fileSelectorInput.files[i]);
        }
        fileSelectorInput.files = newTransfer.files;
        showFiles(e);
    }
</script>
