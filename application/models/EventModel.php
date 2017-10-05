<?php
Class EventModel extends CI_Model
{

	function __construct(){
		parent::__construct();
	}

	public function get_pelayanans()
	{
		$DB1 = $this->load->database('testdb', TRUE);
		$DB1->select('nama_komisi, comission_description');
		$DB1->from('grouping_pelayanan');
		$query = $DB1->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function insert_event($datas){
		$DB1 = $this->load->database('testdb', TRUE);
		$DB1->insert('event', $datas);
		return $DB1->insert_id();
	}

	public function ar_get_event(){
		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select("*");
		$DB1->from('event');
		$query = $DB1->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function ar_get_event_by_id($id){
		$DB1 = $this->load->database('testdb', TRUE);
		
		$DB1->select("*");
		$DB1->from('event');
		$DB1->where('id_event', $id);
		$query = $DB1->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
}
?>