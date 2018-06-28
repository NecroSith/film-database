      <h1 class="title-1">Фильм <?=$film['name']?></h1>
      <?php 

        if ($info != '') {
          ?>
          <div class="notification"><?php echo $info?></div>
          <?php
        }

        if ($success == true) {
          ?>
            <div class="success">Информация о фильме успешно обновлена!</div>
          <?php
        }
        ?>
      <div class="panel-holder mb-20">
        <div class="title-4 mt-0">Редактировать данные о фильме</div>
        <form action="edit.php?id=<?=$film['id']?>" method="POST">
          <?php  
            for ($index = 0; $index < count($errors); $index++) {
              echo '<div class="error">'.$errors[$index].'</div>';
            }
            
          ?>
          <!-- <div class="error hidden">Название фильма не может быть пустым.</div> -->
          <label class="label-title">Название фильма</label>
          <input class="input" type="text" placeholder="Такси 2" name="name" value="<?=$film['name']?>" />
          <div class="row">
            <div class="col">
              <label class="label-title">Жанр</label>
              <input class="input" type="text" placeholder="комедия" name="genre" value="<?=$film['genre']?>" />
            </div>
            <div class="col">
              <label class="label-title">Год</label>
              <input class="input" type="text" placeholder="2000" name="year" value="<?=$film['year']?>" />
            </div>
          </div>
          <input type="submit" class="button pb-20" href="regular" value="Сохранить изменения" name="update">
          <!-- </div><a class="button" href="regular">Добавить	</a> -->
        </form>
      </div>
      <!-- <a href="index.php" class="button">Вернуться на главную</a> -->