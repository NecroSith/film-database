<?php 

require('config.php');
require('dbconnect.php');
require('functions/login_function.php');
require('films.php');
$connect = dbconnect();

if (isset($_POST['admin-submit'])) {
	// $adminName = 'admin';
	// $adminPass = '111';

	// if($_POST['admin-login'] == $adminName) {
		// if($_POST['admin-pass'] == $adminPass) {
	if (adminNameCheck($connect)) {
			$_SESSION['user'] = 'admin';
			header('Location: ' . HOST . 'index.php');
	}
}

include('views/head.tpl');
include('views/login.tpl');
include('views/footer.tpl');

 ?>