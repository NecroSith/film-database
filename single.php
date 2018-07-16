<?php 

require('config.php');
require('dbconnect.php');
require('functions/login_function.php');

$connect = dbconnect();

require('films.php');

// if ($_GET['action'] == 'delete') {
// 	$result = delete_film($connect, $_GET['id']);

// 	if ($result) {
//   		$resultinfo = "Фильм успешно удален";
// 	}
// }


$films = get_film($connect, $_GET['id']);

include('views/head.tpl');
include('views/notifications.tpl');
include('views/film-single.tpl');
include('views/footer.tpl');

 ?>