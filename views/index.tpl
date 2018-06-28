
  <h1 class="title-1"> Фильмотека</h1>
  <?php 
    foreach ($films as $key => $value) {
    ?>
    <div class="card mb-20">
      <div class="card__header">
        <h4 class="title-4"><?php echo $films[$key]['name'];?></h4>
        <div class="button-block">
          <a href="edit.php?id=<?php echo $films[$key]['id'];?>" class="button button--edit">Редактировать</a>
          <a href="?action=delete&id=<?php echo $films[$key]['id'];?>" class="button button--delete">Удалить</a>
        </div>
      </div>
      <div class="badge"><?php echo $films[$key]['genre'];?></div>
      <div class="badge"><?php echo $films[$key]['year'];?></div>
    </div>
<?php  
  }  
?>
      