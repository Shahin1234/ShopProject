<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
session:: checklogin();
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');



    ?>

<?php
/**
* adminlogin
*/
class adminlogin 
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db=new database();
		$this->fm=new format();
	}
	public function adminLogin($adminUser,$adminPass) {

		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);

		$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
		if (empty($adminUser) || empty($adminPass)) {
			$loginmsg = "username and password must not be empty!";
			return $loginmsg ;
		}
		else {
			$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
			$result = $this->db->select($query);
			if ($result != false)
			{
				$value = $result->fetch_assoc();
				session :: set("adminlogin",true); 
				session :: set("adminId",$value['adminId']); 
				session :: set("adminUser",$value['adminUser']); 
				session :: set("adminName",$value['adminName']);
				header("location : dashbord.php"); 
			}
			else {
				$loginmsg = "username and password not matched!";
			return $loginmsg ;

			}
		}
	}
}

?>