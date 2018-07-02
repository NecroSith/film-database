<?php 


function adminNameCheck($connect) {

    $query = "SELECT * FROM `loginData` 
    WHERE `login` = '". mysqli_real_escape_string($connect, $_POST['admin-login']) ."' 
    AND `password` = '". mysqli_real_escape_string($connect, $_POST['admin-pass']) ."'";
    $result = mysqli_query($connect, $query);
    $logins = mysqli_fetch_array($result);



    if ($logins['login'] != '') {
        if ($logins['login'] == $_POST['admin-login'] && $logins['password'] == $_POST['admin-pass']) {
            return true;
            // while ($row = mysqli_fetch_array($result)) {
              // $films[] = $row;
        }    
        else {
            return false;
        }
    }
}


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