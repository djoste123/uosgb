<?php require_once('../../private/initialize.php'); ?>

<?php require_login() ; ?>

<?php $page_title = 'Administratorski panel'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Administratorski panel</h2>
    <ul>
      <li><a href="<?php echo url_for('/staff/sudije/index.php'); ?>">Lista sudija</a></li>
      <li><a href="<?php echo url_for('/staff/admins/index.php'); ?>">Lista administratora</a></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
