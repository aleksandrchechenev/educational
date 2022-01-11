<?php
/*
Разработайте программу, которая определяла количество прошедших часов по введенным 
пользователем градусах. Введенное число может быть от 0 до 360. Циферблат - 360 градусов, он же 12 часов, он же 720 минут. 
Получаем, что поворот стрелки на 1 градус это 2 минуты. 30 градусов - 1 час. То есть 360 градус / 12 часов
*/
?>
<h3>Количество прошедших часов по введенным пользователем градусах</h3>

<form action="" method="POST">
	<label for="">
		Degree:
		<input type="number" name="degree">
	</label>
	<button>Send</button>
</form>

<?php
($_POST['degree'] || $_POST['degree'] == "0") ? $degree = (int) $_POST['degree'] : $degree = null;

var_dump($_POST['degree']);
echo '<br>';
var_dump($degree);
echo '<br>';

if ($degree === null) {
	echo 'Введите число';
} else {
	if ($degree >= 0 && $degree <= 360) {
		$minutes = ($degree * 2) % 60;
		$hours = (int)($degree / 30);
		echo "Прошло: $hours ч. и $minutes мин.";
	} else {
		echo 'Введите число от 0 до 360';
	}
}
