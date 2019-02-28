<?php include "includes/header.php";?>
</head>
<body>
<?php include "includes/menu.php";?>
<?php
    require_once "./vendor/autoload.php";
    use App\classes\Product;

    $product = new Product();
    $products = $product->index();
?>
<!--    here is product section-->
        <div class="product_section">
            <h2>Featured Products</h2>
            <?php while($product = mysqli_fetch_array($products)) { ?>
            <div class="single_product text-center">
                <img src="admin/<?php echo $product['product_image'];?>" alt="product Image">
                <h4><?php echo $product['product_name'];?></h4>
                <h4>Product Price:$<?php echo $product['product_price'];?></h4>
                <h4><button>Add to cart</button></h4>
            </div>
            <?php }?>

        </div>
<?php include "includes/footer.php"?>
</body>
</html>