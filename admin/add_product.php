<?php include "includes/header.php";?>
</head>
<body>
<?php include "includes/menu.php"?>
<?php
    require_once "../vendor/autoload.php";
    use App\classes\Product;


    if (isset($_POST['btn']))
    {
        $product = new Product();
        $add_product = $product->addProduct();
    }
?>
<div class="container">
<div class="row">
    <div style="margin-top: 50px;"></div>
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <h2> Add Product</h2>

            </div>
            <div class="panel-body">


                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-md-3 control-label text-warning">Product Name</label>
                        <div class="col-md-9">
                            <input type="text" name="product_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label text-warning">Product Price</label>
                        <div class="col-md-9">
                            <input type="text" name="product_price" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 text-warning">Product   Image</label>
                        <div class="col-md-9">
                            <input type="file" name="product_image" accept="image/*" />
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" name="btn" class="btn btn-info pull-right" >Save product</button>
                        </div>
                    </div>
                </form>



            </div>
            <div class="panel-footer text-center text-info">
                <h4>Product Info</h4>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>