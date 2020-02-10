const $button_add = $('.item-info-button');
//$modal уже объявлен в хидере
// const $modal = $('#modal');

$button_add.click((e) => {
    $.get('../server/add-item-to-cart.php?id=' + e.target.id, (page) => {
        $modal.fadeOut(0);
        $modal.append(page);
    }).fail(() => {
        alert('Не удалось загрузить модальное окно');
    });
    $modal.fadeIn(100);
    $modal.fadeOut(1000);
    $button_add.prop("disabled", true);
    setTimeout(() => {$button_add.prop("disabled", false);}, 1000);
    $modal.text('');
});
