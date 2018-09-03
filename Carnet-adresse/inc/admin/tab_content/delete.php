<div class="container">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-6">
			<form class="form-vertical" role="form" id="delete" action="#delete" method="post">
				<p class="text-center" id="updateRes"></p>
				<?php
					$sql = "SELECT * FROM adress WHERE id_user='$userID'"; 
					$datas = $db->query($sql);
					$rowcount=mysqli_num_rows($datas);
					if($datas <=0 ){
						echo '<h3 class="text-center font">'.MSG_ADMIN_SELECT_NOENTRY_FOUND.'</h3>';
					}
					else{
				?>
				<div class="row">
					<div class="col-sm-4">
						<label><?= MSG_ADMIN_SELECT_ENTRY ?></label>
					</div>
					<div class="form-group col-sm-6">							        		
						<select class="form-control" id="pemail" name="entry">
							<option value=0><?= MSG_ADMIN_SELECT_CHOOSE ?></option>
				    		<?php 	    				    		
				    			while ($row = $datas->fetch_assoc()) {
				    				echo '<option value="'.$row['id'].'">'.$row['id']." - ".$row['lastname']." ".$row['firstname'].'</option>';
				    			}
				    		?>
			    		</select>
			    	</div>
			    	<div class="col-sm-3"></div>
				</div>
				
				<div class="row">
					<div class="col-sm-4">
					</div>
					<div class="col-sm-3">
						<input type="submit" class="btn btn-danger" name="deleteEntry" value="<?= MSG_ADMIN_DELETE_BTN ?>" />						        			
					</div>					        		
				</div>
				<?php } ?>
			</form>	 
		</div>
		<div class="col-sm-2"></div>
	</div>
</div>