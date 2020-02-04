const $button_lk = $('#button-lk');
const $modal = $('#modal');

//загрузим данные для модального окна и покажем его
$button_lk.click(() => {
    if ($modal.is(':empty')) {
        $.get('authorisation-page.php', (page) => {
            $modal.append(page);
            //повесим событие на закрытие окна
            $('#modal-close').click(() => {
                $modal.fadeOut('fast');
            });
        }).fail(() => {
            alert('Не удалось загрузить модальное окно');
            $modal.fadeOut('fast');
        })
    }
    $modal.fadeIn('fast');
});
