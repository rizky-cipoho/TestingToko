// Default ckeditor
ClassicEditor
    .create(document.querySelector('#editor1'))
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#editor2'))
    .catch(error => {
        console.error(error);
    });