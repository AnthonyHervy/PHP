<div class="container">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-6">
			<form class="form-vertical" role="form" id="update" action="#update" method="post">
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
						<label><?= MSG_ADM_ADD_LASTNAME ?></label>
					</div>
					<div class="form-group col-sm-6">							        		
			    		<input type="text" class="form-control" name="lastname" autocomplete="off" />
			    	</div>
			    	<div class="col-sm-3"></div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label><?= MSG_ADM_ADD_FIRSTNAME ?></label>
					</div>
					<div class="form-group col-sm-6">							        		
			    		<input type="text" class="form-control" name="firstname" autocomplete="off" />
			    	</div>
			    	<div class="col-sm-3"></div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label><?= MSG_ADM_ADD_ADRESS ?></label>
					</div>
					<div class="form-group col-sm-6">							        		
			    		<input type="text" class="form-control" name="adress" autocomplete="off" />
						<input type="text" class="form-control" name="adress2" autocomplete="off" />
			    	</div>
			    	<div class="col-sm-3"></div>
				</div>
				
				<div class="row">
					<div class="col-sm-4">
						<label><?= MSG_ADM_ADD_POSTCODE ?></label>
					</div>
					<div class="form-group col-sm-6">							        		
			    		<input type="text" class="form-control" name="postalCode" autocomplete="off" />
			    	</div>
			    	<div class="col-sm-3"></div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label><?= MSG_ADM_ADD_CITY ?></label>
					</div>
					<div class="form-group col-sm-6">							        		
			    		<input type="text" class="form-control" name="city" autocomplete="off" />
			    	</div>
			    	<div class="col-sm-3"></div>
				</div>		
				<div class="row">
					<div class="col-sm-4">
						<label><?= MSG_ADM_ADD_COUNTRY ?></label>
					</div>
					<div class="form-group col-sm-6">							        		
			    		<?php include ('./inc/countries.php'); ?>
			    	</div>
			    	<div class="col-sm-3"></div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label><?= MSG_ADM_ADD_PHONENUMBER ?></label>
					</div>
					<div class="form-group col-sm-6">							        		
			    		<input type="text" class="form-control" name="phoneNumber" autocomplete="off" />
			    	</div>
			    	<div class="col-sm-3"></div>
				</div>		
				<div class="row">
					<div class="col-sm-4">
					</div>
					<div class="col-sm-3">
						<input type="submit" class="btn btn-success" name="updateEntry" value="<?= MSG_ADMIN_UPDATE_BTN ?>" />						        			
					</div>
					<div class="col-sm-3">
						<input type="reset" class="btn btn-danger" value="<?= MSG_ADM_ADD_RESETBUTTON ?>" id="resetBtn" />
					</div>						        		
				</div>
				<?php } ?>
			</form>	 
		</div>
		<div class="col-sm-2"></div>
	</div>
</div>