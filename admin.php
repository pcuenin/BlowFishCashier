<?php
//include("adminCheck.php"); 
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

		$(document).ready(function () {

			var counter = 2;

			<!-- adds blank row to menu item product list-->
			$("#addProdMenuItem").on("click", function (event) {
				var newRow = $("<tr>");
				var cols = "";


				<!-- populate select menu items from DB -->
				cols += '<td><select class="form-control" id="menuProductName'+counter+'" onchange="fillMenuItemProductUnit(this.id)" style="width: 200px; margin-right: 5px; margin-bottom: 5px">';
				cols += '<option>Select One</option>';
				cols += '<option value="bottlecoke">Bottle Coke</option>';
				cols += '<option value="bottlesprite">Bottle Sprite</option>';
				cols += '<option value="hotdogbun">Hotdog Bun</option>';
				cols += '<option value="hotdog">Hotdog</option>';
				cols += '</select></td>';

				cols += '<td><input type="number" class="form-control" id="menuProductAmount'+counter+'" onchange="fillMenuItemProductAmt(this.id)" placeholder="Enter Amount" style="width: 128px; margin-right: 5px; margin-left: 5px; margin-bottom: 5px"></td>';
				cols += '<td><input type="text" class="form-control" id="menuProductUnit'+counter+'" style="width: 120px; margin-left: 5px; margin-bottom: 5px; background-color: white" disabled></td>';
				cols += '<td><input type="text" class="form-control" id="menuProductCost'+counter+'" style="width: 120px; margin-left: 5px; margin-bottom: 5px; background-color: white" disabled></td>';
				cols += '<td><button type="button" id="prodDeleteB" class="prodDeleteB btn btn-danger"><b> X </b></button></td>';
				newRow.append(cols);
				$("table.table-condensed").append(newRow);
				counter++;
			});

			<!-- remove row from menu item product list-->
			$("table.table-condensed").on("click", ".prodDeleteB", function (event) {
				$(this).closest("tr").remove();
				counter -= 1
			});

			<!-- remove 20 rows from menu item product list when cleared-->
			$("#clearMenuItem").on("click", function (event) {
				$("#prodDeleteB").click();$("#prodDeleteB").click();$("#prodDeleteB").click();$("#prodDeleteB").click();$("#prodDeleteB").click();
				$("#prodDeleteB").click();$("#prodDeleteB").click();$("#prodDeleteB").click();$("#prodDeleteB").click();$("#prodDeleteB").click();
				$("#prodDeleteB").click();$("#prodDeleteB").click();$("#prodDeleteB").click();$("#prodDeleteB").click();$("#prodDeleteB").click();
				$("#prodDeleteB").click();$("#prodDeleteB").click();$("#prodDeleteB").click();$("#prodDeleteB").click();$("#prodDeleteB").click();
			});

		});


		<!-- function to clear forms -->
		function clearForm(myFormElement) {
			var elements = myFormElement.elements;
			myFormElement.reset();
			for(i=0; i<elements.length; i++) {
				field_type = elements[i].type.toLowerCase();
				switch(field_type) {
					case "text":
					case "password":
					case "textarea":
					case "hidden":
					elements[i].value = "";
					break;
					case "radio":
					case "checkbox":
					if (elements[i].checked) {
						elements[i].checked = false;
					}
					break;
					case "select-one":
					case "select-multi":
					elements[i].selectedIndex = 0;
					break;
					default:
					break;
				}
			}
		}

		<!-- fill user information on update popup -->
		function fillUserInfo(){
			var user = document.getElementById("userUpdate").value;
			<!-- get info from DB -->
			var name = "Devin Leon";
			var email = "devinleon123@gmail.com";
			var password = "Password";
			var privilege = "Admin";

			document.getElementById("userNameUpdate").value = name;
			document.getElementById("userEmailUpdate").value = email;
			document.getElementById("userPasswordUpdate").value = password;
			document.getElementById("userPasswordConUpdate").value = password;
			document.getElementById("userPrivUpdate").value = privilege;
		}

		<!-- fill vendor information on update popup -->
		function fillVendorInfo(){
			var vendor = document.getElementById("vendorUpdate").value;
			<!-- get info from DB -->
			var name = "CocaCola";
			var address = "148 Timmerman Rd. Swansea, SC 29160";
			var email = "devinleon123@gmail.com";
			var phone = "803-606-1019";
			var fax = "fax number";
			var salesRep = "Devin Leon";
			var customerID = "123456789";

			document.getElementById("vendorNameUpdate").value = name;
			document.getElementById("vendorAddressUpdate").value = address;
			document.getElementById("vendorEmailUpdate").value = email;
			document.getElementById("vendorPhoneUpdate").value = phone;
			document.getElementById("vendorFaxUpdate").value = fax;
			document.getElementById("vendorSalesRepUpdate").value = salesRep;
			document.getElementById("vendorCustomerIDUpdate").value = customerID;
		}

		<!-- fill menu item info -->
		function fillMenuItemInfo(){
			var menuItem = document.getElementById("viewMenuItem").value;
			<!-- get info from DB -->
			var name = menuItem;
			var price = "5.00";
			var active = "true";
			var salePrice = "3.00";
			var saleActive = "false";

			document.getElementById("menuItemName").value = name;
			document.getElementById("menuItemPrice").value = price;
			document.getElementById("menuItemActive").value = active;
			document.getElementById("menuItemSalePrice").value = salePrice;
			document.getElementById("menuItemSaleActive").value = saleActive;
		}

		<!-- fill product information  -->
		function fillProductInfo(){
			var product = document.getElementById("viewProduct").value;


			<?php  // populate users info
			$query =  "SELECT  products.name, products.productID, products.caseSize, products.caseUnit, products.caseCost, products.unitSizeNum, products.unit, products.location, products.amount, vendors.nameVendor FROM products INNER JOIN vendors ON products.venderID=vendors.venderID";
			$result = mysqli_query($conn,$query); //execute query
								 // fetch array
								//echo $row["name"];
								//$row = mysqli_fetch_array($result); // fetch array
								//echo $row["name"];
			?>

			<?php
			while($row = mysqli_fetch_array($result)){ 
								  	//pmc
			?>


									//<option value="<?php //echo $row["productID"];?>"><?php //echo $row["name"];?></option>

									
			

			if(product=<?php echo $row["name"];?>){
			var productName = "<?php echo $row["name"];?>";
			var productID = "<?php echo $row["productID"];?>";
			var vendor = "<?php echo $row["nameVendor"];?>";
			var caseSize = "<?php echo $row["caseSize"];?>";
			var caseUnit = "<?php echo $row["caseUnit"];?>";
			var caseCost = "<?php echo $row["caseCost"];?>";
			var unitSize = "<?php echo $row["unitSizeNum"];?>";
			var unitUnit = "<?php echo $row["unit"];?>";
			var location = "<?php echo $row["location"];?>";
			var currentStock = ""<?php echo $row["amount"];?>"";
			var minStock = "<?php echo $row["minStock"];?>";

			}
			<?php } ?>
			<!-- get info from DB -->
			

			document.getElementById("productName").value = productName;
			document.getElementById("productID").value = productID;
			document.getElementById("productVendor").value = vendor;
			document.getElementById("productCaseSize").value = caseSize;
			document.getElementById("productCaseUnit").value = caseUnit;
			document.getElementById("productCaseCost").value = caseCost;
			document.getElementById("productUnitSize").value = unitSize;
			document.getElementById("productUnitUnit").value = unitUnit;
			document.getElementById("productLocation").value = location;
			document.getElementById("productCurrentStock").value = currentStock;
			document.getElementById("productCurrentStockUnit").value = unitUnit;
			document.getElementById("productMinStock").value = minStock;
			document.getElementById("productMinStockUnit").value = unitUnit;
		}

		<!-- fill units for current and threshold -->
		function fillUnit(){
			var unit = document.getElementById("productUnitUnit").value;

			document.getElementById("productCurrentStockUnit").value = ""+unit;
			document.getElementById("productMinStockUnit").value = ""+unit;
		}

		<!-- fills product unit in product table for menu item -->
		function fillMenuItemProductUnit(selectorID){
			var product = document.getElementById(selectorID).value;

			var productNum = selectorID.slice(15, 16);
			var ProductUnit = "";

			document.getElementById("menuProductUnit"+productNum).value = productNum
		}

		<!-- fills product price in product table for menu item -->
		function fillMenuItemProductAmt(selectorID){
			var productAmount = document.getElementById(selectorID).value;

			var productNum = selectorID.slice(18, 19);
			var ProductPrice = "";

			document.getElementById("menuProductUnit"+productNum).value = productNum;
		}

	</script>

