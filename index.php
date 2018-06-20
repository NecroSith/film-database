<?php 

$connect = mysqli_connect('localhost', 'root', '', 'films');

if (mysqli_connect_error()) {
	die("Ошибка подключения");
}

$name = 'Цельнометаллическая оболочка';

$query = "SELECT * FROM `films` WHERE `name` = '" . mysqli_real_escape_string($connect, $name). "'";
// $query = "INSERT INTO `films` (`name`, `genre`, `year`) VALUES ('Цельнометаллическая оболочка', 'драма', '1987')";
$result = mysqli_query($connect, $query);

// if ($result) {
// 	while ($row = mysqli_fetch_array($result)) {
// 		echo "<pre>";
// 		print_r($row);
// 		echo "</pre>";
// 	}
// }

 ?>

<link rel="stylesheet" href="main.css">
<div class="main-wrapper">
 <form action="index.php" class="form-to-add">
 	<h3>Добавь свой фильм в базу!</h3>
 	<input type="text" name='name' placeholder="Название фильма"><br>
 	<div class="wrapper">
 	<select name="genre" id="genre">
 		<option value="basic">Жанр</option>
 		<option value="action">Боевик</option>
 		<option value="drama">Драма</option>
 		<option value="horror">Ужасы</option>
 		<option value="comedy">Комедия</option>
 	</select><br>
 	<input type="text" name="year" placeholder="Год создания"><br>
 	</div>
 	<input type="submit" value="Добавить в фильмотеку">
 </form>
 <form action="index.php" class="form-to-get">
 	<div class="output"></div>
 	<input type="submit" value="Получить данные из базы">
 </form>
 </div>