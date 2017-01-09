<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户列表</title>
</head>
<body>
<h1>用户列表</h1>

<?php
if (isset($users) && !empty($users)) {
    foreach ($users as $user) {
        echo '用户名称：' . $user['name'], '<br/>';
        echo '用户年龄：' . $user['age'], '<br/>';
        echo '------------------------------------------', '<br/>';
    }
}
?>
</body>
</html>




