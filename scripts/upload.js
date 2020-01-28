const $input = $("#file-input");
const $submit = $("#submit");
let file;


$input.change(function () {
    file = this.files;
});

$submit.click((e) => {
    e.preventDefault();

    if (!typeof file)
        return;
    const data = new FormData();
    //
    // $.each(file, (key,value) => {
    //     console.log('key = ' + key);
    //     console.log('val = ' + value);
    // })

    data.append('file', file);
    // data.append('file-input', 1);

    $.ajax({
        url : 'homework4-add-file.php',
        type : 'POST',
        data : data,
        cache : false,
        dataType : 'json',
        processData : false,
        contentType : false,
        success : (respond, status, jqXHR) => {
            console.log( 'AJAX запрос успешен: ' + respond.files, status, jqXHR );
        },
        error : ( jqXHR, status, errorThrown ) => {
            console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
        }
    });
})