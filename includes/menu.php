    <?php
    require_once "vendor/autoload.php";
    use App\classes\Customer;

    if (isset($_GET['logout'])) {
        $customer = new Customer();
        $customer->logout();
    }
    ?>
<div class="header">
    <ul>
        <li><a href="index.php"><img src="./images/logo/clobber copy.png" height="35px" width="80px"></a></li>
        <li><a href="myaccount.php">Myacount</a></li>
        <?php
        if(isset($_SESSION['email'])) {
            echo "<li><a href=\"?logout=true\">Logout</a></li>";
        }else
        {
           echo "<li><a href=\"login.php\">Login</a></li>";
        }

        ?>

        <li><a href="registration.php">Registration</a></li>
        <li><a href="#">Add to cart</a></li>

    </ul>
</div>