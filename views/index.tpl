
  <h1 class="title-1"> Фильмотека</h1>
  <?php 
    foreach ($films as $film) {
    ?>
    <div class="card mb-20">
      <div class="row">

        <div class="col-2">
          <img height=200 src="<?=HOST?>data/films/min/<?=$film['image']?>" alt="<?php echo $film['name'];?>">
        </div>

        <div class="col-10">
          <div class="card__header mb-10">
            <h4 class="title-4"><?php echo $film['name'];?></h4>
            <div class="button-block">
               <?php if (isAdmin()) { ?>

                <a href="edit.php?id=<?php echo $film['id'];?>" class="button button--edit">Редактировать</a>

              <?php }

                if (isAdmin()) { ?>

                <a href="?action=delete&id=<?php echo $films['id'];?>" class="button button--delete">Удалить</a>

              <?php }?>
              
            </div>
          </div>
          <div class="badge"><?php echo $film['genre'];?></div>
          <div class="badge"><?php echo $film['year'];?></div>
          <div class="mt-20">
            <a href="single.php?id=<?php echo $film['id'];?>" class="button button--more-info">Подробнее</a>
          </div>
        </div>

      </div>
    </div>
<?php  
  }  
?>
      