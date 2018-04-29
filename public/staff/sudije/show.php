<?php require_once('../../../private/initialize.php'); ?>
<?php require_login() ; ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$sudije = Lista2::find_by_id($id);

?>

<?php $page_title = 'Prikaži: ' . h($sudije->ime()); ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/sudije/index.php'); ?>">&laquo; Povratak na listu</a>

  <div class="bicycle show">

    <h1>Sudija: <?php echo h($sudije->ime()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Legitimacija</dt>
        <dd><?php echo h($sudije->br_leg); ?></dd>
      </dl>
      <dl>
        <dt>Ime</dt>
        <dd><?php echo h($sudije->ime); ?></dd>
      </dl>
      <dl>
        <dt>Prezime</dt>
        <dd><?php echo h($sudije->prezime); ?></dd>
      </dl>
      <dl>
        <dt>JMBG</dt>
        <dd><?php echo h($sudije->jmbg); ?></dd>
      </dl>
      <dl>
        <dt>Pol</dt>
        <dd><?php echo h($sudije->pol()); ?></dd>
      </dl>
      <dl>
        <dt>Status</dt>
        <dd><?php echo h($sudije->state); ?></dd>
      </dl>
      <dl>
        <dt>Sudijski rang</dt>
        <dd><?php echo h($sudije->rang()); ?></dd>
      </dl>
      <dl>
        <dt>Sudijska lista</dt>
        <dd><?php echo h($sudije->sud_lista()); ?></dd>
      </dl>
      <dl>
        <dt>Prebivalište</dt>
        <dd><?php echo h($sudije->prebivaliste); ?></dd>
      </dl>
      <dl>
        <dt>Opis</dt>
        <dd><?php echo h($sudije->description); ?></dd>
      </dl>
    </div>

  </div>

</div>
