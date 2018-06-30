<?php 



function isAdmin() {

       if (isset($_SESSION['user'])) {

        if ($_SESSION['user'] == 'admin') { 
       	// if ($_SESSION['user'] == $loginData['login']) {
         	return true;
       	}
      	else {
			return false;
		}
	}
}

 ?>