<?php
    session_start();
    $_SESSION["logged_in"] = false;
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Администратор</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="index.php">Животные</a></li>
            <li><a href="change_theme.php">Сменить тему</a></li>
        </ul>
    </div>
    <?php
        // проверяем пароль
        if (isset($_POST["pass"])) {
            if ($_POST["pass"] == "123456") $_SESSION["logged_in"] = true;
            else echo "<p style='text-align:center;color:#9B4222'>Неверный пароль!</p>";
        }
        // меняем тему если надо
        if (isset($_POST["theme"])) {
            $theme = ["theme" => $_POST["theme"]];
            file_put_contents("theme.json", json_encode($theme));
            echo "<p style='text-align:center;color:#9B4222'>Тема изменена!</p>";
        }
        // выводим нужную форму
        if ($_SESSION["logged_in"]) {
            echo require("animal_form.html");
        }
        else {
            echo require("log_form.html");
        }
    ?>
</body>
</html>
<?php
    session_destroy();
?>