<h1 class="title-1">Добавить новый фильм</h1>
<?php
if ($success == true) {
          ?>
          <div class="success">Фильм был успешно добавлен в базу!</div>
          <?php
        }
        ?>
<div class="title-4 mt-0">Добавить фильм</div>
	<form action="add-film.php" method="POST">
	  <?php  
	    for ($index = 0; $index < count($errors); $index++) {
	      echo '<div class="error">'.$errors[$index].'</div>';
	    }
	    
	  ?>
	  <!-- <div class="error hidden">Название фильма не может быть пустым.</div> -->
	  <label class="label-title">Название фильма</label>
	  <input class="input" type="text" placeholder="Такси 2" name="name"/>
	  <div class="row">
	    <div class="col">
	      <label class="label-title">Жанр</label>
	      <input class="input" type="text" placeholder="комедия" name="genre"/>
	    </div>
	    <div class="col">
	      <label class="label-title">Год</label>
	      <input class="input" type="text" placeholder="2000" name="year"/>
	    </div>
	  </div>
	   <textarea class="textarea mb-20" name="description" placeholder="Введите описание фильма"></textarea>
	  <input type="submit" class="button pb-20" href="regular" value="Добавить" name="add">
	  <!-- </div><a class="button" href="regular">Добавить	</a> -->
	</form>
	</div>