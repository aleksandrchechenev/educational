<?php
/*------------------------------------------ Условия задачи ------------------------------------------*/
/* Ваше задание — создать массив, наполнить его случайными значениями
(можно использовать функцию rand), найти максимальное и минимальное значение массива 
и поменять их местами.
*/
/*------------------------------------------ Решение ------------------------------------------*/
// Функция для создания рандомного массива
function addRandArr($arrlenght, $randMin, $randMax)
{
    $array = [];
    if ($arrlenght == 0) {
        $array = rand($randMin, $randMax);
    }
    for ($i = 0; $i < $arrlenght; $i++) {
        $array[] = rand($randMin, $randMax);
    }
    return $array;
}

$array = addRandArr(20, 0, 100);
$max_key = null;
$min_key = null;

// Находим максимальное и минимальное значение массива
foreach ($array as $key => $value) {
    if ($value == max($array)) {
        $max_key = $key;
    } elseif ($value == min($array)) {
        $min_key = $key;
    }
}

// Меняем местами макс. и мин. значения
$temp = $array[$max_key];
$array[$max_key] = $array[$min_key];
$array[$min_key] = $temp;
