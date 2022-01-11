<?php
/*------------------------------------------ Условия задачи ------------------------------------------*/

//Найдите все года от 1 до 2030, сумма цифр которых равна 13.

/*------------------------------------------ Решение ------------------------------------------*/

//Функия для нахождения суммы цифр числа
	function getSum($i) {
		return array_sum(str_split($i));
	}

	$years = [];
	$yearsSum13 = [];

	for( $i = 0; $i <= 2013; $i++ ) {
		$years[] = $i;
	}

	foreach ( $years as $a ) {
		if ( getSum($a) == 13 ) {
			$yearsSum13[] = $a;
		}
	}