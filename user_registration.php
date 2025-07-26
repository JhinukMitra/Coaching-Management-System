<?php 
include('../include/connect.php'); // DB connection
session_start();

if(isset($_POST['user_registration'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = $_POST['user_ip'];

    // Check if username exists
    $select_query = "SELECT * FROM user_table WHERE username = '$user_username'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if($rows_count > 0){
        echo "<script>alert('Username already exists');</script>";
    } else {
        // Check if passwords match
        if($user_password !== $conf_user_password){
            echo "<script>alert('Passwords do not match');</script>";
        } else {
            // Move uploaded image
            move_uploaded_file($user_image_tmp, "./user_image/$user_image");

            // Insert into user_table
            $insert_query = "INSERT INTO user_table (username, user_gmail, user_password, user_image, user_address, user_mobile) 
                             VALUES ('$user_username','$user_email','$user_password','$user_image','$user_address','$user_contact')";
            $sql_execute = mysqli_query($con, $insert_query);

            if($sql_execute){
                // Check cart items after successful registration
                $select_cart_items = "SELECT * FROM cart_details WHERE ip_address = '$user_ip'";
                $result_cart = mysqli_query($con, $select_cart_items);
                $rows_count = mysqli_num_rows($result_cart);

                if($rows_count > 0){
                    $_SESSION['username'] = $user_username;
                    echo "<script>alert('You have items in your cart');</script>";
                    echo "<script>window.open('checkout.php', '_self');</script>";
                } else {
                    echo "<script>
                        alert('Successfully completed the registration');
                        window.location.href = '../homepage.php';
                    </script>";
                }
            } else {
                die(mysqli_error($con));
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid my-3">
    <h2 class="text-center">New Student Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Username -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" required name="user_username">
                </div>

                <!-- Email -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter your email" required name="user_email">
                </div>

                <!-- Image -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" id="user_image" class="form-control" required name="user_image">
                </div>

                <!-- Password -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" required name="user_password">
                </div>

                <!-- Confirm Password -->
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" required name="conf_user_password">
                </div>

                <!-- Address -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter your address" required name="user_address">
                </div>

                <!-- IP Address -->
                <div class="form-outline mb-4">
                    <label for="user_ip" class="form-label">IP Address</label>
                    <input type="text" id="user_ip" class="form-control" placeholder="Enter your IP address" required name="user_ip">
                </div>

                <!-- Contact -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact number" required name="user_contact">
                </div>

                <!-- Submit -->
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_registration">
                    <p class="small fw-bold mt-2 pt-2">Already have an account? <a href="user_login.php" class="text-danger">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
