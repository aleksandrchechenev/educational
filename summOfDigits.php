<!-- Вам нужно разработать программу, которая считала бы сумму цифр числа введенного пользователем. 
Например: есть число 123, то программа должна вычислить сумму цифр 1, 2, 3, т. е. 6.
По желанию можете сделать проверку на корректность введения данных пользователем. -->

<h3>Сумма цифр числа</h3>
<form method="POST">
    <label for="">
        Введите число
        <input type="number" name="number">
    </label>
    <button>Отправить</button>
</form>
<?php
if (!isset($number)) {
    $number = $_POST['number'];
} else {
    $number = null;
}
$summ = null;

if (isset($number)) {
    for ($i = 0; $i < strlen($number); $i++) {
        $summ += (int) $number[$i];
    }
}

echo 'Число: ' . $number . '<br>';
echo 'Сумма: ' . $summ;
