$select = $('.select');
$result = $('.result');
$operands = $('.operand');
$form = $('.form');

$('#plus').click((e) => {
    e.preventDefault();
    $select.val('+');
    $form.submit();
});
$('#minus').click((e) => {
    e.preventDefault();
    $select.val('-');
    $form.submit();
});
$('#multiple').click((e) => {
    e.preventDefault();
    $select.val('*');
    $form.submit();
});
$('#divide').click((e) => {
    e.preventDefault();
    $select.val('/');
    if ($operands[1].value == 0) {
        alert('На ноль делить нельзя.');
        return;
    }
    $form.submit();
});

//отправка формы
$('.form').submit((e) => {
    e.preventDefault();

    $.get("homework6-calc-server.php",
        {
            op1: $operands[0].value,
            op2: $operands[1].value,
            sign: $select.val()
        },
        (result) => {
            console.log(result);
            $result.val(result);
        });
});