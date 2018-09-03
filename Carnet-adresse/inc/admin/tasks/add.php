<?php
if (isset($_SESSION['email'])){
if (isset($_POST['adduser'])) {
    $values = array_map($db->escape_string, $_POST);
    extract($_POST);
    
    //Insert into sql
    $sql = "INSERT INTO `adress` (`id`, `prefix`, `lastname`, `firstname`, `adress`, `adress2`, `postalCode`, `city`, `country`, `phoneNumber`, `id_user`) VALUES (DEFAULT, '$prefix', '$lastname', '$firstname', '$adress', '$adress2', '$postalCode', '$city', '$country', '$phoneNumber', '$userID')";
    $db->query($sql); 
    
    
    //affichage ?>
    <div class="alert alert-success" role="alert">			
    <?= MSG_ADM_ADD_ENTRY ?>
	</div>
<?php }} ?>