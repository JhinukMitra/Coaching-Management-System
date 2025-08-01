<?php
	include('include/connect.php');
	include('functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equive="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Coaching Management System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="style.css">
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
            				<a class="nav-link" href="#"><i class="fa-solid fa-cart-plus"></i><sup><?php cart_item(); ?></sup></a>
        				</li>
            			<li class="nav-item">
            				<a class="nav-link" href="#">Total Price : <?php total_cart_price(); ?> /-</a>
        				</li>	

        			</ul>	
        			<form class="d-flex" action="" method="get">
        				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        				<input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      				</form>
    			</div>
  			</div>
		</nav>
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
			<h3 class="text-center">Manage Detail</h3>
			<p class="text-center">"Your Talent, Our Effort"</p>
		</div>

		<!--fourth child-->
		<div class="row px-3">
			<div class="col-md-10">
				<!--products-->
				<div class="row">
				<!--fetching product-->
				<?php
					//calling function
					search_product();
					get_unique_categories();

				?>
					
					
				<!--row end-->
				</div>
			<!--col end-->
			</div>


			<div class="col-md-2 bg-secondary p-0">
				<!--caragories-->
				<ul class="navbar-nav me-auto text-center">
					<li class="nav-item bg-info">
						<a href="#" class="nav-link text-light"><h4>categories</h4></a>
					</li>
					<?php
					 	getcategories();	
					?>

					
				</ul>
				
			</div>
		</div>

		<!--last child-->
		<!--include footer-->
		<?php include("./include/footer.php") ?>					
	</div>
	</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>	
</body>
</html>