<?php 

function films_all($connect) {

	$queryAll = "SELECT * FROM `films`";
	$result = mysqli_query($connect, $queryAll);
	$films = array();

	if ($result) {
	        while ($row = mysqli_fetch_array($result)) {
	          $films[] = $row;
	       }
	 }

	 return $films;
}



$errors = array();
// $success = false;
$info = '';

// if ($_GET) {
//   if ($_GET['action'] == 'delete') {
//     $query = "DELETE FROM `films` WHERE `id` = ' " . mysqli_real_escape_string($connect, $_GET['id']) . "' LIMIT 1 ";

//     mysqli_query($connect, $query);

//     if (@mysqli_affected_rows($connect) > 0) {
//       $info = "Фильм успешно удален";
//     }
//   }
// }


function add_film($connect, $name, $genre, $year) {
  
    $query = "INSERT INTO `films` (`name`, `genre`, `year`) VALUES (
    '" . mysqli_real_escape_string($connect, $_POST['name']) ."', 
    '" . mysqli_real_escape_string($connect, $_POST['genre']) ."', 
    '" . mysqli_real_escape_string($connect, $_POST['year']) ."'
  )";

  	$result = mysqli_query($connect, $query);

    if (!$result) {
    	die(mysqli_error($connect));
    }

    return $result;
  }


 ?>