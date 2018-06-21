<?php 

$connect = mysqli_connect('localhost', 'root', '', 'films');

if (mysqli_connect_error()) {
  die("Ошибка подключения");
}

if (array_key_exists('add', $_POST)) {
  if ($_POST['name'] == '') {
    echo "<p>Не введено навзание фильма</p>";
  }
  else if ($_POST['genre'] == '') {
    echo "<p>Не введен жанр фильма</p>";
  }
  else if ($_POST['year'] == '') {
    echo "<p>Не указан год создания фильма</p>";
  }
  else {
    $query = "INSERT INTO `films` (`name`, `genre`, `year`) VALUES (
    '" . mysqli_real_escape_string($connect, $_POST['name']) ."', 
    '" . mysqli_real_escape_string($connect, $_POST['genre']) ."', 
    '" . mysqli_real_escape_string($connect, $_POST['year']) ."'
  )";

    if(mysqli_query($connect, $query)) {
      echo "<p>Фильм был успешно добавлен в базу!</p>";
    }
    else {
      echo "<p>Ошибка. Фильм не был добавлен в базу.</p>";
    }
  }
}

$queryAll = "SELECT * FROM `films`";
$result = mysqli_query($connect, $queryAll);
$films = array();

?>


<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <title>UI-kit и HTML фреймворк - Документация</title>
    <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/><!-- build:cssVendor css/vendor.css -->
    <link rel="stylesheet" href="libs/normalize-css/normalize.css"/>
    <link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css"/>
    <link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css"/><!-- endbuild -->
<!-- build:cssCustom css/main.css -->
    <link rel="stylesheet" href="./css/main.css"/><!-- endbuild -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="container user-content pt-35">
      <h1 class="title-1"> Фильмотека</h1>
      <?php 
        foreach ($films as $key => $value) {
        ?>
        <div class="card mb-20">
          <h4 class="title-4"><?php echo $films[$key]['name'];?></h4>
          <div class="badge"><?php echo $films[$key]['genre'];?></div>
          <div class="badge"><?php echo $films[$key]['year'];?></div>
        </div
        <?php  
          }  
        ?>
      <div class="card mb-20">
        <h4 class="title-4">Такси 2</h4>
        <div class="badge">комедия</div>
        <div class="badge">2000</div>
      </div>
      <div class="card mb-20">
        <h4 class="title-4">Облачный атлас</h4>
        <div class="badge">драма</div>
        <div class="badge">2012</div>
      </div>
      <div class="panel-holder mt-80 mb-40">
        <div class="title-4 mt-0">Добавить фильм</div>
        <form action="index.php" method="POST">
          <div class="error">Название фильма не может быть пустым.</div>
          <label class="label-title">Название фильма</label>
          <input class="input" type="text" placeholder="Такси 2" name="title"/>
          <div class="row">
            <div class="col">
              <label class="label-title">Жанр</label>
              <input class="input" type="text" placeholder="комедия" name="genre"/>
            </div>
            <div class="col">
              <label class="label-title">Год</label>
              <input class="input" type="text" placeholder="2000" name="year"/>
            </div>
          </div><a class="button" href="regular">Добавить	</a>
        </form>
      </div>
    </div><!-- build:jsLibs js/libs.js -->
    <script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
<!-- build:jsVendor js/vendor.js -->
    <script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script><!-- endbuild -->
<!-- build:jsMain js/main.js -->
    <script src="js/main.js"></script><!-- endbuild -->
    <script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </body>
</html>