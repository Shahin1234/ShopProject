<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
include_once ($filepath.'/../inc/header.php');
?>

<?php

class Customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new database();
        $this->fm = new format();
    }
    public function customerRegistration($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);

        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $country = mysqli_real_escape_string($this->db->link, $data['country']);
        $zip = mysqli_real_escape_string($this->db->link, $data['zip']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));

        if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" || $pass == "") {
            $msg = "<span class='error'>fields must not inserted </span>";
            return $msg;
        }
        $mailquery="SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
        $mailchk=$this->db->select($mailquery);
        if($mailchk !=false){
            $msg = "<span class='error'>Email already Exist</span>";
            return $msg;
        }
        else {
            $query = "INSERT INTO  tbl_customer(name,address,city,country,zip,phone,email,pass) 
                     values ('$name','$address','$city','$country','$zip','$phone','$email','$pass')";

            $productInsert=$this->db->insert($query);
            if ($productInsert){
                $msg="<span class='success'>Customer data inserted succesfully </span>";
                return $msg;
            }
            else {
                $msg="<span class='error'>Customer data is not inserted </span>";
                return $msg;
            }
        }

    }

    public function customerLogin($data){

        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
        if(empty($email)|| empty($pass)){
            $msg = "<span class='error'>fields must not inserted </span>";
            return $msg;
        }
        $query   = "SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass'" ;
        $result = $this->db->select($query);
        if($result !=false){
            $value = $result->fetch_assoc();
           Session::set("cuslogin",true);
           Session::set("cmrId",$value['id']);
           Session::set("cmrName",$value['name']);
            header("location : order.php");
        }else{
            $msg = "<span class='error'>Email or password not matched </span>";
            return $msg;
        }
    }
}
?>