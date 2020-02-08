const $button_enter = $('#button-enter');
const $modal = $('#modal');

$button_enter.click(() => {

    $.get('../components/authorisation.php', (page) => {
        $modal.append(page);
        //повесим событие на закрытие окна
        $('#modal-close').click(() => {
            $modal.fadeOut('fast');
            $modal.text('');
        });
    }).fail(() => {
        alert('Не удалось загрузить модальное окно');
    });
    $modal.fadeIn('fast');
});
