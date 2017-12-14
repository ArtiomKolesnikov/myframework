<h1 class="text-uppercase">Main index view</h1>
<!--<h2 class="text-center">My car : --><?//= $car['mark'] . '-' . $car['model'] ?><!--</h2>-->
<ul class="">
    <li><p><a href="download" class="btn btn-primary">грузануть чего небудь в моё облако</a></p></li>
    <li><p><a href="post" class="btn btn-primary">Post</a></p></li>
</ul>

<p>all posts:</p>
<ul>
    <?php foreach ($posts as $post):?>
    <li>
        <ul>
        <?php foreach ($post as $key => $item):?>
            <li><?= $key . " - " . $item ;?></li>
        <?php endforeach;?>
        </ul>
    </li>

    <?php endforeach;?>
</ul>
