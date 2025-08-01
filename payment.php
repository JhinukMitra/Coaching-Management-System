<?php 
include('include/connect.php');
include('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Payment page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<style>
	.payment_img {
		width: 90%;
		margin: auto;
		display: block;
	}
</style>
<body>

<?php
	$user_ip = getIPAddress();
	$get_user = "SELECT * FROM user_table WHERE user_ip = '$user_ip'";
	$result = mysqli_query($con, $get_user);

	if ($result && mysqli_num_rows($result) > 0) {
		$run_query = mysqli_fetch_array($result);
		$user_id = $run_query['user_id'];
	} else {
		echo "<script>alert('User not found');</script>";
		$user_id = 0; // fallback
	}
?>

<div class="container">
	<h2 class="text-center text-info">Payment Options</h2>
	<div class="row d-flex justify-content-center align-items-center my-5">
		<div class="col-md-6">
			<a href="https://www.bkash.com" target="_blank"><img src="./image/bkash.jpg" alt="" class="payment_img"></a>
		</div>

		<div class="col-md-6">
			<a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay offline</h2></a>
		</div>
	</div>
</div>

</body>
</html>
