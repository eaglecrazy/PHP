const $input = $("#file-input");
const $submit = $("#submit");
let file;


$input.change(function () {
    file = this.files;
});

$submit.click((e) => {
    e.preventDefault();

    if (!typeof files)
        return;
    let data = new FormData();
    data.append('upload_file', file[0]);

    $.ajax({
        url: 'homework4-add-file.php',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: (respond, status, jqXHR) => {
            console.log('AJAX запрос успешен');
            renderPhoto(parseInt(jqXHR.responseText.replace(`"`, ``)));
        },
        error: (jqXHR, status, errorThrown) => {
            console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
        }
    });
})

const $gallery = $(".photos");

function renderPhoto(num) {
    if (num < 10)
        num = '0' + num;
    $gallery.append(`
            <a href="homework4-show.php?name=big${num}">
                <img class="small-image" src="img/small/small${num}.jpg" alt="small${num}" data-number="${num}" id="small${num}">    
            </a>`);

    $(`#small${num}`).click(function (e) {
        e.preventDefault();
        $bigImage.attr('src', `img/big/big${e.target.getAttribute('data-number')}.jpg`);
        $modal.fadeIn("slow", function () {
        });
    });

}
