<?php 

require('config.php');
require('dbconnect.php');

$connect = dbconnect();

require('films.php');

if ($_GET['action'] == 'delete') {
$result = delete_film($connect, $_GET['id']);


if ($result) {
  $info = "Фильм успешно удален";
}
}


$films = get_film($connect, $_GET['id']);

include('views/head.tpl');
include('views/film-single.tpl');
include('views/footer.tpl');

 ?>