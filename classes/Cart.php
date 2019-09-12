<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php

class Cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new database();
        $this->fm = new format();
    }

    public function addToCart($quantity,$id){

        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $productId = mysqli_real_escape_string($this->db->link, $id);
        $sId       = session_id();

        $squery="SELECT * FROM tbl_product WHERE productId='$productId'";
        $result  = $this->db->select($squery)->fetch_assoc();

        $producName = $result['productName'];
        $price = $result['price'];
        $image = $result['image'];

        $query = "INSERT INTO  tbl_cart(sId,productId,producName,price,quantity,image) values ('$sId','$productId','$producName','$price','$quantity','$image')";

        $productInsert=$this->db->insert($query);
        if ($productInsert){
           header("Location:cart.php");
        }
        else {
            header("Location:404.php");
        }
    }
}
?>