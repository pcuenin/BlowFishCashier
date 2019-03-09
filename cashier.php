<?php
include("logincheck.php"); 
include("config.php");
error_reporting(E_ALL); 
ini_set('display_errors', 1);
?>

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


		<script>
				var counter = 1;

			<!--adds blank row to menu item product list-->
				function addToCart(MenuItemID, ProductName, ProductP) {
					var newRow = $("<tr>");
					var cols = "";
					var counter = 1;
					var Product = ProductName;
					var ProductPrice = ProductP;


					cols += '<td style="width: 60%">'+Product+'</td>';
					cols += '<td style="width: 10%; text-align: center">1</td>';
					cols += '<td style="width: 20%; text-align: right">'+ProductPrice+'</td>';
					cols += '<td style="width: 10%; padding-left: 10px"><button type="submit" class="deleteB btn btn-danger" id="deleteB" onclick="removeFromTotal('+ProductPrice+')"><b> X </b></button></td>';

					newRow.append(cols);
					$("table.table-condensed").append(newRow);
					counter++;

					addToTotal(ProductPrice);

				};
            
            
            
			<!-- function to decrease total cost -->
				function removeFromTotal(ProductPrice) {
					var totalCost = document.getElementById("TotalCost").value;
					totalCost = totalCost-ProductPrice;
					document.getElementById("TotalCost").value = totalCost.toFixed(2);
				};

			<!-- function to increase total cost -->
				function addToTotal(ProductPrice) {
					var totalCost = document.getElementById("TotalCost").value;
					totalCost = Number(totalCost);
					totalCost = totalCost+Number(ProductPrice);
					document.getElementById("TotalCost").value = totalCost.toFixed(2);
				};
            
		            <!-- function to adds a button for each menuItem -->
		                function addButton(MenuItemID, MenuItemName, MenuItemPrice,TableClass){
		                   	var newRow = $("<tr>");
					var cols = "";
					var Name = MenuItemName;
					var Price = MenuItemPrice;
		                    	var ID = MenuItemID;
		                    	var Table = TableClass;
					cols += '<button type="submit" class="deleteB btn btn-danger" id="deleteB" onclick="addtoCart('+ID+','+Name+','+Price+')"><b> '+Name+' </b></button></td>';
					newRow.append(cols);
					$(Table,".table-condensed").append(newRow);
		                };

			$(document).ready(function () {

			<!-- remove row from order table-->
				$("table.table-condensed").on("click", ".deleteB", function (event) {
					$(this).closest("tr").remove();
					counter -= 1
				});

			<!-- remove 20 rows from order table and clear total-->
				$("#clearOrder").on("click", function (event) {
					$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();
					$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();
					$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();
					$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();
					$("#snacks_tab").click();
				});

			<!-- remove 20 rows from order table and clear total-->
				$("#confirmOrder").on("click", function (event) {
					$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();
					$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();
					$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();
					$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();$("#deleteB").click();
					$("#snacks_tab").click();
				});

			});



		</script>

