<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
    <title>Главная</title>
</head>
<body>

<ul class="nav nav-pills">
    <?php foreach ($menu as $key => $item):?>
        <li role="presentation" ><a href="#"><?= $item->title ;?></a></li>
    <?php endforeach ;?>
</ul>

<h1>Default layout</h1>
<?= $content; ?>

</body>
</html>
