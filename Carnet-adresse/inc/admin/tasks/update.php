<?php
if (isset($_SESSION['email'])){
if (isset($_POST['updateEntry'])) {
    $values = array_map($db->escape_string, $_POST);
    extract($_POST);
    if ($entry != 0){
            //Update sql values
     
    $sql = "UPDATE `adress` SET `prefix` = '$prefix', `lastname` = '$lastname', `firstname` = '$firstname', `adress` = '$adress', `adress2` = '$adress2', `postalCode` = '$postalCode', `city` = '$city', `country` = '$country', `phoneNumber` = '$phoneNumber' WHERE `adress`.`id` = '$entry'";
    $db->query($sql); 
    
    
    //affichage ?>
    <div class="alert alert-success" role="alert">			
    <?= MSG_ADMIN_UPDATE_OK1.$entry." :".$lastname." - ".$firstname.MSG_ADMIN_UPDATE_OK2 ?>
	</div>
    

    

<?php } else { ?>
    <div class="alert alert-danger" role="alert">
	<?= MSG_ADMIN_UPDATE_FAIL ?>
	</div>
   <?php }
}} ?>