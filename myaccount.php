    <?php
    session_start();
    if ( $_SESSION['email'] == null) {

        header('Location: login.php');
    }
    ?>
    <?php include "includes/header.php";?>
    </head>
    <body>
    <?php include "includes/menu.php";?>
    <?php
    require_once "./vendor/autoload.php";
    use App\classes\Customer;

     $customer = new Customer();
     $customerInfo =  $customer = $customer->customerAccount();
     if (isset($_GET['deleteCustomer']))
     {
         $customer = new Customer();
         $customerInfo =  $customer = $customer->deleteAcount();
     }
    ?>
<div class="container">
    <div class="row ">

        <div class="col-md-12">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="text-center text-capitalize">Customer Info</h2>
                    <h2 class="text-center text-capitalize text-right"><a href="?deleteCustomer=true">Delete Customer</a></h2>

                </div>
                <h3 class="text-white text-center"></h3>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr >

                            <th>Customer Name</th>
                            <th><?php echo $customerInfo['name']?></th>
                        </tr>
                        <tr >

                            <th>Customer Email</th>
                            <th><?php echo $customerInfo['email']?></th>
                        </tr>
                        </thead>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <div class="panel-footer text-center text-info">
                    <h4>Customer Info</h4>
                </div>
                <!-- /.panel-body -->
            </div>

        </div>
    </div>
</div>

<?php include "includes/footer.php"?>
</body>
</html>