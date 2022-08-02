<!-- старт сессии -->
<?php
    $file = file_get_contents('theme.json');
    $theme = json_decode($file, TRUE)["theme"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Обычный пользователь</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- меню -->
    <div class="menu">
        <ul>
            <li><a href="index.php">Животные</a></li>
            <li><a href="change_theme.php">Сменить тему</a></li>
        </ul>
    </div>
    <!-- Тексты -->
    <div class="content">
        <?php
            // выбор нужной темы по переменной в жсоне
            if ($theme == "fox") {
                echo require("fox.html");
            }
            if ($theme == "bear") {
                echo require("bear.html");
            }
        ?>
    </div>
</body>
</html>