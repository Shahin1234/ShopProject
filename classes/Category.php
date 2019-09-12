<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php

class Category{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db=new database();
        $this->fm=new format();
    }
    public function catInsert($catName){

        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link, $catName);
        if (empty($catName)) {
            $msg = "category must not be empty!";
            return $msg ;
        }else {
            $query = "insert into tbl_category(catName) values ('$catName')";
            $catinsert=$this->db->insert($query);
            if ($catinsert){
                $msg="<span class='success'>catagory insert succesfully </span>";
                return $msg;
            }
            else {
                $msg="<span class='error'>catagory is not inserted </span>";
                return $msg;
            }
        }

    }
    public function getAllCat(){
        $query = "SELECT * FROM tbl_category ORDER BY catId DESC ";
        $result=$this->db->select($query);
        return $result;
    }

    public function getCatById($id){
        $query = "SELECT * FROM tbl_category WHERE catId='$id'";
        $result=$this->db->select($query);
        return $result;

    }
    public function catdel($id){
        $query="DELETE FROM tbl_category WHERE catId='$id'" ;
        $result=$this->db->delete($query);

         if ($result){
             $msg="<span class='success'>catagory insert succesfully </span>";
             return $msg;
         }
         else {
             $msg="<span class='error'>catagory is not inserted </span>";
             return $msg;
}
}



}
?>