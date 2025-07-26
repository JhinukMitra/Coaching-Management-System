<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert Courses-Admin Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="../style.css">
	<!--font awsome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
	<div class="container mt-3">
		<h1 class="text-center">Insert Courses </h1>
		<!--form -->
		<form action="" method="post" enctype="multipart/form-data">
			<!--title -->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_title" class="form-label">Course title</label>
				<input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
			</div>
			<!--description -->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="description" class="form-label">Course description</label>
				<input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
			</div>
			<!--product keyword -->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product keyword" class="form-label">Course Keyword</label>
				<input type="text" name="product keyword" id="product keyword" class="form-control" placeholder="Enter product keyword" autocomplete="off" required="required">
			</div>
			<!--categories -->
			<div class="form-outline mb-4 w-50 m-auto">
				<select name="product_categories" id="" class="form-select">
					<option value="">Select a Category</option><option value="">SSC</option>
					<option value="">HSC</option>
					<option value="">EEE</option>
					<option value="">CSE</option>
					<option value="">ME</option>
					<option value="">CE</option><option value="">Spice</option>
				</select>
			</div>
			<!--product image 1-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product image1" class="form-label">Course image1</label>
				<input type="file" name="product image1" id="product image1" class="form-control" required="required">
			</div>
			<!--product image 2-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product image1" class="form-label">Course image2</label>
				<input type="file" name="product image2" id="product image2" class="form-control" required="required">
			</div>
			<!--product image 3-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product image3" class="form-label">Course image3</label>
				<input type="file" name="product image3" id="product image3" class="form-control" required="required">
			</div>
			<!--price -->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product price" class="form-label">Course Price</label>
				<input type="text" name="product price" id="product price" class="form-control" placeholder="Enter product Price" autocomplete="off" required="required">
			</div>
			<!--price -->
			<div class="form-outline mb-4 w-50 m-auto">
				<input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
			</div>
		</form>
	</div>
</body>
</html>