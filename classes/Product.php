<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php

class Product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new database();
        $this->fm = new format();
    }

    public function productInsert($data,$files){
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catId = mysqli_real_escape_string($this->db->link, $data['catId']);
        $brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
        $body = mysqli_real_escape_string($this->db->link, $data['body']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);

        $permited = array('jpg','jpeg','png','gif');
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_temp = $files['image']['temp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if ($productName=="" || $catId=="" ||$brandId=="" ||$body=="" ||$price=="" ||$type==""){
            $msg="<span class='error'>fields must not inserted </span>";
            return $msg;
        }else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO  tbl_product(productName,catId,brandId,body,price,image,type) values ('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";

            $productInsert=$this->db->insert($query);
            if ($productInsert){
                $msg="<span class='success'>product insert succesfully </span>";
                return $msg;
            }
            else {
                $msg="<span class='error'>product is not inserted </span>";
                return $msg;
            }
        }


    }
    public function  getAllProduct(){
        $query = "SELECT * FROM tbl_product ORDER BY productId DESC ";
        $result =$this->db->select($query);
        return $result ;

    }

    public function getFetPr(){
        $query = "SELECT * FROM tbl_product WHERE type ='0' ORDER BY productId DESC LIMIT 4 ";
        $result =$this->db->select($query);
        return $result ;


    }
    public function getNewtPr(){
        $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4 ";
        $result =$this->db->select($query);
        return $result ;

    }
    public function getSinglePr($id){
      $query = "SELECT p.*,c.catName,b.brandName FROM tbl_product as p,tbl_category as c,tbl_brand as b WHERE p.catId=c.catId AND p.brandId =b.brandId AND p.productId='$id'";
        $result =$this->db->select($query);
        return $result ;
}
}
?>