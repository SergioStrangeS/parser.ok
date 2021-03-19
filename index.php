<?php

// Написать парсер для интернет-магазина,
// интернет-магазин может быть любой. То есть товары(картинка и название).
// Отобразить эти товары на своем тестовом сайте.

// Подключаем библиотеку
require 'liblary/simple_html_dom.php';

// Конектимся к сайту и заносим данные в массив
$HOSTNAME = 'https://gabestore.ru/sale';
$html = file_get_html($HOSTNAME);
$blocks = $html->find('.shop-item');

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Парсерок</title>

    <!--Подключаем Bootstrap для стилей-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!--Подключаем отдельные стили-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
    <div class="row">
        <?php foreach ($blocks as $block): // Перебираем массив ?>
            <div class="card" style="width: 18rem;">
                <!-- Изображение -->
                <?= $block->children(0)->outertext; ?>
                <div class="card-body">
                    <!--Заголовок-->
                    <h5 class="card-title"><?= $block->children(1)->plaintext; ?></h5>
                    <!--Кнопка-->
                    <a href="<?= 'https://gabestore.ru' . $block->children(0)->href ?>" target="_blank"
                       class="btn btn-primary"><?= $block->children(2)->children(0)->plaintext; ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!--Подключаем дополнительный Bootstrap компонент-->
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
