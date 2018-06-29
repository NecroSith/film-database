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

function add_film($connect, $name, $genre, $year, $description = '') {
  
    $query = "INSERT INTO `films` (`name`, `genre`, `year`, `description`) VALUES (
    '" . mysqli_real_escape_string($connect, $_POST['name']) ."', 
    '" . mysqli_real_escape_string($connect, $_POST['genre']) ."', 
    '" . mysqli_real_escape_string($connect, $_POST['year']) ."',
    '" . mysqli_real_escape_string($connect, $_POST['description']) ."'

  )";

  	$result = mysqli_query($connect, $query);

    if (!$result) {
    	die(mysqli_error($connect));
    }

    return $result;
  }


function update_film($connect, $name, $genre, $year, $description, $id) {

    $db_fileName = '';

    if (isset($_FILES['image']['name']) && $_FILES['image']['tmp_name'] != '') {
        $fileName = $_FILES['image']['name'];
        $fileTempLoc = $_FILES['image']['tmp_name'];
        $fileType = $_FILES['image']['type'];
        $fileSize = $_FILES['image']['size'];
        $fileErrMsg = $_FILES['image']['error'];

        $divider = explode(".", $fileName);
        $fileExtn = end($divider);

        list($width, $height) = getimagesize($fileTempLoc);
        if ($width < 10 || $height < 10) {
            $errors[] = "Изображение недопустимого размера";
        }

        $db_fileName = rand(100000000, 999999999) . "." . $fileExtn;

        if ($fileSize > 2097152) {
            $errors[] = "Файл слишком большой. Размер загружаемого файла не должен превышать 2 Мб";
        }
        else if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
            $errors[] = "Ошибка загрузки. Расширение файла должно быть jpg, png или gif";
        }
        else if ($fileErrMsg == 1) {
            $errors[] = "Произошла неизвестная ошибка";
        }

        $imageFolderLoc = ROOT . 'data/films/full/';
        $imageFolderLocMin = ROOT . 'data/films/min';
        // $imageFolderLocFull = ROOT . 'data/films/full';

        $uploadFile = $imageFolderLoc . $db_fileName;
        $moveResult = move_uploaded_file($fileTempLoc, $uploadFile);

        if (!$moveResult) {
            $errors[] = "Ошибка загрузки файла";
        } 

        require_once(ROOT . "/functions/image_resize_imagick.php");
        $targetFile = $imageFolderLoc . $db_fileName;
        $resizedFile = $imageFolderLocMin . $db_fileName;

        $wmax = 137;
        $hmax = 200;

        $img = createThumbnail($targetFile, $wmax, $hmax);
        $img->writeImage($resizedFile);

    }
  
    $query = "UPDATE `films` SET 
    	name = '" . mysqli_real_escape_string($connect, $name) ."', 
        genre = '". mysqli_real_escape_string($connect, $genre) ."', 
        year = '". mysqli_real_escape_string($connect, $year) ."', 
        description = '". mysqli_real_escape_string($connect, $description) ."', 
        image = '". mysqli_real_escape_string($connect, $db_fileName) ."' 
        WHERE id = ".mysqli_real_escape_string($connect, $id)." LIMIT 1";

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
