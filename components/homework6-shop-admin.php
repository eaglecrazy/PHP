<?php
$main = '<form class="add-item" action="../server/homework6-shop-s-add-item.php" method="POST" enctype="multipart/form-data">
        <h2 class="form-heading">Добавление товара</h2>
        <label class="form-label" for="name">Наименование товара</label>
        <input type="text" name="name" id="name" class="form-add-input" value="Имя товара">
        <label class="form-label" for="cost">Стоимость товара</label>
        <input type="number" name="cost" id="cost" class="form-add-input" value="100">
        <label class="form-label" for="description">Описание товара</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-add-input">description</textarea>
        <label class="form-label" for="photo">Загрузка фотографии</label>
        <input type="file" name="photo" id="photo" class="form-add-input">
        <input type="submit" value="Добавить товар" class="form-add-input">
    </form>
    <table class="items-table">
        <tr>
            <th class="table-heading">Наименование</th>
            <th class="table-heading">Стоимость</th>
            <th class="table-heading">Описание</th>
            <th class="table-heading">Фото</th>
            <th class="table-heading">Изменить</th>
            <th class="table-heading">Удалить</th>
</tr>
<tr>
    <td class="table-cell table-cell-text">Имя 1</td>
    <td class="table-cell table-cell-text">100</td>
    <td class="table-cell table-cell-text">Описание 1</td>
    <td class="table-cell table-cell-image"><img src="../img/item.png" alt="item"></td>
    <td class="table-cell table-cell-edit"><a class="table-link-edit" href="#"><img src="../img/edit.png" alt="edit"></a></td>
    <td class="table-cell table-cell-delete"><a class="table-link-delete" href="#"><img src="../img/delete.png" alt="delete"></a></td>
</tr>
</table>';