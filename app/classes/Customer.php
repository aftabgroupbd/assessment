<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2/28/2019
 * Time: 1:16 AM
 */

namespace App\classes;


class Customer
{
    private $link;
    public function __construct()
    {
        $this->link= mysqli_connect("localhost","root","","hw");
    }
    public function newCustomer(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $query = "INSERT INTO customer(name,email,password) VALUES('$name','$email',$pass)";
        if ($customer = mysqli_query($this->link,$query))
        {
            echo "Successfully Registred.";
        }else
        {
            die('query problem'.mysqli_error($this->link));
        }
    }
    public function customerLogin()
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $query = "SELECT * FROM `customer` WHERE email = '$email'";
        if ($customer = mysqli_query($this->link, $query)) {
            $customer_email = mysqli_fetch_assoc($customer);
            if ($customer_email) {
                $query = "SELECT * FROM `customer` WHERE password = '$pass'";
                if ($customer = mysqli_query($this->link, $query)) {
                    $customer_pass = mysqli_fetch_assoc($customer);
                    if ($customer_pass) {
                        session_start();
                        $_SESSION['email'] = $customer_email['email'];
                        header("Location:myaccount.php");

                    } else {
                        echo " Please use valid Password!";
                    }
                } else {
                    die('query problem' . mysqli_error($this->link));
                }
            } else {
                echo "Please use valid email!";
            }

        } else {
            die('query problem' . mysqli_error($this->link));
        }
    }
    public function customerAccount()
    {

        $customer_email = $_SESSION['email'];

        $query = "SELECT * FROM customer WHERE email = '$customer_email'";
        if ($customer = mysqli_query($this->link,$query))
        {
            $customerInfo = mysqli_fetch_assoc($customer);
            return $customerInfo;
        }else
        {
            die('query problem' . mysqli_error($this->link));
        }
    }
    public function logout()
    {
        session_start();

        unset($_SESSION['email']);
        header('Location: login.php');
    }
    public function deleteAcount()
    {
        $customer_email = $_SESSION['email'];
        $query = "DELETE  FROM customer WHERE email = '$customer_email'";
        if (mysqli_query($this->link,$query))
        {
            unset($_SESSION['email']);
            header('Location: registration.php');
        }else
        {
            die('query problem' . mysqli_error($this->link));
        }


    }
}