<script src="https://cdn.tiny.cloud/1/u52u8z22ugown233ypp73gk1jkhqfy28rwzmnr759q9actzo/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  const example_image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    const url = "{{ route('editor.image.upload') }}";
    xhr.withCredentials = true;
    xhr.open('POST', url);

    xhr.upload.onprogress = (e) => {
      progress(e.loaded / e.total * 100);
    };

    xhr.onload = () => {
      if (xhr.status === 403) {
        reject({
          message: 'HTTP Error: ' + xhr.status,
          remove: true
        });
        return;
      }

      if (xhr.status < 200 || xhr.status >= 300) {
        reject('HTTP Error: ' + xhr.status);
        return;
      }

      const json = JSON.parse(xhr.responseText);

      if (!json || typeof json.location != 'string') {
        reject('Invalid JSON: ' + xhr.responseText);
        return;
      }

      resolve(json.location);
    };

    xhr.onerror = () => {
      reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
    };

    const formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());
    formData.append('_token', '{{ csrf_token() }}');

    xhr.send(formData);
  });

  var url = "{{ route('editor.image.upload') }}";

  tinymce.init({
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    images_upload_handler: example_image_upload_handler,
    relative_urls: false,
    remove_script_host: false,
    convert_urls: true,
    images_reuse_filename: true,
    plugins: 'autosave fullscreen preview directionality anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | preview | fullscreen | link image media table | ltr rtl |  bold italic underline strikethrough | blocks fontfamily fontsize | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat ',
    autosave_interval: '3s',
    fullscreen_native: true,
  });
</script>