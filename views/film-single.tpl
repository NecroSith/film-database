
  <h1 class="title-1">Информация о фильме</h1>


<div class="card mb-20">
  <div class="card__header">
    <h4 class="title-4"><?php echo $films['name'];?></h4>
    <div class="button-block">
      <a href="edit.php?id=<?php echo $films['id'];?>" class="button button--edit">Редактировать</a>
      <a href="index.php?action=delete&id=<?php echo $films['id'];?>" class="button button--delete">Удалить</a>
    </div>
  </div>
  <div class="badge"><?php echo $films['genre'];?></div>
  <div class="badge"><?php echo $films['year'];?></div>
  <div class="mt-20">
    <a href="single.php?id=<?php echo $films['id'];?>" class="button button--more-info">Подробнее</a>
  </div>
</div>

      