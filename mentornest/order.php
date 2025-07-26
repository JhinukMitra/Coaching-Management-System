<?php
    include('include/connect.php');
    include('functions/common_function.php');

?>
<?php
if (isset($_GET['payment']) && $_GET['payment'] === 'success') {
    echo "<div class='alert alert-success text-center'>Payment successful. Your cart is now empty.</div>";
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
   
                        >
        
        

        <!--third child-->
        <div class="bg-light">
            <h2 class="text-center">Your Enrollment List</h2>
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
                            <th>Conferm</th>
                            <th>Operations</th>
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
                    
                                <!--<button class="bg-info px-3 py-2 border-0">Remove</button>-->
                                <input type="submit" value="Press to Confirm" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
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
                    

                    <a href="cart.php?payment=success" class="btn bg-secondary px-3 py-2 text-light border-0">Okay</a>

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