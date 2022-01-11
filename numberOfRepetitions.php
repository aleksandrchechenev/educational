<!-- Вам нужно разработать программу, которая считала бы количество вхождений какой-нибуть выбранной вами 
цифры в выбранном вами числе. Например: цифра 5 в числе 442158755745 встречается 4 раза -->

<h3>Проверить количество вхождения цифры в число</h3>

<form method="POST">
    <label>
        Число
        <input type="number" name="number">
    </label>
    <label>
        Цифра
        <input type="number" name="digit">
    </label>
    <button>Отправить</button>
</form>

<?php

$number = null;
$digit = null;

if (!empty($_POST['number']) && !empty($_POST['digit'])) {
    $number = $_POST['number'];
    $digit = $_POST['digit'];
}


$numberOfRepetitions = null;

if (!empty($_POST['number']) && !empty($_POST['digit'])) {
    for ($i = 0; $i < strlen($number); $i++) {
        if ($number[$i] == $digit) {
            $numberOfRepetitions++;
        }
    }
}
echo 'Число: ' . $number . '<br>';
echo 'Цифра: ' . $digit . '<br>';
echo 'Количество повторений:' . $numberOfRepetitions;
