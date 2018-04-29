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

  // Save record using post parameters
  $args = $_POST['sudija'];
  
  $sudija->merge_attributes($args);
  $result = $sudija->save();

  if($result === true) {
    $_SESSION['message'] = 'Upis sudije je urađen uspešno';
    redirect_to(url_for('/staff/sudije/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form
  
}

?>

<?php $page_title = 'Izmeni podatke sudije'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/sudije/index.php'); ?>">&laquo; Povratak na listu</a>

  <div class="bicycle edit">
    <h1>Izmeni podatke sudije</h1>

    <?php echo display_errors($sudija->errors); ?>

    <form action="<?php echo url_for('/staff/sudije/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>
      
      <div id="operations">
        <input type="submit" value="Izmeni podatke sudije" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
