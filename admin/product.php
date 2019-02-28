<?php include "includes/header.php";?>
</head>
<body>
<?php include "includes/menu.php"?>
<?php
    require_once "../vendor/autoload.php";
    use App\classes\Product;
    $product  = new Product();
    $products = $product->manageProduct();

    if (isset($_GET['status']))
    {
        $product->deleteProduct($_GET['id']);
    }
?>

<div class="container">
    <div class="row">
        <div style="margin-top: 50px;"></div>
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="text-center text-capitalize">Manage product</h2>
                    <h5><a href="add_product.php" >Add product</a></h5>
                </div>
                <h3 class="text-white text-center"></h3>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr >
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product price</th>
                            <th>Product Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;

                            while($product = mysqli_fetch_array($products)){
                                $i++
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i;?></td>
                            <td><?php echo $product['product_name'];?></td>
                            <td><?php echo $product['product_price'];?></td>
                            <td><img src="<?php echo $product['product_image'];?>" width="100px" height="100px"></td>

                            <td class="text-center">

                                <a class="btn btn-info btn-xs" href="edit_product.php?id=<?php echo $product['id'];?>">
                                <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="?status=delete&id=<?php echo $product['id'];?>" class="btn btn-danger btn-xs"
                                onclick="return confirm('are you sure ?')">
                                <span class="glyphicon glyphicon-trash"></span>
                                </a>

                            </td>
                        </tr>
                        <?php }?>


                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <div class="panel-footer text-center text-info">
                    <h4>Brand Info</h4>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>










<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

<script>
    initSample();
</script>
</body>
</html>