</head>
<body style="background-color: grey">
    
	<div class="container" style="width: 100%; padding: 0px">

	<!-- Panel for cashier interface -->
		<div class="panel panel-default" style="min-width: 900px; min-height: 528px; margin: auto; border-style: none; background-color: grey; padding: 0px">
  			<div class="panel-body">
				<div class="panel panel-default col-xs-6" style="max-width: 45%; min-width: 45%; min-height: 425px; max-height: 440px; border-style: none">
				  	<div class="panel-body" style="min-height: 445px">
					<!-- Table to display the customer order-->
					<form method="POST" action="checkout.php">
						<table class="table table-condensed" id="customerOrder" style="width: 100%">
						<input type="hidden" name="customerOrder" value="customerOrder"/>
							<thead style="font-size: 1.5em; display: block">
								<tr>
									<th style="width: 60%">Item</th>
									<th style="width: 10%">Qty</th>
									<th style="width: 20%; text-align: right">Price</th>
									<th style="width: 13%; color: white">___</th>
								</tr>
							</thead>
							<tbody style="font-size: 1.5em; max-height: 350px; display: block; overflow-y: auto; overflow-x: hidden; margin-bottom: 0px">

							</tbody>
						</table>
						 </form>
					</div>
				<!-- label and display box for total -->
					<div class="form-inline" style="text-align: center">
						<label class="control-label" for="TotalCost" style="font-size: 1.5em; color: white; margin: auto; margin-left: 10%"> Order Total</label>
						<input type="text" class="form-control" id="TotalCost" value="0.00" style="width: 120px; height: 50px; background-color: white; font-size: 1.5em; text-align: right; margin-left: 10px" disabled>
					</div>
				</div>

			<!-- Tabs for item selection -->
				<div class="col-xs-6" style="max-width: 55%; min-width: 55%">
					<ul class="nav nav-pills">
						<li class="active" style="margin-right: 1%; margin-left: 1%; width: 23%">
							<a class="btn btn-primary btn-lg" id="snacks_tab" data-toggle="pill" href="#snacks" style="height: 60px; font-size: 2em">Snack</a>
						</li>
						<li style="margin-right: 1%; width: 23%">
							<a class="btn btn-primary btn-lg" data-toggle="pill" href="#food" style="height: 60px; font-size: 2em">Food</a>
						</li>
						<li style="margin-right: 1%; width: 23%">
							<a class="btn btn-primary btn-lg" data-toggle="pill" href="#soda" style="height: 60px; font-size: 2em">Soda</a>
						</li>
						<li style="margin-right: 1%; width: 23%">
							<a class="btn btn-primary btn-lg" data-toggle="pill" href="#beer" style="height: 60px; font-size: 2em">Beer</a>
						</li>
					</ul>

				<!-- content for item tabs -->
					<div class="panel panel-default" style="min-height: 355px; border-style: none; margin-top: 10px; margin-bottom: 2%; background-color: lightgrey">
						<div class="panel-body">
							<div class="tab-content">

							<!-- Content for snack tab -->
								<div id="snacks" class="tab-pane fade in active">
									<table style="width: 100%">
                                    
										<tr style="text-align: center">
											<?php 
                                           			$query =  "SELECT * FROM `menu_items` WHERE `Category` = 'Snack' AND active = '1'";
								$result = mysqli_query($conn,$query); //execute query
								//$row = mysqli_fetch_array($result); // fetch array
								//echo $row["MenuItemName"];
								?>

								 <?php
								  $i=0;
								  while($row = mysqli_fetch_array($result)){ 								  

								  	if($i%3==0){ $i++;
								  	
										?>
										<tr>
										<td style="width: 33%">
											<button type="button" class="btn btn-info btn-lg" style="width: 95%; height: 70px; margin-bottom: 10px" onclick="addToCart('<?php echo $row["menuItemID"];?>','<?php echo $row["MenuItemName"];?>','<?php echo $row["price"];?>')" id="addItem" data-toggle="modal" value="<?php echo $row["MenuItemID"];?>"><b><?php echo $row["MenuItemName"];?> </b></button>
										</td>
										<?php
									}
									else if($i%3==1){ $i++;
									?>
									<td style="width: 33%">
											<button type="button" class="btn btn-info btn-lg" style="width: 95%; height: 70px; margin-bottom: 10px" onclick="addToCart('<?php echo $row["menuItemID"];?>','<?php echo $row["MenuItemName"];?>','<?php echo $row["price"];?>')" id="addItem" data-toggle="modal" value="<?php echo $row["MenuItemID"];?>"><b><?php echo $row["MenuItemName"];?> </b></button>
										</td>
									<?php 
									}
									else{ $i++;
									?>
									<td style="width: 33%">
											<button type="button" class="btn btn-info btn-lg" style="width: 95%; height: 70px; margin-bottom: 10px" onclick="addToCart('<?php echo $row["menuItemID"];?>','<?php echo $row["MenuItemName"];?>','<?php echo $row["price"];?>')" id="addItem" data-toggle="modal" value="<?php echo $row["MenuItemID"];?>"><b><?php echo $row["MenuItemName"];?> </b></button>
										</td>
										</tr>
									<?php 
									}
									} 
								 ?>
                                    
									</table>
								</div>

							<!-- Content for food tab -->
								<div id="food" class="tab-pane fade">
									<table style="width: 100%">
										<tr style="text-align: center">
											<?php 
                                           			$query =  "SELECT * FROM `menu_items` WHERE `Category` = 'Food' AND active = '1'";
								$result = mysqli_query($conn,$query); //execute query
								//$row = mysqli_fetch_array($result); // fetch array
								//echo $row["MenuItemName"];
								?>

								 <?php
								  $i=0;
								  while($row = mysqli_fetch_array($result)){ 								  

								  	if($i%3==0){ $i++;
								  	
										?>
										<tr>
										<td style="width: 33%">
											<button type="button" class="btn btn-info btn-lg" style="width: 95%; height: 70px; margin-bottom: 10px" onclick="addToCart('<?php echo $row["menuItemID"];?>','<?php echo $row["MenuItemName"];?>','<?php echo $row["price"];?>')" id="addItem" data-toggle="modal" value="<?php echo $row["MenuItemID"];?>"><b><?php echo $row["MenuItemName"];?> </b></button>
										</td>
										<?php
									}
									else if($i%3==1){ $i++;
									?>
									<td style="width: 33%">
											<button type="button" class="btn btn-info btn-lg" style="width: 95%; height: 70px; margin-bottom: 10px" onclick="addToCart('<?php echo $row["menuItemID"];?>','<?php echo $row["MenuItemName"];?>','<?php echo $row["price"];?>')" id="addItem" data-toggle="modal" value="<?php echo $row["MenuItemID"];?>"><b><?php echo $row["MenuItemName"];?> </b></button>
										</td>
									<?php 
									}
									else{ $i++;
									?>
									<td style="width: 33%">
											<button type="button" class="btn btn-info btn-lg" style="width: 95%; height: 70px; margin-bottom: 10px" onclick="addToCart('<?php echo $row["menuItemID"];?>','<?php echo $row["MenuItemName"];?>','<?php echo $row["price"];?>')" id="addItem" data-toggle="modal" value="<?php echo $row["MenuItemID"];?>"><b><?php echo $row["MenuItemName"];?> </b></button>
										</td>
										</tr>
									<?php 
									}
									} 
								 ?>
									</table>
								</div>

							<!-- Content for soda tab -->
								<div id="soda" class="tab-pane fade">
									<table style="width: 100%" class="soda">
									<tr style="text-align: center">
					                                        
					                        <?php 
                                           			$query =  "SELECT * FROM `menu_items` WHERE `Category` = 'Soda' AND active = '1'";
								$result = mysqli_query($conn,$query); //execute query
								//$row = mysqli_fetch_array($result); // fetch array
								//echo $row["MenuItemName"];
								?>

								 <?php
								  $i=0;
								  while($row = mysqli_fetch_array($result)){ 								  

								  	if($i%3==0){ $i++;
								  	
										?>
										<tr>
										<td style="width: 33%">
											<button type="button" class="btn btn-info btn-lg" style="width: 95%; height: 70px; margin-bottom: 10px" onclick="addToCart('<?php echo $row["menuItemID"];?>','<?php echo $row["MenuItemName"];?>','<?php echo $row["price"];?>')" id="addItem" data-toggle="modal" value="<?php echo $row["MenuItemID"];?>"><b><?php echo $row["MenuItemName"];?> </b></button>
										</td>
										<?php
									}
									else if($i%3==1){ $i++;
									?>
									<td style="width: 33%">
											<button type="button" class="btn btn-info btn-lg" style="width: 95%; height: 70px; margin-bottom: 10px" onclick="addToCart('<?php echo $row["menuItemID"];?>','<?php echo $row["MenuItemName"];?>','<?php echo $row["price"];?>')" id="addItem" data-toggle="modal" value="<?php echo $row["MenuItemID"];?>"><b><?php echo $row["MenuItemName"];?> </b></button>
										</td>
									<?php 
									}
									else{ $i++;
									?>
									<td style="width: 33%">
											<button type="button" class="btn btn-info btn-lg" style="width: 95%; height: 70px; margin-bottom: 10px" onclick="addToCart('<?php echo $row["menuItemID"];?>','<?php echo $row["MenuItemName"];?>','<?php echo $row["price"];?>')" id="addItem" data-toggle="modal" value="<?php echo $row["MenuItemID"];?>"><b><?php echo $row["MenuItemName"];?> </b></button>
										</td>
										</tr>
									<?php 
									}
									} 
								 ?>

					                                        
					                                        								
									</table>
								</div>

							<!-- Content for beer tab -->
								<div id="beer" class="tab-pane fade">
									<table style="width: 100%">
										<tr style="text-align: center">
											<?php 
                                           			$query =  "SELECT * FROM `menu_items` WHERE `Category` = 'Beer' AND active = '1'";
								$result = mysqli_query($conn,$query); //execute query
								//$row = mysqli_fetch_array($result); // fetch array
								//echo $row["MenuItemName"];
								?>

								 <?php
								  $i=0;
								  while($row = mysqli_fetch_array($result)){ 								  

								  	if($i%3==0){ $i++;
								  	
										?>
										<tr>
										<td style="width: 33%">
											<button type="button" class="btn btn-info btn-lg" style="width: 95%; height: 70px; margin-bottom: 10px" onclick="addToCart('<?php echo $row["menuItemID"];?>','<?php echo $row["MenuItemName"];?>','<?php echo $row["price"];?>')" id="addItem" data-toggle="modal" value="<?php echo $row["MenuItemID"];?>"><b><?php echo $row["MenuItemName"];?> </b></button>
										</td>
										<?php
									}
									else if($i%3==1){ $i++;
									?>
									<td style="width: 33%">
											<button type="button" class="btn btn-info btn-lg" style="width: 95%; height: 70px; margin-bottom: 10px" onclick="addToCart('<?php echo $row["menuItemID"];?>','<?php echo $row["MenuItemName"];?>','<?php echo $row["price"];?>')" id="addItem" data-toggle="modal" value="<?php echo $row["MenuItemID"];?>"><b><?php echo $row["MenuItemName"];?> </b></button>
										</td>
									<?php 
									}
									else{ $i++;
									?>
									<td style="width: 33%">
											<button type="button" class="btn btn-info btn-lg" style="width: 95%; height: 70px; margin-bottom: 10px" onclick="addToCart('<?php echo $row["menuItemID"];?>','<?php echo $row["MenuItemName"];?>','<?php echo $row["price"];?>')" id="addItem" data-toggle="modal" value="<?php echo $row["MenuItemID"];?>"><b><?php echo $row["MenuItemName"];?> </b></button>
										</td>
										</tr>
									<?php 
									}
									} 
								 ?>
									</table>
								</div>
							</div>
						</div>
					</div>

				<!-- Checkout buttons -->
					<button type="button" onclick="location.href='http://blowfish.store/checkout.php;<?php echo $_POST["customerOrder"];?>" class="btn btn-success btn-lg" id="checkoutB" data-toggle="modal" data-target="#checkoutPop" data-backdrop="static" style="width: 30%; height: 60px; font-size: 2em; margin-right: 3%; margin-left: 2%">Checkout</button>
					<button type="button" class="btn btn-danger btn-lg" id="clearB" data-toggle="modal" data-target="#clearPop" style="width: 30%; height: 60px; font-size: 2em; margin-right: 3%">Clear</button>
					<button type="button" class="btn btn-warning btn-lg" onclick="location.href='http://blowfish.store/admin.php';"style="width: 30%; height: 60px; font-size: 2em">Admin</button>
					
			                    
				</div>
			</div>
		</div>

	<!-- Popup boxes -->
		<!-- checkout popup -->
			<div id="checkoutPop" class="modal fade" role="dialog">
				<div class="modal-dialog" style="width: 40%; margin-top: 15%">
					<div class="modal-content">
						<div class="modal-body">
							<h3 style="text-align: center">Please confirm that you have accepted payment and wish to conclude the order.</h3>
						</div>
						<div class="modal-footer" style="text-align: center">
							<button type="button" class="btn btn-primary btn-lg" id="confirmOrder"data-dismiss="modal" style="width: 40%">Confirm</button>
							<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		<!-- clear popup -->
			<div id="clearPop" class="modal fade" role="dialog">
				<div class="modal-dialog" style="width: 40%; margin-top: 15%">
					<div class="modal-content">
						<div class="modal-body">
							<h3 style="text-align: center">Are you sure you want to clear the current Order?</h3>
						</div>
						<div class="modal-footer" style="text-align: center">
							<button type="button" class="btn btn-primary btn-lg" id="clearOrder" data-dismiss="modal" style="width: 40%">Confirm</button>
							<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		<!-- delete popup -->
			<div id="deletePop" class="modal fade" role="dialog">
				<div class="modal-dialog" style="width: 40%; margin-top: 15%">
					<div class="modal-content">
						<div class="modal-body">
							<h3 style="text-align: center">Are you sure you want to remove these item(s) from the Order?</h3>
						</div>
						<div class="modal-footer" style="text-align: center">
							<button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" style="width: 40%">Confirm</button>
							<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
						</div>
					</div>
				</div>
			</div>

	</div>

   
</body>
</html>
