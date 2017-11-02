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

	public function get_event(){

		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select("event.id_event, event_name, start_at, end_at, (SELECT count(pelayan_event.id_pelayan) from pelayan_event WHERE pelayan_event.id_event = event.id_event) as 'submitted_volunter'");
		$DB1->from('event');
		// $DB1->join('pelayan_event', 'event.id_event = pelayan_event.id_event');
		// $DB1->join('pelayan', 'pelayan.id_pelayan = pelayan_event.id_pelayan');
		// $id_pelayan_komisi_musik = array(2,3,5,6,7,8);
		// $DB1->where_in('pelayan_event.id_jenis_pelayanan', $id_pelayan_komisi_musik);
		// $DB1->group_start();
		$query = $DB1->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function get_event_view($parameter){
		// select event.id_event, event_name, start_at, end_at, 
		// (SELECT count(id_pelayan) from pelayan_event WHERE id_event = event.id_event) as 		'submitted_volunter', nama, email, handphone, nama_pelayanan from event join pelayan_event on event.id_event = pelayan_event.id_event join pelayan on pelayan_event.id_pelayan = pelayan.id_pelayan JOIN jenis_pelayanan on pelayan_event.id_jenis_pelayanan = jenis_pelayanan.id_jenis_pelayanan
	    
	 //    WHERE 
	 //       pelayan_event.id_jenis_pelayanan = 2 
	 //    OR pelayan_event.id_jenis_pelayanan = 3 
	 //    OR pelayan_event.id_jenis_pelayanan = 5 
	 //    OR pelayan_event.id_jenis_pelayanan = 6 
	 //    OR pelayan_event.id_jenis_pelayanan = 7 
	 //    OR pelayan_event.id_jenis_pelayanan = 8 ;
		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select("event.id_event, event_name, start_at, end_at, (SELECT count(pelayan_event.id_pelayan) from pelayan_event WHERE pelayan_event.id_event = ".$parameter.") as 'submitted_volunter', nama, email, handphone, nama_pelayanan");
		$DB1->from('event');
		$DB1->join('pelayan_event', 'event.id_event = pelayan_event.id_event');
		$DB1->join('pelayan', 'pelayan.id_pelayan = pelayan_event.id_pelayan');
		$DB1->join('jenis_pelayanan', 'jenis_pelayanan.id_jenis_pelayanan = pelayan_event.id_jenis_pelayanan');
		$id_pelayan_komisi_musik = array(2,3,5,6,7,8);
		$DB1->where_in('pelayan_event.id_jenis_pelayanan', $id_pelayan_komisi_musik);
		$DB1->where('pelayan_event.id_event', $parameter);
		// $DB1->where('event.id_event', $parameter);
		// $DB1->group_start();
		$query = $DB1->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_event_by_id($id){
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

	public function get_submitted_volunter_to_event_by_id($eventid){
		// SELECT id_pelayan_event as "id", event_name, pelayan.id_pelayan, nama, nama_pelayanan, start_at, end_at
		// FROM pelayan_event
		// JOIN pelayan ON pelayan_event.id_pelayan = pelayan.id_pelayan 
		// JOIN event ON pelayan_event.id_event = event.id_event
		// JOIN jenis_pelayanan ON  pelayan_event.id_jenis_pelayanan = jenis_pelayanan.id_jenis_pelayanan
		// WHERE  pelayan_event.id_event = 1 AND pelayan_event.id_jenis_pelayanan IN (2,3,5,6,7,8);

		$DB1 = $this->load->database('testdb', TRUE);
		
		$DB1->select("id_pelayan_event as 'id', event_name, pelayan_event.id_jenis_pelayanan, pelayan.id_pelayan, nama, nama_pelayanan, start_at, end_at");
		$DB1->from('pelayan_event');
		$DB1->join('pelayan', 'pelayan_event.id_pelayan = pelayan.id_pelayan');
		$DB1->join('event', 'pelayan_event.id_event = event.id_event');
		$DB1->join('jenis_pelayanan', 'pelayan_event.id_jenis_pelayanan = jenis_pelayanan.id_jenis_pelayanan');
		$DB1->where('pelayan_event.id_event', $eventid);
		$id_pelayan_komisi_musik = array(2,3,5,6,7,8);
		$DB1->where_in('pelayan_event.id_jenis_pelayanan', $id_pelayan_komisi_musik);
		$query = $DB1->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}

	}
}
?>