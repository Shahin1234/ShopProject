<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php

class Brand{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db=new database();
        $this->fm=new format();
    }
    public function BrandInsert($brandName){

        $brandName = $this->fm->validation($brandName);

        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        if (empty($brandName)) {
            $msg = "Brand must not be empty!";
            return $msg ;
        }else {
            $query = "insert into tbl_brand(brandName) values ('$brandName')";
            $brandName=$this->db->insert($query);
            if ($brandName){
                $msg="<span class='success'>Brand insert succesfully </span>";
                return $msg;
            }
            else {
                $msg="<span class='error'>Brand is not inserted </span>";
                return $msg;
            }
        }
    }
    public function getAllBrand(){
        $query = "SELECT * FROM tbl_brand ORDER BY brandId DESC ";
        $result=$this->db->select($query);
        return $result;
    }
    public function getBrandById($id){
        $query = "SELECT * FROM tbl_brand WHERE brandId='$id'";
        $result=$this->db->select($query);
        return $result;

    }




    public function brandDel($id){
        $query="DELETE FROM tbl_brand WHERE brandId='$id'" ;
        $result=$this->db->delete($query);

        if ($result){
            $msg="<span class='success'>Brand insert succesfully </span>";
            return $msg;
        }
        else {
            $msg="<span class='error'>Brand is not inserted </span>";
            return $msg;
        }
} }
?>

