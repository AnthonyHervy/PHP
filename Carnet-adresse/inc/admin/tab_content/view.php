<p class="text-center" id="deleteRes"></p>
<table class="table table-condensed table-responsive">
	<div class="text-align center">
		<form method="post">
		<input type="submit" class="btn btn-success" name="export2csv" value="<?php echo BTN_EXPORT2CSV ?>" />
		</form>				        			
	</div>
	<br />
	<thead>	
		<tr>
			<th><?= MSG_ADM_ID ?></th>
			<th><?= MSG_ADM_ADD_PREFIX ?></th>
			<th><?= MSG_ADM_ADD_LASTNAME ?></th>
			<th><?= MSG_ADM_ADD_FIRSTNAME ?></th>
			<th><?= MSG_ADM_ADD_ADRESS ?></th>
			<th><?= MSG_ADM_ADD_ADRESS." 2" ?></th>
			<th><?= MSG_ADM_ADD_POSTCODE ?></th>
			<th><?= MSG_ADM_ADD_CITY ?></th>
			<th><?= MSG_ADM_ADD_COUNTRY ?></th>
			<th><?= MSG_ADM_ADD_PHONENUMBER ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql = "SELECT * FROM adress WHERE id_user='$userID'"; 
			$datas = $db->query($sql);

			while ($row = $datas->fetch_assoc()) {
				echo '<tr id="'.$row['id'].'">',
					 '<td>'.$row['id'].'</td>',
					 '<td>'.$row['prefix'].'</td>',
					 '<td>'.$row['lastname'].'</td>',
					 '<td>'.$row['firstname'].'</td>',
					 '<td>'.$row['adress'].'</td>',
					 '<td>'.$row['adress2'].'</td>',
					 '<td>'.$row['postalCode'].'</td>',
					 '<td>'.$row['city'].'</td>',
					 '<td>'.$row['country'].'</td>',
					 '<td>'.$row['phoneNumber'].'</td>',
					 '</tr>';	
			}							
		?>
	</tbody>
</table>