</head>
<body style="background-color:powderblue;">

	<div class="container" style="width: 100%">

		<!-- Panel to hold the navtabs -->
		<div class="panel panel-default" style="width: 75%; max-width: 1000px; min-width: 750px; margin: auto; margin-top: 5%; margin-bottom: 5%">

			<!-- the tabs -->
			<ul id="mainTabs" class="nav nav-tabs" style="border: none; background-color: #e0ebeb; padding-top: 5px">
				<li class="active"><a data-toggle="tab" href="#users">Users</a></li>
				<li><a data-toggle="tab" href="#menu">Menu Items</a></li>
				<li><a data-toggle="tab" href="#products">Produts</a></li>
				<li><a data-toggle="tab" href="#salesReport">Sales Report</a></li>
				<li><a data-toggle="tab" href="#inventoryReport">Inventory Report</a></li>
				<li><button type="button" onclick="location.href='http://blowfish.store/cashier.php';" class="btn btn-warning btn-md" style="margin-left: 150px">Cashier</button></li>
			</ul>

			<!-- Body of panel to hold content for each tab -->
			<div class="panel-body" style="margin: none">
				<div class="tab-content">

					<!-- Content for users tab -->
					<div id="users" class="tab-pane fade in active">
						<!-- Users -->
						<div class="col-sm-12"><br /></div>
						<div class="col-sm-12">
							<table class="table table-hover" style="margin: auto">
								<thead>
									<h3>Users</h3>
									<tr>
										<th width="160px">Name</th>
										<th width="200px">Email</th>
										<th width="100 px">Type</th>
										<th width="50px"></th>
									</tr>
								</thead>
								<tbody>
									<!-- User 1 -->
								<?php  // populate users info
								$query =  "SELECT * FROM users";
								$result = mysqli_query($conn,$query); //execute query
								 // fetch array
								//echo $row["name"];
								//$row = mysqli_fetch_array($result); // fetch array
								//echo $row["name"];
								?>

								<?php
								while($row = mysqli_fetch_array($result)){ 
									?>
									<tr>
										<td style="vertical-align: middle"><?php echo $row["name"];?></td>
										<td style="vertical-align: middle"><?php echo $row["email"];?></td>
										<td style="vertical-align: middle"><?php echo $row["privilege"];?></td>
										<td style="padding-left: 5px">
											<button type="submit" class="btn btn-danger" id="deleteUserB1" data-toggle="modal" data-target="#deleteUserPop" data-backdrop="static" value="<?php echo $row["userID"];?>"><b> X </b></button>
										</td>
									</tr>
									<?php } ?>



									
								<!-- User 2 
									<tr>
										<td style="vertical-align: middle">Example 2</td>
										<td style="vertical-align: middle">example123@gmail.com</td>
										<td style="vertical-align: middle">Cashier</td>
										<td style="padding-left: 5px">
											<button type="submit" class="btn btn-danger" id="deleteUserB2" data-toggle="modal" data-target="#deleteUserPop" data-backdrop="static"><b> X </b></button>
										</td>
									</tr>
								-->
								<tr>
									<td colspan="2" style="background-color: white">
										<button type="submit" class="btn btn-info" id="addUserB" data-toggle="modal" data-target="#addUserPop" data-backdrop="static"> Add User </button>
										<button type="submit" class="btn btn-info" id="updateUserB" data-toggle="modal" data-target="#updateUserPop" data-backdrop="static"> Update User </button>
									</td>
									<td style="background-color: white"></td>
									<td style="background-color: white"></td>
								</tr>

							</tbody>
						</table>
					</div>
					<div class="col-sm-12"><br /></div>
					<div class="col-sm-12"><br /></div>
					<!-- Vendors -->
					<div class="col-sm-12">
						<table class="table table-hover" style="margin: auto">
							<thead>
								<h3>Vendors</h3>
								<tr>
									<th width="130px">Name</th>
									<th width="200px">Adress</th>
									<th width="150 px">Phone</th>
									<th width="150 px">Fax</th>
									<th width="120 px">Sales Rep.</th>
									<th width="50px"></th>
								</tr>
							</thead>
							<tbody>
								<!-- Vender 1 -->
								<?php  // populate users info
								$query =  "SELECT * FROM vendors";
								$result = mysqli_query($conn,$query); //execute query
								 // fetch array
								//echo $row["name"];
								//$row = mysqli_fetch_array($result); // fetch array
								//echo $row["name"];
								?>

								<?php
								while($row = mysqli_fetch_array($result)){ 
									?>
									<tr>
										<td style="vertical-align: middle"><?php echo $row["nameVendor"];?></td>
										<td style="vertical-align: middle"><?php echo $row["address"];?></td>
										<td style="vertical-align: middle"><?php echo $row["phone"];?></td>
										<td style="vertical-align: middle"><?php echo $row["fax"];?></td>
										<td style="vertical-align: middle"><?php echo $row["salesRep"];?></td>
										<td style="padding-left: 5px">
											<button type="submit" class="btn btn-danger" id="deleteUserB1" data-toggle="modal" data-target="#deleteUserPop" data-backdrop="static" value="<?php echo $row["venderID"];?>"><b> X </b></button>
										</td>
									</tr>
									<?php } ?>
								<!--
									<tr>
										<td style="vertical-align: middle">US Foods</td>
										<td style="vertical-align: middle">123 Lander Ave. Greenwood, SC 29649</td>
										<td style="vertical-align: middle">(800) 123-1234</td>
										<td style="vertical-align: middle">(800) 123-1234</td>
										<td style="vertical-align: middle">Devin Leon</td>
										<td style="padding-left: 5px">
											<button type="submit" class="btn btn-danger" id="deleteVendorB1" data-toggle="modal" data-target="#deleteVendorPop" data-backdrop="static"><b> X </b></button>
										</td>
									</tr>
								<!-- Vender 2 
									<tr>
										<td style="vertical-align: middle">CocaCola</td>
										<td style="vertical-align: middle">123 Lander Ave. Greenwood, SC 29649</td>
										<td style="vertical-align: middle">(800) 123-1234</td>
										<td style="vertical-align: middle">(800) 123-1234</td>
										<td style="vertical-align: middle">Devin Leon</td>
										<td style="padding-left: 5px">
											<button type="submit" class="btn btn-danger" id="deleteVendorB2" data-toggle="modal" data-target="#deleteVendorPop" data-backdrop="static"><b> X </b></button>
										</td>
									</tr>
								-->
								<tr>
									<td colspan="2" style="background-color: white">
										<button type="submit" class="btn btn-info" id="addVendorB" data-toggle="modal" data-target="#addVendorPop" data-backdrop="static"> Add Vender </button>
										<button type="submit" class="btn btn-info" id="updateVendorB" data-toggle="modal" data-target="#updateVendorPop" data-backdrop="static"> Update Vender </button>
									</td>
									<td style="background-color: white"></td>
									<td style="background-color: white"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Content for menu item tab -->
				<div id="menu" class="tab-pane fade">
					<div class="col-sm-12"><P><br /></div>
					<!-- Menu items buttons -->
					<div class="form-group" style="padding-left: 20%; padding-right: 20%">
						<button type="submit" class="btn btn-info" id="selectMenuItemB" data-toggle="modal" data-target="#selectMenuItemPop" data-backdrop="static"> View Menu Item </button>
						<button type="submit" class="btn btn-info" id="updateMenuItemB" data-toggle="modal" data-target="#updateMenuItemPop" data-backdrop="static"> Update </button>
						<button type="submit" class="btn btn-info" id="clearMenuItem" onclick="clearForm(menuItemForm)"> Clear </button>
						<button type="submit" class="btn btn-info" id="addMenuItemB" data-toggle="modal" data-target="#addMenuItemPop" data-backdrop="static"> Add Menu Item</button>
					</div>
					<div class="col-sm-12"><P><br /></div>
					<!-- Menu items information -->
					<form class="form-horizontal" id="menuItemForm">
						<!-- Menu items name -->
						<div class="form-group">
							<div class="col-sm-1"></div>
							<label class="control-label col-sm-3" for="menuItemName"> Menu Item Name </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="menuItemName" placeholder="Enter name" style="width: 250px">
							</div>
							<div class="col-sm-1"></div>
						</div>
						<!-- Menu item Cost -->
						<div class="form-group">
							<div class="col-sm-1"></div>
							<label class="control-label col-sm-3" for="menuItemPrice"> Menu Price </label>
							<div class="col-sm-2">
								<input type="number" class="form-control" id="menuItemPrice" placeholder="0.00" style="width: 115px; text-align: right">
							</div>
							<div class="col-sm-6"></div>
						</div>
						<!-- Menu item active -->
						<div class="form-group">
							<div class="col-sm-1"></div>
							<label class="control-label col-sm-3" for="menuItemActive"> Active </label>
							<div class="col-sm-7">
								<select class="form-control" id="menuItemActive" style="width: 250px">
									<option>Select One</option>
									<option value="true">Active</option>
									<option value="false">Inactive</option>
								</select>
							</div>
							<div class="col-sm-1"></div>
						</div>
						<div class="col-sm-12"><P><br /></div>
						<!-- Menu item sale price -->
						<div class="form-group">
							<div class="col-sm-1"></div>
							<label class="control-label col-sm-3" for="menuItemSalePrice"> Sale Price </label>
							<div class="col-sm-2">
								<input type="number" class="form-control" id="menuItemSalePrice" placeholder="0.00" style="width: 115px; text-align: right">
							</div>
							<div class="col-sm-6"></div>
						</div>
						<!-- Menu item sale active -->
						<div class="form-group">
							<div class="col-sm-1"></div>
							<label class="control-label col-sm-3" for="menuItemSaleActive"> Sale Active </label>
							<div class="col-sm-7">
								<select class="form-control" id="menuItemSaleActive" style="width: 250px">
									<option>Select One</option>
									<option value="true">Active</option>
									<option value="false">Inactive</option>
								</select>
							</div>
							<div class="col-sm-1"></div>
						</div>
						<div class="col-sm-12"><P><br /></div>
						<!-- Menu Products -->
						<table id="menuItemProducts" class="table table-condensed" style="margin: auto; width: 50%">
							<thead>
								<tr>
									<th style="text-align: center">Product Name</th>
									<th style="text-align: center">Amount</th>
									<th style="text-align: center">Unit</th>
									<th style="text-align: center">Product Cost</th>
								</tr>
							</thead>
							<tbody>
								<!-- Menu Product 1 -->
								<tr>
									<td>
										<select class="form-control" id="menuProductName1" onchange="fillMenuItemProductUnit(this.id)" style="width: 200px; margin-right: 5px; margin-bottom: 5px">
											<option value="null">Select One</option>
											<option value="bottlecoke">Bottle Coke</option>
											<option value="bottlesprite">Bottle Sprite</option>
											<option value="hotdogbun">Hotdog Bun</option>
											<option value="hotdog">Hotdog</option>
										</select>
									</td>
									<td>
										<input type="number" class="form-control" id="menuProductAmount1" onchange="fillMenuItemProductAmt(this.id)" placeholder="Enter Amount" style="width: 128px; margin-right: 5px; margin-left: 5px; margin-bottom: 5px">
									</td>
									<td>
										<input type="text" class="form-control" id="menuProductUnit1" style="width: 120px; margin-left: 5px; margin-bottom: 5px; background-color: white" disabled>
									</td>
									<td>
										<input type="text" class="form-control" id="menuProductCost1" style="width: 120px; margin-left: 5px; margin-bottom: 5px; background-color: white" disabled>
									</td>
									<td style="padding-left: 5px">
										<button type="button" class="btn btn-danger" style="margin-bottom: 3px; background-color: white; border: none" disabled><b> X </b></button>
									</td>
								</tr>
							</tbody>
						</tfoot>
						<tr>
							<td colspan="2">
								<button type="button" id="addProdMenuItem" class="btn btn-info"> Add Product </button>
							</td>
							<th style="text-align: center">Total Cost</th>
							<td>
								<input type="number" class="form-control" id="menuTotalCost" placeholder="" style="width: 120px; margin-left: 5px; margin-bottom: 5px; background-color: white" disabled>
							</td>
						</tr>
					</tfoot>
				</table>
			</form>
		</div>

		<!-- Content for products tab -->
		<div id="products" class="tab-pane fade">
			<div class="col-sm-12"><P><br /></div>
			<!-- Product buttons -->
			<div class="form-group" style="padding-left: 25%; padding-right: 25%">
				<button type="submit" class="btn btn-info" id="selectProductB" data-toggle="modal" data-target="#selectProductPop" data-backdrop="static"> View Product </button>
				<button type="submit" class="btn btn-info" id="updateProductB" data-toggle="modal" data-target="#updateProductPop" data-backdrop="static"> Update </button>
				<button type="submit" class="btn btn-info" onclick="clearForm(productForm)"> Clear </button>
				<button type="submit" class="btn btn-info" id="addProductB" data-toggle="modal" data-target="#addProductPop" data-backdrop="static"> Add Product</button>
			</div>
			<div class="col-sm-12"><P><br /></div>
			<!-- Product information -->
			<form class="form-horizontal" id="productForm">
				<!-- Product name -->
				<div class="form-group">
					<div class="col-sm-1"></div>
					<label class="control-label col-sm-3" for="productName"> Product Name </label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="productName" placeholder="Enter name" style="width: 250px">
					</div>
					<div class="col-sm-1"></div>
				</div>
				<!-- Product ID -->
				<div class="form-group">
					<div class="col-sm-1"></div>
					<label class="control-label col-sm-3" for="productID"> Product ID </label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="productID" placeholder="Enter ID" style="width: 250px">
					</div>
					<div class="col-sm-1"></div>
				</div>
				<!-- Vender -->
				<div class="form-group">
					<div class="col-sm-1"></div>
					<label class="control-label col-sm-3" for="productVender"> Vender </label>
					<div class="col-sm-7">
						<select class="form-control" id="productVendor" style="width: 250px">
							<option>Select One</option>
							<option value="USFoods">US Foods</option>
							<option value="CocaCola">Coca Cola</option>
							<option value="Budweiser">Budweiser</option>
						</select>
					</div>
					<div class="col-sm-1"></div>
				</div>
				<!-- Case size -->
				<div class="form-group">
					<div class="col-sm-1"></div>
					<label class="control-label col-sm-3" for="productCaseSize"> Case Size </label>
					<div class="col-sm-2">
						<input type="number" class="form-control" id="productCaseSize" placeholder="Enter Size" style="width: 115px; text-align: right">
					</div>
					<div class="col-sm-6">
						<select class="form-control" id="productCaseUnit" style="width: 120px;">
							<option>Select One</option>
							<option value="Bottle">Bottle</option>
							<option value="Can">Can</option>
							<option value="Gallon">Gallon</option>
							<option value="Bun">Bun</option>
						</select>
					</div>
				</div>
				<!-- Case Cost -->
				<div class="form-group">
					<div class="col-sm-1"></div>
					<label class="control-label col-sm-3" for="productCaseCost"> Cost Per Case </label>
					<div class="col-sm-2">
						<input type="number" class="form-control" id="productCaseCost" placeholder="0.00" style="width: 115px; text-align: right">
					</div>
					<div class="col-sm-6"></div>
				</div>
				<!-- Unit size -->
				<div class="form-group">
					<div class="col-sm-1"></div>
					<label class="control-label col-sm-3" for="productUnitSize"> Unit Size </label>
					<div class="col-sm-2">
						<input type="number" class="form-control" id="productUnitSize" placeholder="Enter Size" style="width: 115px; text-align: right">
					</div>
					<div class="col-sm-6">
						<select class="form-control" id="productUnitUnit" onchange="fillUnit()" style="width: 120px">
							<option>Select One</option>
							<option value="Bottle">Bottle</option>
							<option value="Can">Can</option>
							<option value="Gallon">Gallon</option>
							<option value="Bun">Bun</option>
						</select>
					</div>
				</div>
				<!-- Location -->
				<div class="form-group">
					<div class="col-sm-1"></div>
					<label class="control-label col-sm-3" for="productLocation"> Location </label>
					<div class="col-sm-7">
						<select class="form-control" id="productLocation" style="width: 250px">
							<option>Select One</option>
							<option value="Concessions">Concessions</option>
							<option value="Storage">Storage</option>
							<option value="Fridge">Fridge</option>
							<option value="Freezer">Freezer</option>
						</select>
					</div>
					<div class="col-sm-1"></div>
				</div>
				<div class="col-sm-12"><P><br /></div>
				<!-- Current Stock -->
				<div class="form-group">
					<div class="col-sm-1"></div>
					<label class="control-label col-sm-3" for="productCurrentStock"> Current Stock </label>
					<div class="col-sm-2">
						<input type="number" class="form-control" id="productCurrentStock" placeholder="Enter Stock" style="width: 115px; text-align: right">
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="productCurrentStockUnit" placeholder="" style="width: 120px; margin-left: 5px; margin-bottom: 5px; background-color: white" disabled>
					</div>
				</div>
				<!-- Min Stock -->
				<div class="form-group">
					<div class="col-sm-0"></div>
					<label class="control-label col-sm-4" for="productMinStock"> Minimun Stock Warning </label>
					<div class="col-sm-2">
						<input type="number" class="form-control" id="productMinStock" placeholder="Enter Min" style="width: 115px; text-align: right">
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="productMinStockUnit" placeholder="" style="width: 120px; margin-left: 5px; margin-bottom: 5px; background-color: white" disabled>
					</div>
				</div>
			</form>
		</div>

		<!-- Content for sales report tab -->
		<div id="salesReport" class="tab-pane fade">
			<div class="col-sm-12"><P><br /></div>
			<div class="form-group" style="padding-left: 10%; padding-right: 10%">
				<div class="col-sm-2"></div>
				<input type="text" class="form-control col-sm-3" id="salesDateStart" placeholder="MM/DD/YYYY" style="width: 150px; margin: auto; margin-bottom: 10px; text-align: center">
				<div class="col-sm-1"><h4 style="text-align: center">to</h4></div>
				<input type="text" class="form-control col-sm-3" id="salesDateEnd" placeholder="MM/DD/YYYY" style="width: 150px; margin: auto; margin-bottom: 10px; text-align: center">
				<div class="col-sm-3"></div>
			</div>
			<!-- sales report buttons -->
			<div class="form-group col-sm-12" style="padding-left: 25%; padding-right: 25%">
				<button type="submit" class="btn btn-info"> Generate Report </button>
				<button type="submit" class="btn btn-info"> Clear </button>
				<button type="submit" class="btn btn-info"> Print </button>
			</div>
			<div class="col-sm-12"><P><br /></div>
			<!-- sales report information -->
			<div class="col-sm-1"><P><br /></div>
			<label class="control-label col-sm-2" for="salesStartLabel" style="text-align: right"> Start Date: </label>
			<p class="col-sm-2"> 10/10/1999 </p>
			<div class="col-sm-2"><P><br /></div>
			<label class="control-label col-sm-2" for="salesStartLabel" style="text-align: right"> Total Orders: </label>
			<p class="col-sm-2"> 999 </p>
			<div class="col-sm-1"><P><br /></div>
			<div class="col-sm-1"><P><br /></div>
			<label class="control-label col-sm-2" for="salesStartLabel" style="text-align: right"> End Date: </label>
			<p class="col-sm-2"> 10/10/1999 </p>
			<div class="col-sm-2"><P><br /></div>
			<label class="control-label col-sm-2" for="salesStartLabel">  </label>
			<p class="col-sm-2">  </p>
			<div class="col-sm-1"><P><br /></div>

			<!-- Table to display top 3 -->
			<div class="col-sm-12"><P><br /></div>
			<h4 class="col-sm-12" style="margin-left: 10px">Most Sold</h4>
			<table class="table table-hover" style="margin: auto">
				<thead>
					<tr>
						<th>Menu Item Name</th>
						<th>Amount Sold</th>
						<th>Sale Price ($)</th>
						<th>Item Cost ($)</th>
						<th>Profit ($)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Example</td>
						<td>100</td>
						<td>10.00</td>
						<td>4.00</td>
						<td>6.00</td>
					</tr>
					<tr>
						<td>Example</td>
						<td>100</td>
						<td>10.00</td>
						<td>4.00</td>
						<td>6.00</td>
					</tr>
					<tr>
						<td>Example</td>
						<td>100</td>
						<td>10.00</td>
						<td>4.00</td>
						<td>6.00</td>
					</tr>
				</tbody>
			</table>
			<div class="col-sm-12"><P><br /></div>
			<!-- Table to display bottom 3 -->
			<h4 class="col-sm-12" style="margin-left: 10px">Least Sold</h4>
			<table class="table table-hover" style="margin: auto">
				<thead>
					<tr>
						<th>Menu Item Name</th>
						<th>Amount Sold</th>
						<th>Sale Price ($)</th>
						<th>Item Cost ($)</th>
						<th>Profit ($)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Example</td>
						<td>10</td>
						<td>10.00</td>
						<td>4.00</td>
						<td>6.00</td>
					</tr>
					<tr>
						<td>Example</td>
						<td>10</td>
						<td>10.00</td>
						<td>4.00</td>
						<td>6.00</td>
					</tr>
					<tr>
						<td>Example</td>
						<td>10</td>
						<td>10.00</td>
						<td>4.00</td>
						<td>6.00</td>
					</tr>
				</tbody>
			</table>
			<div class="col-sm-12"><P><br /></div>
			<!-- Table to display all menu items -->
			<h4 class="col-sm-12" style="margin-left: 10px">All Items Sold</h4>
			<table class="table table-hover" style="margin: auto">
				<thead>
					<tr>
						<th>Menu Item Name</th>
						<th>Amount Sold</th>
						<th>Sale Price ($)</th>
						<th>Item Cost ($)</th>
						<th>Profit ($)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Example</td>
						<td>50</td>
						<td>10.00</td>
						<td>4.00</td>
						<td>6.00</td>
					</tr>
					<tr>
						<td>Example</td>
						<td>50</td>
						<td>10.00</td>
						<td>4.00</td>
						<td>6.00</td>
					</tr>
					<tr>
						<td>Example</td>
						<td>50</td>
						<td>10.00</td>
						<td>4.00</td>
						<td>6.00</td>
					</tr>
					<tr>
						<td>Example</td>
						<td>50</td>
						<td>10.00</td>
						<td>4.00</td>
						<td>6.00</td>
					</tr>
					<tr>
						<td>Example</td>
						<td>50</td>
						<td>10.00</td>
						<td>4.00</td>
						<td>6.00</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<th>Total Sales</th>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>

		<!-- Content for inventory report tab -->
		<div id="inventoryReport" class="tab-pane fade">
			<div class="col-sm-12"><P><br /></div>
			<!-- inventory report buttons -->
			<div class="col-sm-4"><P><br /></div>
			
			<div class="col-sm-2"><P><br /></div>
			<div class="col-sm-12"><P><br /></div>
			<!-- Inentory report information  -->
			<div class="col-sm-1"><P><br /></div>
			<label class="control-label col-sm-2" for="inventoryDateLabel" style="text-align: right"> Date: </label>

			<p class="col-sm-2" id="date"></p> 
			<script>
				n =  new Date();
				y = n.getFullYear();
				m = n.getMonth() + 1;
				d = n.getDate();
				document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
			</script>
			
			<div class="col-sm-7"><P><br /></div>
			<!-- Table to display low products -->
			<div class="col-sm-12"><P><br /></div>
			<h4 class="col-sm-4">Products Low</h4>
			<div class="col-sm-8"></div>
			<table class="table table-hover" style="margin: auto">
				<thead>
					<tr>
						<th style="text-align: center">Product Name</th>
						<th style="text-align: center">Product ID</th>
						<th style="text-align: center">Vender</th>
						<th style="text-align: center">Location</th>
						<th style="text-align: center">Case Size</th>
						<th style="text-align: center">Unit Per Case</th>
						<th style="text-align: center">Current Units</th>
					</tr>
				</thead>
				<tbody>
				<?php  // populate product info
				$query =  "SELECT products.name, products.productID, products.location, products.caseSize, products.unitSizeNum, products.amount, vendors.nameVendor FROM `products` LEFT JOIN vendors ON products.venderID = vendors.venderID WHERE products.amount<products.minStock";
								$result = mysqli_query($conn,$query); //execute query
								 // fetch array
								//echo $row["name"];
								//$row = mysqli_fetch_array($result); // fetch array
								//echo $row["name"];
								?>

								<?php
								while($row = mysqli_fetch_array($result)){ 
									?>
									<tr>
										<td style="vertical-align: right"><?php echo $row["name"];?></td>
										<td style="vertical-align: right"><?php echo $row["productID"];?></td>
										<td style="vertical-align: right"><?php echo $row["nameVendor"];?></td>
										<td style="vertical-align: right"><?php echo $row["location"];?></td>
										<td style="vertical-align: right"><?php echo $row["caseSize"];?></td>
										<td style="vertical-align: right"><?php echo $row["unitSizeNum"];?></td>
										<td style="vertical-align: right"><?php echo $row["amount"];?></td>

									</tr>
									<?php } ?>
					<!-- <tr>
						<td>Example</td>
						<td style="text-align: right">100</td>
						<td style="text-align: right">CocaCola</td>
						<td style="text-align: right">Concessions</td>
						<td style="text-align: right">6.00</td>
						<td style="text-align: right">4.00</td>
						<td style="text-align: right">6.00</td>
					</tr>
					<tr>
						<td>Example</td>
						<td style="text-align: right">100</td>
						<td style="text-align: right">Us Foods</td>
						<td style="text-align: right">Storage</td>
						<td style="text-align: right">6.00</td>
						<td style="text-align: right">4.00</td>
						<td style="text-align: right">6.00</td>
					</tr>
					<tr>
						<td>Example</td>
						<td style="text-align: right">100</td>
						<td style="text-align: right">Budweiser</td>
						<td style="text-align: right">Fridge</td>
						<td style="text-align: right">6.00</td>
						<td style="text-align: right">4.00</td>
						<td style="text-align: right">6.00</td>
					</tr>-->
				</tbody>
			</table>
			<div class="col-sm-12"><P><br /></div>
			<!-- Table to display all products -->
			<h4 style="margin-left: 10px">All Products</h4>
			<table class="table table-hover" style="margin: auto">
				<thead>
					<tr>
						<th style="text-align: center">Product Name</th>
						<th style="text-align: center">Product ID</th>
						<th style="text-align: center">Vender</th>
						<th style="text-align: center">Location</th>
						<th style="text-align: center">Case Size</th>
						<th style="text-align: center">Unit Per Case</th>
						<th style="text-align: center">Current Units</th>
					</tr>
				</thead>
				<tbody>
							<?php  // populate users info
							$query =  "SELECT products.name, products.productID, products.location, products.caseSize, products.unitSizeNum, products.amount, vendors.nameVendor FROM `products` LEFT JOIN vendors ON products.venderID = vendors.venderID";
								$result = mysqli_query($conn,$query); //execute query
								 // fetch array
								//echo $row["name"];
								//$row = mysqli_fetch_array($result); // fetch array
								//echo $row["name"];
								?>

								<?php
								while($row = mysqli_fetch_array($result)){ 
									?>
									<tr>
										<td style="vertical-align: right"><?php echo $row["name"];?></td>
										<td style="vertical-align: right"><?php echo $row["productID"];?></td>
										<td style="vertical-align: right"><?php echo $row["nameVendor"];?></td>
										<td style="vertical-align: right"><?php echo $row["location"];?></td>
										<td style="vertical-align: right"><?php echo $row["caseSize"];?></td>
										<td style="vertical-align: right"><?php echo $row["unitSizeNum"];?></td>
										<td style="vertical-align: right"><?php echo $row["amount"];?></td>

									</tr>
									<?php } ?>
								<!--<tr>
									<td>Example</td>
									<td style="text-align: right">100</td>
									<td style="text-align: right">CocaCola</td>
									<td style="text-align: right">Concessions</td>
									<td style="text-align: right">6.00</td>
									<td style="text-align: right">4.00</td>
									<td style="text-align: right">6.00</td>
								</tr>
								<tr>
									<td>Example</td>
									<td style="text-align: right">100</td>
									<td style="text-align: right">Us Foods</td>
									<td style="text-align: right">Storage</td>
									<td style="text-align: right">6.00</td>
									<td style="text-align: right">4.00</td>
									<td style="text-align: right">6.00</td>
								</tr>
								<tr>
									<td>Example</td>
									<td style="text-align: right">100</td>
									<td style="text-align: right">Budweiser</td>
									<td style="text-align: right">Fridge</td>
									<td style="text-align: right">6.00</td>
									<td style="text-align: right">4.00</td>
									<td style="text-align: right">6.00</td>
								</tr>
								<tr>
									<td>Example</td>
									<td style="text-align: right">100</td>
									<td style="text-align: right">Us Foods</td>
									<td style="text-align: right">Storage</td>
									<td style="text-align: right">6.00</td>
									<td style="text-align: right">4.00</td>
									<td style="text-align: right">6.00</td>
								</tr>
								<tr>
									<td>Example</td>
									<td style="text-align: right">100</td>
									<td style="text-align: right">Us Foods</td>
									<td style="text-align: right">Storage</td>
									<td style="text-align: right">6.00</td>
									<td style="text-align: right">4.00</td>
									<td style="text-align: right">6.00</td>
								</tr>-->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- Popup boxes -->
		<!-- add user popup -->
		<div id="addUserPop" class="modal fade" role="dialog">
			<div class="modal-dialog" style="width: 60%; margin-top: 10%">
				<!--pmc-->
				<div class="modal-content">
					<form action="create_new_user.php" method="post">
						Name: <input type="text" id="NUname" name="NUname"><br>
						E-mail: <input type="text" id="NUemail" name="NUemail"><br>
						Password: <input type="text" id="NUpassword" name="NUpassword"><br>

						<select id="NUprivilege" name="NUprivilege">
							<option value="Cashier">Cashier</option>
							<option value="Admin">Admin</option>
							<option value="Owner">Owner</option>
						</select> <br>
						<input type="submit" class="btn btn-info btn-lg" style="width: 40%">
						<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
					</form>
						<!--
						<form class="form-horizontal" id="form_members" role="form" action="create_new_user.php" method="POST">

							<div class="modal-body">
						<h4 style="text-align: center">Enter New User Information</h4>
						<br />
						<div class="form-group" >
							<label class="control-label" for="userName"> User Name </label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-group" >
							<label class="control-label" for="userEmail"> User Email </label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-group" >
							<label class="control-label" for="userPassword">Password </label>
							<input type="password" class="form-control" id="email" name="password" placeholder="Enter Password" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-group" >
							<label class="control-label" for="userPasswordCon">Confirm Password </label>
							<input type="password" class="form-control" id="password"  placeholder="Enter Password" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-group" >
							<label class="control-label" for="userPriv"> Privilege </label>
							<select class="form-control" name= "privilege" id="privilege" style="width: 200px; margin-left: 5%; margin-right: 25%">
								<option>Select One</option>
								<option value="Cashier">Cashier</option>
								<option value="Admin">Admin</option>
								<option value="Owner">Owner</option>
							</select>
						</div>
					</div>
					<div class="form-group" style="text-align: center">
						<button type="submit" class="btn btn-primary btn-lg" data-dismiss="modal" name="submit" id="submit" style="width: 40%">Add User</button>
						<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
					</div>
				</form> -->
			</div>
		</div>
	</div>
	<!-- update user popup -->
	<div id="updateUserPop" class="modal fade" role="dialog">
		<div class="modal-dialog" style="width: 60%; margin-top: 10%">
			<div class="modal-content">
				<div class="modal-body">
					<h4 style="text-align: center">Select and Enter New User Information</h4>
					<br />
					<select class="form-control" id="userUpdate" onchange="fillUserInfo()" style="width: 200px; margin: auto">
						<option>Select One</option>
						<option value="concessions">Devin Leon</option>
						<option value="storage">Example User</option>
						<option value="fridge">Example User</option>
					</select>
					<br />
					<div class="form-inline" style="text-align: right">
						<label class="control-label" for="userNameUpdate"> User Name </label>
						<input type="text" class="form-control" id="userNameUpdate" placeholder="Enter name" style="width: 200px; margin-left: 5%; margin-right: 25%">
					</div>
					<br />
					<div class="form-inline" style="text-align: right">
						<label class="control-label" for="userEmailUpdate"> User Email </label>
						<input type="email" class="form-control" id="userEmailUpdate" placeholder="Enter Email" style="width: 200px; margin-left: 5%; margin-right: 25%">
					</div>
					<br />
					<div class="form-inline" style="text-align: right">
						<label class="control-label" for="userPasswordUpdate">Password </label>
						<input type="password" class="form-control" id="userPasswordUpdate" placeholder="Enter Password" style="width: 200px; margin-left: 5%; margin-right: 25%">
					</div>
					<br />
					<div class="form-inline" style="text-align: right">
						<label class="control-label" for="userPasswordConUpdate">Confirm Password </label>
						<input type="password" class="form-control" id="userPasswordConUpdate" placeholder="Enter Password" style="width: 200px; margin-left: 5%; margin-right: 25%">
					</div>
					<br />
					<div class="form-inline" style="text-align: right">
						<label class="control-label" for="userPrivUpdate"> Privilege </label>
						<select class="form-control" id="userPrivUpdate" style="width: 200px; margin-left: 5%; margin-right: 25%">
							<option>Select One</option>
							<option value="Cashier">Cashier</option>
							<option value="Admin">Admin</option>
							<option value="Owner">Owner</option>
						</select>
					</div>
				</div>
				<div class="modal-footer" style="text-align: center">
					<button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" style="width: 40%">Update User</button>
					<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<!-- delete user popup -->
	<div id="deleteUserPop" class="modal fade" role="dialog">
		<div class="modal-dialog" style="width: 40%; margin-top: 15%">
			<div class="modal-content">
				<div class="modal-body">
					<h3 style="text-align: center">Are you sure you want to delete this User?</h3>
				</div>
				<div class="modal-footer" style="text-align: center">
					<button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" style="width: 40%">Confirm</button>
					<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<!-- add vendor popup -->
	<div id="addVendorPop" class="modal fade" role="dialog">
		<div class="modal-dialog" style="width: 60%; margin-top: 10%">
			<div class="modal-content">
				<form action="create_new_vendor.php" method="post">
					Vendor Name: <input type="text" id="NVname" name="NVname"><br>
					Vendor Address: <input type="text" id="NVaddress" name="NVaddress"><br>
					E-mail: <input type="text" id="NVemail" name="NVemail"><br>
					Phone Number: <input type="text" id="NVphone" name="NVphone"><br>
					Fax Number: <input type="text" id="NVfax" name="NVfax"><br>
					Sales Rep: <input type="text" id="NVrep" name="NVrep"><br>
					Customer ID: <input type="text" id="NVcid" name="NVcid"><br>

					<input type="submit" class="btn btn-info btn-lg" style="width: 40%">
					<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
				</form>
					<!--<div class="modal-body">
						<h4 style="text-align: center">Enter New Vendor Information</h4>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="vendorName"> Vendor Name </label>
							<input type="text" class="form-control" id="vendorName" placeholder="Enter name" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="vendorEmail"> Vendor Address </label>
							<input type="text" class="form-control" rows="2" id="vendorAddress" placeholder="Enter address" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="vendorEmail"> Vendor Email </label>
							<input type="email" class="form-control" id="vendorEmail" placeholder="Enter Email" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="vendorPhone">Phone Number </label>
							<input type="text" class="form-control" id="vendorPhone" placeholder="(800)123-4567" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="vendorFax">Fax Number</label>
							<input type="text" class="form-control" id="vendorFax" placeholder="Enter Fax Number" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="salesRep">Sales Rep </label>
							<input type="text" class="form-control" id="salesRep" placeholder="(800)123-4567" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="customerID">Customer ID</label>
							<input type="text" class="form-control" id="customerID" placeholder="Enter Customer ID" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
					</div>
					<div class="modal-footer" style="text-align: center">
						<button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" style="width: 40%">Add Vendor</button>
						<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
					</div>-->
				</div>
			</div>
		</div>
		<!-- update vendor popup -->
		<div id="updateVendorPop" class="modal fade" role="dialog">
			<div class="modal-dialog" style="width: 60%; margin-top: 10%">
				<div class="modal-content">
					<div class="modal-body">
						<h4 style="text-align: center">Select and Enter New Vendor Information</h4>
						<br />
						<select class="form-control" id="vendorUpdate" onchange="fillVendorInfo()" style="width: 200px; margin: auto">
							<option>Select One</option>
							<option value="user1">US Foods</option>
							<option value="user2">CocaCola</option>
							<option value="user3">Budweiser</option>
						</select>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="vendorNameUpdate"> Vendor Name </label>
							<input type="text" class="form-control" id="vendorNameUpdate" placeholder="Enter name" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="vendorAddressUpdate"> Vendor Address </label>
							<input type="text" class="form-control" rows="2" id="vendorAddressUpdate" placeholder="Enter address" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="vendorEmailUpdate"> Vendor Email </label>
							<input type="email" class="form-control" id="vendorEmailUpdate" placeholder="Enter Email" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="vendorPhoneUpdate">Phone Number </label>
							<input type="text" class="form-control" id="vendorPhoneUpdate" placeholder="(800)123-4567" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="vendorFaxUpdate">Fax Number</label>
							<input type="text" class="form-control" id="vendorFaxUpdate" placeholder="Enter Fax Number" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="vendorSalesRepUpdate">Sales Rep </label>
							<input type="text" class="form-control" id="vendorSalesRepUpdate" placeholder="(800)123-4567" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
						<br />
						<div class="form-inline" style="text-align: right">
							<label class="control-label" for="vendorCustomerIDUpdate">Customer ID</label>
							<input type="text" class="form-control" id="vendorCustomerIDUpdate" placeholder="Enter Customer ID" style="width: 200px; margin-left: 5%; margin-right: 25%">
						</div>
					</div>
					<div class="modal-footer" style="text-align: center">
						<button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" style="width: 40%">Update User</button>
						<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- delete vendor popup -->
		<div id="deleteVendorPop" class="modal fade" role="dialog">
			<div class="modal-dialog" style="width: 40%; margin-top: 15%">
				<div class="modal-content">
					<div class="modal-body">
						<h3 style="text-align: center">Are you sure you want to delete this Vendor?</h3>
					</div>
					<div class="modal-footer" style="text-align: center">
						<button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" style="width: 40%">Confirm</button>
						<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- select menu item popup -->
		<div id="selectMenuItemPop" class="modal fade" role="dialog">
			<div class="modal-dialog" style="width: 40%; margin-top: 15%">
				<div class="modal-content">
					<div class="modal-body">
						<h4 style="text-align: center">Select the Menu Item you want to view</h4>
						<br />
						<select class="form-control" id="viewMenuItem" style="width: 200px; margin: auto">
							<option>Select One</option>


									<?php  // populate users info
									$query =  "SELECT * FROM `menu_items`";
								$result = mysqli_query($conn,$query); //execute query
								 // fetch array
								//echo $row["name"];
								//$row = mysqli_fetch_array($result); // fetch array
								//echo $row["name"];
								?>

								<?php
								while($row = mysqli_fetch_array($result)){ 
								  	//pmc
									?>


									<option value="<?php echo $row["menuItemID"];?>"><?php echo $row["MenuItemName"];?></option>

									
									<?php } ?>
									<!--<option value="Cheeseburger">Cheeseburger</option>
									<option value="Hamburger">Hamburger</option>
									<option value="BottleCoke">Bottle Coke</option>-->
								</select>
							</div>
							<div class="modal-footer" style="text-align: center">
								<button type="button" class="btn btn-primary btn-lg" onclick="fillMenuItemInfo()" data-dismiss="modal" style="width: 40%">Select</button>
								<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
							</div>
						</div>
					</div>
				</div>
				<!-- update menu item popup -->
				<div id="updateMenuItemPop" class="modal fade" role="dialog">
					<div class="modal-dialog" style="width: 40%; margin-top: 15%">
						<div class="modal-content">
							<div class="modal-body">
								<h3 style="text-align: center">Are you sure you want to update this Menu Item?</h3>
							</div>
							<div class="modal-footer" style="text-align: center">
								<button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" style="width: 40%">Confirm</button>
								<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
							</div>
						</div>
					</div>
				</div>
				<!-- add menu item popup -->
				<div id="addMenuItemPop" class="modal fade" role="dialog">
					<div class="modal-dialog" style="width: 40%; margin-top: 15%">
						<div class="modal-content">
							<div class="modal-body">
								<h3 style="text-align: center">Are you sure you want to create this Menu Item?</h3>
							</div>
							<div class="modal-footer" style="text-align: center">
								<button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" style="width: 40%">Confirm</button>
								<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
							</div>
						</div>
					</div>
				</div>
				<!-- select product popup -->
				<div id="selectProductPop" class="modal fade" role="dialog">
					<div class="modal-dialog" style="width: 40%; margin-top: 15%">
						<div class="modal-content">
							<div class="modal-body">
								<h4 style="text-align: center">Select the Product you want to view</h4>
								<br />
								<select class="form-control" id="viewProduct" style="width: 200px; margin: auto">
								<?php  // populate users info
								$query =  "SELECT * FROM `products`";
								$result = mysqli_query($conn,$query); //execute query
								 // fetch array
								//echo $row["name"];
								//$row = mysqli_fetch_array($result); // fetch array
								//echo $row["name"];
								?>

								<?php
								while($row = mysqli_fetch_array($result)){ 
								  	//pmc
									?>


									<option value="<?php echo $row["productID"];?>"><?php echo $row["name"];?></option>

									
									<?php } ?>
									<!--<option value="select">Select One</option>
									<option value="Cheese">Cheese</option>
									<option value="HamburgerBun">Hamburger Bun</option>
									<option value="HotDogBun">Hotdog Bun</option>-->
								</select>
							</div>
							<div class="modal-footer" style="text-align: center">
								<button type="button" class="btn btn-primary btn-lg" onclick="fillProductInfo()" data-dismiss="modal" style="width: 40%">Select</button>
								<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
							</div>
						</div>
					</div>
				</div>
				<!-- update Product popup -->
				<div id="updateProductPop" class="modal fade" role="dialog">
					<div class="modal-dialog" style="width: 40%; margin-top: 15%">
						<div class="modal-content">
							<div class="modal-body">
								<h3 style="text-align: center">Are you sure you want to update this Product?</h3>
							</div>
							<div class="modal-footer" style="text-align: center">
								<button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" style="width: 40%">Confirm</button>
								<button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="width: 40%">Cancel</button>
							</div>
						</div>
					</div>
				</div>
				<!-- add Product popup -->
				<div id="addProductPop" class="modal fade" role="dialog">
					<div class="modal-dialog" style="width: 40%; margin-top: 15%">
						<div class="modal-content">
							<div class="modal-body">
								<h3 style="text-align: center">Are you sure you want to create this Product?</h3>
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