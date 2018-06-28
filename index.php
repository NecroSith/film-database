<?php 

require('config.php');
require('dbconnect.php');

$connect = dbconnect();

require('films.php');

if ($_GET) {
  if ($_GET['action'] == 'delete') {
    $result = delete_film($connect, $_GET['id']);

 
    if ($result) {
      $info = "Фильм успешно удален";
    }
  }
}

$films = films_all($connect);

include('views/head.tpl');
include('views/index.tpl');
include('views/footer.tpl');
  


?>
