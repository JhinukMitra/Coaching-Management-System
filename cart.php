<?php
	include('include/connect.php');
	include('functions/common_function.php');

?>
<?php
if (isset($_GET['payment']) && $_GET['payment'] == 'success') {
    echo "<script>alert('Your payment is successful');</script>";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equive="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Enroll Courses details</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="style.css">
	<style>
		.cart_img
{
	width:80px;
	height: 80px;
	object-fit: contain;
}

	</style>
</head>
<body>
	<!--nav-->
	<div class="container-fluid p-0">
		<!--child-->
		<nav class="navbar navbar-expand-lg navbar-light bg-info">
    		<div class="container-fluid">
    			<img src="./image/images.png" alt="" class="logo">
    			
    			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      				<span class="navbar-toggler-icon"></span>
    			</button>
   				<div class="collapse navbar-collapse" id="navbarSupportedContent">
        			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        				<li class="nav-item">
          					<a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
        				</li>
            			<li class="nav-item">
            				<a class="nav-link" href="display_all.php">Courses</a>
        				</li>
        				<li class="nav-item">
            				<a class="nav-link" href="./user_area/user_registration.php">Register</a>
        				</li>
        				<li class="nav-item">
            				<a class="nav-link" href="#">Contact</a>
        				</li>
        				<li class="nav-item">
            				<a href="cart.php" class="nav-link"><i class="fas fa-cart-plus"></i><sup><?php cart_item(); ?></sup></a>

        				</li>
            			

        			</ul>	
        			<form class="d-flex" action="search_product.php" method="GET">
        				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        				<input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      				</form>
    			</div>
  			</div>
		</nav>
		<!--calling card function-->
		<?php
			cart();
		?>
		<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
			<ul class="navbar-nav me-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">Welcome Guest</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./user_area/user_login.php">login</a>
				</li>
			</ul>
		</nav>

		<!--third child-->
		<div class="bg-light">
			<h3 class="text-center">Mentor's Nest</h3>
			<p class="text-center">"Your Talent, Our Effort"</p>
		</div>

		<!--fourth child table-->
		<div class="container">
			<div class="row">
				<form action="" method="post">
				<table class="table table-bordered text-center">
					<thead>
						<tr>
							<th>Course Title</th>
							<th>Course Image</th>
							<th>Quantity</th>
							<th>Total Price</th>
							<th>Remove</th>
							<th colspan="2">Operations</th>
						</tr>
					</thead>
					<tbody>
						<!--php code to display dynamic data-->
					<?php
						
						$get_ip_add = getIPAddress();
						$total_price=0;
						$card_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
						$result=mysqli_query($con,$card_query);
						while($row=mysqli_fetch_array($result)){
							$product_id=$row['product_id'];
							$select_products="select * from `products` where product_id='$product_id'";
							$result_products=mysqli_query($con,$select_products);
							while($row_product_price=mysqli_fetch_array($result_products)){
								$product_price=array($row_product_price['product_price']);
								$price_table=$row_product_price['product_price'];
								$product_title=$row_product_price['product_title'];
								$product_image1=$row_product_price['product_image1'];
								
								$product_values=array_sum($product_price);
								$total_price+=$product_values;
							
					?>
						<tr>
							<td><?php echo $product_title ?></td>
							<td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
							<td><input type="text" name="qty" class="form-input w-50"></td>
							<?php
								$get_ip_add = getIPAddress();
								if(isset($_POST['update_cart'])){
									$quantities=$_POST['qty'];
									$update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
									$result_products_quantity=mysqli_query($con,$update_cart);
									$total_price=$total_price*$quantities;

								}
								
							?>
							<td><?php echo $price_table ?>/-</td>
							<td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
							<td>
								<!--<button class="bg-info px-3 py-2 mx-3 border-0">Update</button>-->
								<input type="submit" value="Update Courses" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
								<!--<button class="bg-info px-3 py-2 border-0">Remove</button>-->
								<input type="submit" value="Remove Courses" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
							</td>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
					
				</table>
				<!--subtotal-->
				<div class="d-flex mb-5">
					<h4 class="px-3">Subtotal:<strong class="text-info"><?php echo $total_price ?>/-</strong></h4>
					<button><a href="homepage.php" class="nav-link text-light bg-info my-1"> Continue Enrollment </a></button>

					<button class="bg-secondary px-3 py-2 border-0 text-light"><a href="./user_area/user_login.php" class="text-light">Checkout</button>
				</div>

			</div>
		</div>
		</form>
		<!--remove item function -->
		<?php

			function remove_cart_item(){
				global $con;
				if(isset($_POST['remove_cart'])){
					foreach($_POST['removeitem'] as $remove_id){
					echo $remove_id;
					$delete_query="delete from `cart_details` where product_id=$remove_id";
					$run_delete=mysqli_query($con,$delete_query);
					if($run_delete){
						echo "<script>window.open('cart.php','_self')</script>";
						}	
					}
				}
			}
	
			remove_cart_item();
		?>
		<!--last child-->
		<!--include footer-->
		<?php include("./include/footer.php") ?>					
	</div>
	</div>
	




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>	
</body>
</html>