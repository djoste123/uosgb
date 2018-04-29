<?php require_once('../../../private/initialize.php'); ?>
<?php require_login() ; ?>
<?php

$current_page = $_GET['page'] ?? 1;
$per_page = 8;
$total_count = Lista2::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);

// Find all sudije;
// use pagination instead


$sql = "SELECT * FROM lista2 ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$sudije = Lista2::find_by_sql($sql);

?>
<!--
    
-->
<?php $page_title = 'Lista sudija'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="bicycles listing">
    <h1>Lista sudija</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/sudije/new.php'); ?>">Dodaj sudiju</a>
    </div>

  	<table class="list">
      <tr>
        <th>ID</th>
        <th>Legitimacija</th>
        <th>Ime</th>
        <th>Prezime</th>
        <th>JMBG</th>
        <th>Pol</th>
        <th>Status</th>
        <th>Sudijski rang</th>
        <th>Sudijska lista</th>
        <th>Prebivalište</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($sudije as $sudija) { ?>
        <tr>
          <td><?php echo h($sudija->id); ?></td>
          <td><?php echo h($sudija->br_leg); ?></td>
          <td><?php echo h($sudija->ime); ?></td>
          <td><?php echo h($sudija->prezime); ?></td>
          <td><?php echo h($sudija->jmbg); ?></td>
          <td><?php echo h($sudija->pol()); ?></td>
          <td><?php echo h($sudija->state); ?></td>
        <td><?php echo h($sudija->rang()); ?></td>
        <td><?php echo h($sudija->sud_lista()); ?></td>
        <td><?php echo h($sudija->prebivaliste); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/sudije/show.php?id=' . h(u($sudija->id))); ?>">Detalji</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/sudije/edit.php?id=' . h(u($sudija->id))); ?>">Promeni</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/sudije/delete.php?id=' . h(u($sudija->id))); ?>">Izbriši</a></td>
    	  </tr>
      <?php } ?>
  	</table>
<?php
$url = url_for('/staff/sudije/index.php');
echo $pagination->page_links($url);
?>
    
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
