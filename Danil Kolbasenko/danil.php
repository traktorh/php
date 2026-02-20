<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Анкета класса</title>
</head>
<body>

<div class="form-container">
    <h2>Данные ученика и класса</h2>
    <form method="POST">
        <div class="input-group">
            <label>Имя:</label>
            <input type="text" name="first_name" required>
        </div>
        <div class="input-group">
            <label>Фамилия:</label>
            <input type="text" name="last_name" required>
        </div>
        <div class="input-group">
            <label>Возраст:</label>
            <input type="number" name="age" required>
             
        </div>
        <div class="input-group">
            <label>Школа:</label>
            <input type="text" name="school" required>
        </div>
        <div class="input-group">
            <label>Класс:</label>
            <input type="text" name="class_name" placeholder="Напр: 9А" required>
        </div>
        <div class="input-group">
            <label>Всего человек в классе:</label>
            <input type="number" name="total_students" required>
        </div>
        <div class="input-group">
            <label>Длинноволосых:</label>
            <input type="number" name="long_hair" required>
        </div>
        <div class="input-group">
            <label>Коротковолосых:</label>
            <input type="number" name="short_hair" required>
        </div>
        <button type="submit" name="send">Отправить данные</button>
    </form>

    <?php
    if (isset($_POST['send'])) {
        $firstName = htmlspecialchars($_POST['first_name']);
        $lastName = htmlspecialchars($_POST['last_name']);
        $age = (int)$_POST['age'];
        $school = htmlspecialchars($_POST['school']);
        $className = htmlspecialchars($_POST['class_name']);
        $total = (int)$_POST['total_students'];
        $long = (int)$_POST['long_hair'];
        $short = (int)$_POST['short_hair'];
        $age = min($age, 120);

        echo "<div class='result'>
                <h3>Результат обработки:</h3>
                Ученик: <strong>$firstName $lastName</strong> ($age лет)<br>
                Школа: $school, Класс: $className<br>
                В классе всего $total человек.<br>
                Из них: $long с длинными волосами и $short с короткими.<br>";
        
        if (($long + $short) > $total) {
            echo "<p style='color:red;'>⚠️ Ошибка: сумма волос больше общего количества человек!</p>";
        }
        echo "</div>";
    }
    ?>
</div>