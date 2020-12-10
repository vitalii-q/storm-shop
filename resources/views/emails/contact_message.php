<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сообщение</title>
</head>
<body>

<div class="mail_wrapper">
    <h2>Сообщение со страницы контактов</h2>

    <ul>
        <li><p>Имя: <span><?=$data['name']?></span></p></li>
        <li><p>Email: <span><?=$data['email']?></span></p></li>
        <li><p>Сообщение: <span><?=$data['message']?></span></p></li>

        <?if(!empty($data['file_name'])):?>
        <li>
            <div>Файл: <a href="<?php echo $data['file'] ?>" download><?php echo $data['file_name'] ?></a></div>
        </li>
        <?endif;?>
    </ul>

</div>

</body>
</html>