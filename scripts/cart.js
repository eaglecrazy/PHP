//удаление элемента
$('.cart-item-cross').click((e) => {
    client = $('.user-info').text();
    id = e.target.id.replace('cross-', '');
    $.get(`../server/cart-delete-item.php?id=${id}&client=${client}`, ((answer) => {
        $('#' + id).remove();
        const result = JSON.parse(answer);
        const total_count = result['total_count'];
        const total_cost = result['total_cost'];
        // alert(total_cost);
        // alert(total_count);
        $('.cart-info-quantity').text(total_count + ' шт.');
        $('.cart-info-price').text(total_cost + ' руб.');
    }))
    .fail(() => {
        alert('Не удалось удалить ' + $id);
    });
});