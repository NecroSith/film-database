<?php 

require('config.php');
require('dbconnect.php');

$connect = dbconnect();

require('films.php');

$films = films_all($connect);

include('views/head.tpl');
include('views/index.tpl');
include('views/footer.tpl');
  


?>
