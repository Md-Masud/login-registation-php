<?php
require 'Database.php';
include_once 'Session.php';
Session::inti();
class User 
{ 
	private $bd;
	
	public function __construct()
	{

	$this->db = new Database();
	}
	public function registation($data)
	{
		$name=$data['name'];
		$email=$data['email'];
		$emailCheck=$this->email_check($email);
		$password=md5($data['password']);
		if($name==""||$email==""||$password=="")
		{
			$msg="<div class='alert alert-danger'><strong>Error!</strong>field not emty</div>";
			
			return $msg;
		}
		
		if(filter_var($email,FILTER_VALIDATE_EMAIL===false))
		{
			$msg="<div class='alert alert-danger'><strong>Error!</strong> you must email</div>";
			return $msg;
		}
		if($emailCheck==true)
		{
			$msg="<div class='alert alert-danger'><strong>Error!</strong> you email alredy exit</div>";
			return $msg;
		}
		$sql="INSERT INTO reg(name,email,password)  VALUES(:name,:email,:password)";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$result=$query->execute();
		if($result)
		{
			$msg="<div class='alert alert-success'><strong>Success</strong> insert successfull</div>";
			return $msg;
		}
		else
		{
		$msg="<div class='alert alert-danger'><strong>Error!</strong> insetr not successfull exit</div>";
			return $msg;	
		}
		
	}
	public function login($data)
	{
		$email=$data['email'];
		$password=$data['password'];
		if($email==''||$password=='')
		{
			$msg="<div class='alert alert-danger'><strong>Error!</strong>field not emty</div>";
			
			return $msg;
		}
		if(filter_var($email,FILTER_VALIDATE_EMAIL===false))
		{
			$msg="<div class='alert alert-danger'><strong>Error!</strong> you must email</div>";
			return $msg;
		}
		
		$result=$this->userlogin($email,$password);
		if($result)
		{
         Session::inti();
         session::set("login" ,true);
         Session::set('id',$result->id);
         Session::set('name',$result->name);
         Session::set('email',$result->email);
         Session::set('loginmsg',$result->email);
        Session::set('loginmsg',"<div class='alert alert-success'><strong>Success</strong> login successfull</div>");
         header("location: index.php");
		}
		else
		{
			$msg="<div class='alert alert-danger'><strong>Error!</strong> data not found</div>";
			return $msg;
		}
	}
	   public function userlogin($email,$password)
	   {
        $sql="SELECT * FROM reg WHERE email=:email AND password=:password";
        $query=$this->db->pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->bindValue(':password',$password);
        $query->execute();
        $result=$query->fetch(PDO::FETCH_OBJ);
        return $result;
	   }
		public function email_check($email)
		{
        $sql="SELECT email FROM reg WHERE email=:email";
        $query=$this->db->pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->execute();
        if($query->rowCount()>0)
        {
        	return true;
        }
        else
        {
        	return false;
        }
		}
		public function GetData()
		{
			$id = Session::get('id');
			$sql="SELECT * FROM reg WHERE id=:id";//WHERE ORDER BY id DESC";
			$query=$this->db->pdo->prepare($sql);
			$query->bindValue(':id',$id );
			$query->execute();
			$result=$query->fetchAll();
			return $result;

		}

	}



 ?>