<?php
Class loginModel extends CI_Model
{

	function __construct(){
		parent::__construct();
	}

	function processLogin($data)
	{
		$DB1 = $this->load->database('testdb', TRUE);
		// $condition = "username =" . "'" . $username. "' AND " . "pass =" . "'" . $password. "'";
		$DB1->select('id_user,username, nama_role, nama, email');
		$DB1->from('users u');
		$DB1->join('roles r', 'r.id_role = u.fk_id_roles');
		$DB1->where(array('username'=> $data['username'],'password'=> MD5($data['password'])));
		// $this->db->where('password', MD5($password));
		$DB1->limit(1);
		$query = $DB1->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	function usernameOnDB($username){
		$DB1 = $this->load->database('testdb', TRUE);
		$DB1->select('username');
		$DB1->from('users');
		$DB1->where('username', $username);
		// $this->db->limit(1);
 
		$query = $DB1->get();
 
		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function passwdOnDB($password){
		$DB1 = $this->load->database('testdb', TRUE);
		$DB1->select('password');
		$DB1->from('users');
		$DB1->where('username', MD5($password));
		// $this->db->limit(1);
 
		$query = $DB1->get();
 
		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}
?>