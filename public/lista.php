<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Lista sudija'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>
<?php

$current_page = $_GET['page'] ?? 1;
$per_page = 8;
$total_count = Lista2::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);

?>

<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('/images/uoss.jpg') ?>" />
      <h2>Lista sudija UOSGB</h2>
      <p>Na listi se nalaze sve sudije bez obzira na trenutni status.</p>
      
    </div>
      

      <table id="inventory">
      <tr>
        <th>Redni broj</th>
        <th>Br. legitimacije</th>
        <th>Prezime</th>
        <th>Ime</th>
        <th>JMBG</th>
        <th>Pol</th>
        <th>Status</th>
        <th>Sudijski rang</th>
        <th>Sudijska lista</th>
        <th>Prebivalište</th>
        <th>Detalji</th>
      </tr>
<?php '<br/>' ?>
<?php

$sql = "SELECT * FROM lista2 ORDER by prezime ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$sudije = Lista2::find_by_sql($sql);
//$sudije = Lista2::find_all();

?>
      <?php foreach($sudije as $sudija) { ?>
      <tr>
          <td><?php echo h(Lista2::id()); ?></td>
        <td><?php echo h($sudija->br_leg); ?></td>
        <td><?php echo h($sudija->prezime); ?></td>
        <td><?php echo h($sudija->ime); ?></td>
        <td><?php echo h($sudija->jmbg); ?></td>
        <td><?php echo h($sudija->pol()); ?></td>
        <td><?php echo h($sudija->state); ?></td>
        <td><?php echo h($sudija->rang()); ?></td>
        <td><?php echo h($sudija->sud_lista()); ?></td>
        <td><?php echo h($sudija->prebivaliste); ?></td>
        <td><a href="detalji.php?id=<?php echo $sudija->id ; ?>">Detaljnije</a> </td>
      </tr>
      <?php } ?>
      
      </table>
  </div>
    <div>
        
    <?php
$url = url_for('/lista.php');
echo $pagination->page_links($url);
?>   
        <p>&nbsp</p>
        
        <a href="/uosgb/public/lista2.php" target="blank">Lista svih sudija</a>
        <p>&nbsp;</p>
       <!--
        <dl>
  <dt>Prikaži po strani:</dt>
  <dd>
    <select name="sudija[izbor]">
      <option value=""></option>
    <?php foreach(Lista2::IZBOR as $izbor) { ?>
      <option value="<?php echo $izbor; ?>"<?php if($sudija->izbor == $izbor) { echo 'selected'; } ?>><?php echo $izbor; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>
       -->
    </div>
    
  
    
        