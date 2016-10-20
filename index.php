<?php 
	session_start();

	if (isset($_SESSION['update'])) {
		echo "<div id='update' class='alert alert-success text-center'>
  					<strong >Updated </strong>
					</div>";
	}elseif (isset($_SESSION['error'])) {
		echo "<div id='error' class='alert alert-danger text-center'>
					  <strong>Error</strong> 
					</div>";
	}

	if (isset($_SESSION['num_rows_inserted'])) {
		echo "<div id='insert' class='alert alert-info text-center'>
  					<strong >Inserted ".$_SESSION['num_rows_inserted']." products!</strong>
					</div>";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Products</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<body style="background-color:#a6a6a6;">

	<div class="container">
		<div style="margin-top: 200px;" class="row">
			<div class=" col-md-6 col-md-offset-3">
				<div class="panel panel-primary">
					<div class="panel-body">
						Add Products
					</div>
					<div class="panel-footer">
						<form action="synchronizer.php" method="post">
							<?php
								$dir = 'excel';
								$files = scandir($dir);
							?>
							<select style="margin-top: 50px;" name="folder" class="form-control">
								<?php foreach($files as $file):?>
									<?php if(substr ($file, 0,1) != '.'):?>
										<option  value="<?=$file ?>">  <?php echo $file; ?> </option>
									<?php endif; ?>
								<?php endforeach; ?>	
							</select>
							<div class="row" style="margin-top: 50px;">
								<button  type="submit" name="submit" class="btn btn-primary  pull-right ">upload</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$("#update").fadeIn('slow',function() {
        $(this).delay(2000).fadeOut('slow');
    });

    $("#error").fadeIn('slow',function() {
        $(this).delay(2000).fadeOut('slow');
    });

    $("#insert").fadeIn('slow',function() {
        $(this).delay(2000).fadeOut('slow');
    });
	</script>
					
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

<?php 
	session_destroy();
?>

