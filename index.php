<?php 

$connect = mysqli_connect('localhost', 'root', '', 'films');

if (mysqli_connect_error()) {
	die("Ошибка подключения");
}

if (array_key_exists('add', $_POST)) {
	if ($_POST['name'] == '') {
		echo "<p>Не введено навзание фильма</p>";
	}
	else if ($_POST['genre'] == '') {
		echo "<p>Не введен жанр фильма</p>";
	}
	else if ($_POST['year'] == '') {
		echo "<p>Не указан год создания фильма</p>";
	}
	else {
		$query = "INSERT INTO `films` (`name`, `genre`, `year`) VALUES (
		'" . mysqli_real_escape_string($connect, $_POST['name']) ."', 
		'" . mysqli_real_escape_string($connect, $_POST['genre']) ."', 
		'" . mysqli_real_escape_string($connect, $_POST['year']) ."'
	)";

		if(mysqli_query($connect, $query)) {
			echo "<p>Фильм был успешно добавлен в базу!</p>";
		}
		else {
			echo "<p>Ошибка. Фильм не был добавлен в базу.</p>";
		}
	}
}

$queryAll = "SELECT * FROM `films`";
// $query = "SELECT * FROM `films` WHERE `name` = '" . mysqli_real_escape_string($connect, $name). "'";
// $query = "INSERT INTO `films` (`name`, `genre`, `year`) VALUES ('Цельнометаллическая оболочка', 'драма', '1987')";
$result = mysqli_query($connect, $queryAll);
$films = array();

?>


<link rel="stylesheet" href="main.css">
<div class="main-wrapper">
 <form action="index.php" class="form-to-add" method="POST">
 	<h3>Добавь свой фильм в базу!</h3>
 	<input type="text" name='name' placeholder="Название фильма"><br>
 	<div class="wrapper">
 	<select name="genre" id="genre">
 		<option value="basic">Жанр</option>
 		<option value="боевик">Боевик</option>
 		<option value="драма">Драма</option>
 		<option value="ужасы">Ужасы</option>
 		<option value="комедия">Комедия</option>
 	</select><br>
 	<input type="text" name="year" placeholder="Год создания"><br>
 	</div>
 	<input type="submit" value="Добавить в фильмотеку" name="add">
 </form>
 <form action="index.php" class="form-to-get">
 	<div class="table-space">
	 	<?php 
		 	if ($result) {
				while ($row = mysqli_fetch_array($result)) {
					$films[] = $row;
				}
			}
		?>
		
		<table border="1">
			<thead>
				<tr>
					<th>ID</th>
					<th>Название</th>
					<th>Жанр</th>
					<th>Год</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($films as $key => $value) {
				?>
					<tr>
						<th><?php echo $films[$key]['id'];?></th>
						<th><?php echo $films[$key]['name'];?></th>
						<th><?php echo $films[$key]['genre'];?></th>
						<th><?php echo $films[$key]['year'];?></th>
					</tr>
				<?php  
					}	 
				?>
				<!-- <tr>
					<th><?php echo $row['id'] ?></th>
					<th><?php echo $row['name'] ?></th>
					<th><?php echo $row['genre'] ?></th>
					<th><?php echo $row['year'] ?></th>
				</tr> -->
			</tbody>
		</table>
	</div>
 	<div class="output"></div>
 	<!-- <input type="submit" value="Получить данные из базы"> -->
 </form>
 </div>