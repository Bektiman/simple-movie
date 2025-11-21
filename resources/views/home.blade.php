<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>

<body>
    <ul class="">
        <?php foreach($menu as $key => $value): ?>
        <li class="">
            <a href="<?= $value ?>" class="">
                <?= $key ?>
            </a>
        </li>
        <?php endforeach;?>
    </ul>

    <h1>
        Tampilan Homepage
    </h1>
    @foreach ($config as $c)
        <ul>
            <li class="">{{ $c}}</li>
        </ul>
    @endforeach
</body>

</html>
