<?php
/*------------------------------------------ Условия задачи ------------------------------------------*/
/*
Вам нужно создать массив и заполнить его случайными числами от 1 до 100 (ф-я rand). 
Далее, вычислить произведение тех элементов, которые больше ноля и у которых парные индексы. 
После вывести на экран элементы, которые больше ноля и у которых не парный индекс.
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
$array = addRandArr(50, 0, 100);

$product = null;
$odd = null;

foreach ($array as $key => $value) {
    if ($value > 0 && $key % 2 == 0) {
        if ($product === null) {
            $product = $value;
        } else {
            $product *= $value;
        }
    }
    if ($value > 0 && $key % 2 != 0) {
        $odd[$key] = $value;
    }
}

echo 'Произведие элементов, которые больше ноля и у которых парные индексы: ' . $product . '<br>';
echo 'Элементы, которые больше ноля и у которых не парный индекс:<br>';
foreach ($odd as $key => $value) {
    echo 'Ключ -' . $key . '. Значение - ' . $value . '<br>';
}
