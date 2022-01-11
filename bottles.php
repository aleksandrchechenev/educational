<?php
/*------------------------------------------ Условия задачи ------------------------------------------*/
/*
Есть магазин, который продает банки лимонада, но только упаковками по 20, 6 и 3 шт.
Разработайте программу, которая по заданному количеству банок определит сколько и каких 
упаковок нужно купить.
*/
/*------------------------------------------ Решение ------------------------------------------*/

define('BIG', 20);
define('MEDIUM', 6);
define('SMALL', 3);

$order = rand(-1, 50);
$neworder = $order;

$count = [];

if (isset($neworder) && is_int($neworder) && $neworder != '' && $order > 0) {
    if ($neworder > BIG) {
        $count['big'] = floor($neworder / BIG);
        $neworder = $order % BIG;
    }

    if ($neworder > MEDIUM) {
        $count['medium'] = floor($neworder / MEDIUM);
        $neworder = $neworder % MEDIUM;
    }

    if ($neworder > SMALL) {
        $count['small'] = ceil($neworder / SMALL);
    }

    if ($neworder <= SMALL) {
        $count['small'] = 1;
    }

    echo $order . ' ' . plural($order, 'банка', 'банки', 'банок') . ' - это ';
    if (array_key_exists('big', $count)) {
        echo $count['big'] . ' ' . plural($count['big'], 'упаковка', 'упаковки', 'упаковок') . ' по 20 банок, ';
    }
    if (array_key_exists('medium', $count)) {
        echo $count['medium'] . ' ' . plural($count['medium'], 'упаковка', 'упаковки', 'упаковок') . ' по 6 банок, ';
    }
    if (array_key_exists('small', $count)) {
        echo $count['small'] . ' ' . plural($count['small'], 'упаковка', 'упаковки', 'упаковок') . ' по 3 банки.';
    }
} elseif ($order <= 0) {
    echo 'Заказ не может быть 0 или меньше 0';
}
// Функция, которая подствит после числа слово в правильном склонении 
function plural($order, $one, $from2to4, $from5)
{
    $rem10 = $order % 10;
    $rem100 = $order % 100;

    if ($rem10 == 1 && $rem100 != 11) {
        return $one;
    } elseif (($rem10 > 1 && $rem10 < 5) && ($rem100 < 12 || $rem100 > 14)) {
        return $from2to4;
    } else {
        return $from5;
    }
}
