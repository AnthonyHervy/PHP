<?php
if (isset($_SESSION['email'])){
if (isset($_POST['deleteEntry'])) {
    $values = array_map($db->escape_string, $_POST);
    extract($_POST);
    if ($entry != 0){

            //Update sql values
    $sql = "DELETE FROM `adress` WHERE `adress`.`id` = '$entry'";
    $db->query($sql); 
    
    
    //affichage ?>
    <div class="alert alert-success" role="alert">			
    <?= MSG_ADMIN_DELETE_OK ?>
	</div>
    

    

<?php } else { ?>
    <div class="alert alert-danger" role="alert">
	<?= MSG_ADMIN_DELETE_FAIL ?>
	</div>
   <?php }
}} ?>