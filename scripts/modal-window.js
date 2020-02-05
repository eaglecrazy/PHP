const $button_enter = $('#button-enter');
const $modal = $('#modal');


$.get('../components/authorisation.php', (page) => {
    $modal.append(page);
    //повесим событие на закрытие окна
    $('#modal-close').click(() => {
        $modal.fadeOut('fast');
    });
}).fail(() => {
    alert('Не удалось загрузить модальное окно');
});



$button_enter.click(() => {
    //добавим для отображения flex (по умолчанию display : none)
    // $modal.css('display', 'flex');
    $modal.fadeIn('fast');
});
