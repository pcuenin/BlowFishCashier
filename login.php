<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blowfish POS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body style="background-color:powderblue;">

	<div class="container">

	<!-- Panel for signin -->
		<div class="panel panel-default" style="width: 75%; max-width: 400px; min-width: 270px; margin: auto; margin-top: 10%; border-style: outset">
  			<div class="panel-heading" style="border-right-style: outset; border-top-style: outset; border-left-style: outset; border-bottom-style: none; background-color: #e0ebeb">
				<h4 style="text-align: center"><b> LOGIN </b></h4>
  			</div>
  			<div class="panel-body" style="border-right-style: outset; border-bottom-style: outset; border-left-style: outset;">

			<!-- Form for login information -->
				<form style="width: 70%; margin: auto" action="login_action.php" method="post"> 

				<!-- User input -->
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						<input id="email" type="text" class="form-control" name="email" placeholder="Email">
  					</div>

  					<div class="input-group">
					    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
  					</div>

					<div class="form-group"></div>

				<!-- Radio selection -->
					<div>
						<div class="col-sm-3"></div>
							<label class="radio-inline col-sm-2"><input type="radio" name="security" value="cashier" checked><b> Cashier </b></label>
						<div class="col-sm-2"></div>
							<label class="radio-inline col-sm-2"><input type="radio" name="security" value="admin"><b> Admin </b></label>
						<div class="col-sm-3"></div>
					</div>

					<div class="form-group"><br></div>

				<!-- Buttons -->
					<div class="form-group" style="padding-left: 10%; padding-right: 5%">
							<button type="submit" class="btn btn-info"> Login </button>
							<button type="submit" class="btn btn-default"> Forgot Password </button>
					</div>
				</form>
			</div>
		</div>
	</div>



</body>
</html>