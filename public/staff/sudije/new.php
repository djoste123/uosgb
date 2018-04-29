<?php

require_once('../../../private/initialize.php');
require_login() ;

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['sudija'];

  $sudija = new Lista2($args);
  $result = $sudija->save();
  
  if($result === true) {
    $new_id = $sudija->id;
    $_SESSION['message'] = 'Podaci sudije su uneti uspešno';
    redirect_to(url_for('/staff/sudije/show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $sudija = new Lista2;
}

?>

<?php $page_title = 'Dodajte novog sudiju'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/sudije/index.php'); ?>">&laquo; Povratak na listu</a>

  <div class="bicycle new">
    <h1>Dodaj sudiju</h1>

    <?php echo display_errors($sudija->errors); ?>

    <form action="<?php echo url_for('/staff/sudije/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>
      
      <div id="operations">
        <input type="submit" value="Dodaj sudiju" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
