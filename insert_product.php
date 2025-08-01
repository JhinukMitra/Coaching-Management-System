<?php
include('../include/connect.php');
if(isset($_POST['insert_product'])){
	$product_tile=$_POST['product_title'];
	$description=$_POST['description'];
	$product_keywords=$_POST['product_keyword'];
	$product_category=$_POST['product_category'];
	$product_price=$_POST['product_price'];
    $product_status='true';

	//accessing images
	$product_image1=$_FILES['product_image1']['name'];
	$product_image2=$_FILES['product_image2']['name'];
	$product_image3=$_FILES['product_image3']['name'];
	//accessing image tmp name
	$temp_image1=$_FILES['product_image1']['tmp_name'];
	$temp_image2=$_FILES['product_image2']['tmp_name'];
	$temp_image3=$_FILES['product_image3']['tmp_name'];

	//checking
	// ...

if ($product_tile == '' or $description == '' or $product_keywords == '' or $product_category == '' or $product_price == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == '') {
    echo "<script>alert('Please fill all the available fields')</script>";
    exit();
} else {
    $upload_path = "./product_images/";
    move_uploaded_file($temp_image1, $upload_path . $product_image1);
    move_uploaded_file($temp_image2, $upload_path . $product_image2);
    move_uploaded_file($temp_image3, $upload_path . $product_image3);
    //insert query
    $insert_products = "insert into `products` (product_title,product_description,product_keywords,category_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_tile','$description','$product_keywords','$product_category','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
    $result_query = mysqli_query($con, $insert_products);
    if ($result_query) {
        echo "<script>alert('Successfully inserted the courses')</script>";
    }
}

// ...

	
}
?>
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
				<input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Course Title" autocomplete="off" required="required">
			</div>
			<!--description -->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="description" class="form-label">Course description</label>
				<input type="text" name="description" id="description" class="form-control" placeholder="Enter Course description" autocomplete="off" required="required">
			</div>
			<!--product keyword -->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_keyword" class="form-label">Course Keyword</label>
				<input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Course keyword" autocomplete="off" required="required">
			</div>
			<!--categories -->
			<div class="form-outline mb-4 w-50 m-auto">
				<select name="product_category" id="" class="form-select">
					<option value="">Select a Category</option>
					<?php
					$select_query="select * from categories";
					$result_query=mysqli_query($con,$select_query);
					while($row=mysqli_fetch_assoc($result_query)){
						$category_title=$row['category_title'];
						$category_id=$row['category_id'];
						echo "<option value='$category_id'>$category_title</option>";
					}
					?>
				</select>
			</div>
			<!--product image 1-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_image1" class="form-label">Course image1</label>
				<input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
			</div>
			<!--product image 2-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_image2" class="form-label">Course image2</label>
				<input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
			</div>
			<!--product image 3-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_image3" class="form-label">Course image3</label>
				<input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
			</div>
			<!--price -->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product price" class="form-label">Course Price</label>
				<input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Course Price" autocomplete="off" required="required">
			</div>
			<!--price -->
			<div class="form-outline mb-4 w-50 m-auto">
				<input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Courses">
			</div>
		</form>
	</div>
</body>
</html>