<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>
<?php $page_title = 'Početna'; ?>

<div id="main">

  <ul id="menu">
    <li><a href="<?php echo url_for('/lista.php'); ?>">Lista Sudija UOSGB</a></li>
    <li><a href="<?php echo url_for('/pretraga.php'); ?>">Pretraga</a></li>
    <li><a href="<?php echo url_for('/staff/index.php'); ?>">Administracija</a></li>
  </ul>
    
</div>

<?php $super_hero_image = 'volleyball.JPG'; ?>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
