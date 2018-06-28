<?php 

$errors = array();
$success = false;
$info = '';

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


function update_film($connect, $name, $genre, $year, $id) {
  
    $query = "UPDATE `films` SET 
    	name = '" . mysqli_real_escape_string($connect, $name) ."', 
    	genre = '" . mysqli_real_escape_string($connect, $genre) ."', 
    	year = '" . mysqli_real_escape_string($connect, $year) ."'
    	WHERE id = " . mysqli_real_escape_string($connect, $id) . " LIMIT 1";

    if (!mysqli_query($connect, $query)) {
    	die(mysqli_error($connect));
    	$result = false;
    }
    else {
    	$result = true;
    }

    return $result;
  }


function get_film($connect, $id) {
	$query = "SELECT * FROM `films` WHERE `id` = ' " . mysqli_real_escape_string($connect, $id) . "' LIMIT 1 ";

	$result = mysqli_query($connect, $query);

	if ($result) {
		$film = mysqli_fetch_array($result);
	}

	return $film;
}

function delete_film($connect, $id) {
	$query = "DELETE FROM `films` WHERE `id` = ' " . mysqli_real_escape_string($connect, $id) . "' LIMIT 1 ";

	mysqli_query($connect, $query);

	 if (@mysqli_affected_rows($connect) > 0) {
      	$info = "Фильм успешно удален";
      	$result = true;
    }
    else {
    	$result = false;
    }

    return $result;
}


 ?>
