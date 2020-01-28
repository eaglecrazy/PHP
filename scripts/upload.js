const $input = $("#file-input");
const $submit = $("#submit");
let files;


$input.change(function () {
    files = this.files;
});

$submit.click((e) => {
    e.preventDefault();

    if (!typeof files)
        return;
    let data = new FormData();

    $.each( files, function( key, value ){
        data.append( key, value );
    });


    data.append('my_file_upload', 1);

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