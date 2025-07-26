<?php
include(__DIR__ . '/../include/connect.php'); // Database connection
session_start();

if (isset($_POST['user_login'])) {
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];

    // Fetch user from the database
    $query = "SELECT * FROM user_table WHERE username='$username'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Check password
        if ($password === $row['user_password']) {
            $_SESSION['user_username'] = $username;
            echo "<script>
                        alert('Successfully completed login');
                        window.location.href = '../payment.php';
                    </script>";
        } else {
            echo "<script>alert('Incorrect password');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

    <div class="container-fluid my-3">
        <h2 class="text-center">Student Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" 
                            placeholder="Enter your username" autocomplete="off" required name="user_username">
                    </div>

                    <!-- Password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" 
                            placeholder="Enter your password" autocomplete="off" required name="user_password">
                    </div>

                    <!-- Submit button -->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-2">Don't have an account? 
                            <a href="user_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
