<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2/27/2019
 * Time: 10:06 PM
 */

namespace App\classes;


class Product
{
    private $link;
    public function __construct()
    {
        $this->link= mysqli_connect("localhost","root","","hw");
    }
    public function index()
    {
        $query = "SELECT * FROM products";
        if ($products = mysqli_query($this->link,$query))
        {
            return $products;
        }
    }

    public function addProduct()
    {
        $product_name   = $_POST["product_name"];
        $product_price  = $_POST["product_price"];

        $file_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ","_",$_FILES['product_image']['name']);
        $destination = "product_images/".$file_name;
        $file_name_tmp = $_FILES['product_image']['tmp_name'];

        move_uploaded_file($file_name_tmp,$destination);
        $query = "insert into products(product_name,product_price,product_image) values('$product_name','$product_price','$destination')";
        $run = mysqli_query($this->link,$query);
        if ($run == true){
            echo "Product has been inserted.";
        }else{
//            echo "something is going wrong";
            die('query problem'.mysqli_error($this->link));
        }
    }
    public function manageProduct()
    {
        $query = "select * from products";
        if ($products = mysqli_query($this->link,$query)){
            return $products;
        }else
        {

        }
    }
    public function editProduct($id)
    {
        $query = "SELECT * FROM products WHERE id = '$id' ";
        if ($product = mysqli_query($this->link,$query))
        {
            return $product;
        }else{

        }

    }
    public function updateProduct($id)
    {
        $query = "SELECT * FROM products WHERE id = '$id' ";
        $product = mysqli_query($this->link,$query);
        $productImage = mysqli_fetch_assoc($product);

        if ($_FILES['product_image']['name'])
        {
            unlink($productImage['product_image']);
            $product_name   = $_POST["product_name"];
            $product_price  = $_POST["product_price"];
            $file_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ","_",$_FILES['product_image']['name']);
            $destination = "product_images/".$file_name;
            $file_name_tmp = $_FILES['product_image']['tmp_name'];

            move_uploaded_file($file_name_tmp,$destination);
            $query = "UPDATE products SET product_name= '$product_name',product_price ='$product_price',product_image='$destination' WHERE id = '$id'";
            if (mysqli_query($this->link,$query))
            {
                header('Location:product.php');

            }else
            {
                echo"Something wrong";
            }
        }else
        {
            $product_name   = $_POST["product_name"];
            $product_price  = $_POST["product_price"];
            $query = "UPDATE products SET product_name= '$product_name',product_price ='$product_price' WHERE id = '$id'";
            if (mysqli_query($this->link,$query))
            {
                header('Location:product.php');
            }else
            {
                echo"Something wrong";
            }
        }
    }
    public function deleteProduct($id)
    {
        $query = "SELECT * FROM products WHERE id = '$id' ";
        $product = mysqli_query($this->link,$query);
        $productImage = mysqli_fetch_assoc($product);
        unlink($productImage['product_image']);

        $deleteQuery = "DELETE  FROM products WHERE id = '$id' ";
        if (mysqli_query($this->link,$deleteQuery))
        {
            header('Location:product.php');
        }else
        {
            echo"Something wrong";
        }

    }
}
