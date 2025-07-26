<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equive="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="../style.css">
	<!--font awsome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		.adminimage
		{
			width:100px;
			object-fit: contain;
			float:left;
		}
		.adlogo
		{
			width:5%;
			height:5%;
			float:left;
		}
		.footer
		{
			position:absolute;
			bottom:0;
		}

	</style>
</head>
<body>
	<!--nav-->
	<div class="container-fluid p-0">
		<!--first child-->
		<nav class="navber navbar-expand-lg navbar-light bg-info">
			<div class="container-fluid">
				<img src="adminlogo.webp" alt="" class="adlogo">
				<nav class="navbar navbar-expand-lg">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a herf="" class="nav-link">Welcome guest</a>
						</li>
					</ul>
				</nav>
			</div>
		</nav>
		<div class="bg-light">
			<h3 class="text-center p-2">Manage Detail</h3>

		</div>
		<!--third child-->
		<div class="row">
			<div class="col-md-12 bg-secondary p-1 d-flax align-items-center">
				<div class="p-3">
					<a href="#"><img src="adminlogo.webp" alt=""class="adminimage"> </a>
					<p class="text-light text-center">Admin Name</p>
				</div>
				<div class="button text-center">
					<button><a href="insert_product.php" class="nav-link text-light bg-info my-1"> Insert Course </a></button>
					<button><a href="" class="nav-link text-light bg-info my-1"> View Course</a></button>
					<button><a href="" class="nav-link text-light bg-info my-1"> View Categories </a></button>
					<button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1"> Insert Categories </a></button>
					<button><a href="" class="nav-link text-light bg-info my-1"> All Enroll Course </a></button>
					<button><a href="" class="nav-link text-light bg-info my-1"> All payments </a></button>
					<button><a href="" class="nav-link text-light bg-info my-1"> Students List </a></button>
					<button><a href="" class="nav-link text-light bg-info my-1"> Log Out </a></button>
					
				</div>

						
			</div>
			
		</div>

		<!-- fourth child-->
		<div class="container my-3">
			<?php 
			if(isset($_GET['insert_category'])){
				include('insert_categories.php');
			}
			?>
		</div>

	</div>
	
		
				

	
<div class="bg-info p-3 text-center">
	<p>Works by ID - 204035, 204036, 204050</p>
			
</div>
</body>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>	
</body>
</html>