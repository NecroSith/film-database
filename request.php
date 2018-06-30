<?php 

require('functions/login_function.php');

if (isset($_POST['user-submit'])) {
	$userName = $_POST['user-name'];
	$userCity = $_POST['user-city'];
	$expire = time() + 60*60;

	setcookie('user-name', $userName, $expire);
	setcookie('user-city', $userCity, $expire);
}

include('views/head.tpl');
include('views/request.tpl');
include('views/footer.tpl');

 ?>