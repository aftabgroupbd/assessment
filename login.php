    <?php
    session_start();

    if(isset($_SESSION['email'])) {
        header('Location: myaccount.php');
    }
    ?>
    <?php include "includes/header.php";?>
    </head>
    <body>
    <?php include "includes/menu.php";?>
    <?php

    require_once "vendor/autoload.php";
    use App\classes\Customer;

    if (isset($_POST['btn']))
    {
        $customer = new Customer();
        $customer->customerLogin();
    }
    ?>
<div class="container">
    <div class="row">
        <div style="margin-top: 50px;"></div>
        <div class="col-lg-6">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <h2>  Customer Login</h2>

                </div>
                <div class="panel-body">


                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-3 control-label text-warning">Email</label>
                            <div class="col-md-9">
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label text-warning">Password</label>
                            <div class="col-md-9">
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" name="btn" class="btn btn-info pull-right" >LogIn</button>
                            </div>
                        </div>
                    </form>



                </div>
                <div class="panel-footer text-center text-info">
                    <h4>Customer Info</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"?>
</body>
</html>