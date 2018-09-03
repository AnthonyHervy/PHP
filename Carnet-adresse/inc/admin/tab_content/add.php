<div class="container">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-6">		
			<form class="form-vertical" role="form" id="addPersonForm" action="#add" method="post">
				<p class="text-center" id="res"></p>
				<div class="row">
					<div class="col-sm-4">
						<label><?= MSG_ADM_ADD_PREFIX ?></label>
					</div>
					<div class="form-group col-sm-6">							        		
					<input type="radio" name="prefix" value="M" id="M" /> <label for="age"><?= MSG_ADM_ADD_PREFIX_M ?></label><br />
      			    <input type="radio" name="prefix" value="F" id="F" /> <label for="age"><?= MSG_ADM_ADD_PREFIX_F ?></label><br />
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
						<input type="submit" class="btn btn-success" name="adduser" value="<?= MSG_ADM_ADD_ADDBUTTON ?>" />						        			
					</div>
					<div class="col-sm-3">
						<input type="reset" class="btn btn-danger" value="<?= MSG_ADM_ADD_RESETBUTTON ?>" id="resetBtn" />
					</div>						        		
				</div>
			</form>	 
		</div>
		<div class="col-sm-2"></div>
	</div>
</div>
