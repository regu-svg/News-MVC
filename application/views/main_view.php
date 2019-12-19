<?php
/** @var model_news $model */
//валидация (проверка)
if (!empty($model->errors)) {
    echo "<br>";
    foreach ($model->errors as $key => $error) {
        echo "<p>Поле $key не заполнено, $error </p><br>";
    }
}

?>

<form method="POST" action="/news/add/">
    <p>Заголовок</p>
    <input class="title" name="title" value="<?= $model->title ?>">
    <p>Краткое описание</p>
    <textarea class="short_description" name="short_description" rows="5" cols="40" ><?= $model->short_description ?></textarea>
    <p>Подробное описание</p>
    <textarea class="full_description " name="full_description" rows="5" cols="40" ><?= $model->full_description ?></textarea><br>
    <p>Url на изображение</p>
    <input class="image_url" name="image_url" value="<?= $model->image_url ?>">
    <br><br><br>
    <input type="submit" value="Добавить новость">
</form>