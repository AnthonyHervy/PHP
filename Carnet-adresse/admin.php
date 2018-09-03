<?php 
session_start();
if(! (isset($_SESSION['email']))){
    header('location: index.php');
}
require('./inc/conf.php'); 

// On recupère les informations de l'utilisateur
$email = $_SESSION['email'];
$userlogged = mysqli_fetch_array($db->query("SELECT * FROM users WHERE email='$email'"), MYSQLI_ASSOC); 
$userID = $userlogged['id'];
// Comptage du nombre d'entrées pour l'utilisateur
$sql = "SELECT COUNT(*) AS entries FROM adress WHERE id_user='$userID'";
$count = mysqli_fetch_array($db->query($sql), MYSQLI_ASSOC);

// Execution des tâches
if (isset($_POST['adduser'])) {
    require('./inc/admin/tasks/add.php');
} 
if (isset($_POST['export2csv'])) {
    require('./inc/admin/tasks/csv.php'); 
 }
 if (isset($_POST['updateEntry'])) {
    require('./inc/admin/tasks/update.php'); 
 } 
 if (isset($_POST['deleteEntry'])) {
    require('./inc/admin/tasks/delete.php'); 
 } 
 ?>

<html>
	<head>
        <meta charset="utf-8">
		<title><?= ADM_TITLE ?></title>
        <link href="./css/bootstrap-3.3.0.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="./css/admin.css" rel="stylesheet">
		<link href="./css/fonts.css" rel="stylesheet">
        <script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="./js/bootstrap-3.3.0.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-1">
				</div>
                <div class="col-sm-10">
                	<h1 class="title text-center"> </h1>
                    <div class="card">
	                    <ul class="nav nav-tabs" role="tablist">
	                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= MSG_ADM_HOME ?></a></li>
	                        <li role="presentation"><a href="#add" aria-controls="add" role="tab" data-toggle="tab"><?= MSG_ADM_ADD ?></a></li>
	                        <li role="presentation"><a href="#update" aria-controls="update" role="tab" data-toggle="tab"><?= MSG_ADM_UPDATE ?></a></li>
							<li role="presentation"><a href="#delete" aria-controls="update" role="tab" data-toggle="tab"><?= MSG_ADM_DELETE ?></a></li>
	                        <li role="presentation"><a href="#view" aria-controls="view" role="tab" data-toggle="tab"><?= MSG_ADM_VIEWALL ?></a></li>
	                        <li role="presentation"><a href="logout.php" aria-controls="logout"><?= MSG_ADM_LOGOUT ?></a></li>
	                    </ul>
	                    <div class="tab-content">
	                    	<!-- Home -->
	                        <div role="tabpanel" class="tab-pane active" id="home">	                        	
	                        	<div class="container">
	                        		<div class="row">
		                        		<div class="col-sm-2"></div>   	
			                        	<div class="col-sm-5">
			                        		<h4 class="font"><?= MSG_ADM_WELCOME ?></h4>
			                        		<table class="table borderless">
				                        		<tr>
				                        			<td><?= MSG_NAME ?></td>
				                        			<td>:</td>
				                        			<td><?= $userlogged['username'] ?></td>
				                        		</tr>
				                        		<tr>
				                        			<td><?= MSG_MAIL ?></td>
				                        			<td>:</td>
				                        			<td><?= $userlogged['email']; ?></td>
				                        		</tr>
				                        		<tr>
				                        			<td><?= MSG_NBR_ENTRIES ?></td>
				                        			<td>:</td>
				                        			<td><?= $count['entries'] ?></td>
				                        		</tr>
				                        	</table>
			                        	</div>
			                        	<div class="col-sm-2"></div>   	
			                        	
	                        		</div>
	                        	</div>	                        	
	                        		                        	
	                        </div>
	                        <!-- Add -->
	                        <div role="tabpanel" class="tab-pane" id="add">
	                        	<?php include('inc/admin/tab_content/add.php'); ?>
	                        </div>
	                        <!-- Update -->
	                        <div role="tabpanel" class="tab-pane" id="update">
	                        	<?php include('./inc/admin/tab_content/update.php'); ?>
	                        </div>
							<!-- Delete -->
							<div role="tabpanel" class="tab-pane" id="delete" name="view">
	                        	<?php include('inc/admin/tab_content/delete.php'); ?>
	                        </div>
	                        <!-- View -->
	                        <div role="tabpanel" class="tab-pane" id="view" name="view">
	                        	<?php include('inc/admin/tab_content/view.php'); ?>
	                        </div>
	                    </div>
                    </div>
				</div>
            </div>
		</div>
		<script>
			$(document).ready(function() {
				//reset btn
				$('.btn-danger').click(function(){
					$('#res').text('');
					$('#updateRes').text('');
				});
			});
		</script>
	</body>
</html>