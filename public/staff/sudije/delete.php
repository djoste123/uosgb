<?php

require_once('../../../private/initialize.php');
require_login() ; 

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/sudije/index.php'));
}
$id = $_GET['id'];
$sudija = Lista2::find_by_id($id);
  if($sudija == false){
      redirect_to(url_for('/staff/sudije/index.php'));
  }
  
if(is_post_request()) {

  // Delete bicycle
  $result = $sudija->delete();
  $_SESSION['message'] = 'Sudija je izbrisan uspešno.';
  redirect_to(url_for('/staff/sudije/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Izbrišite sudije'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/sudije/index.php'); ?>">&laquo; Povratak na listu</a>

  <div class="bicycle delete">
    <h1>Izbrisati sudiju</h1>
    <p>Da li ste sigurni da želite da izbrišete?</p>
    <p class="item"><?php echo h($sudija->ime()); ?></p>

    <form action="<?php echo url_for('/staff/sudije/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Izbrisati sudiju" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
