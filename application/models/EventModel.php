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

	public function delete_event($eventid){
		echo "inside delete event ".$eventid;
		// DELETE FROM pelayan_event WHERE 1
		$DB1 = $this->load->database('testdb', TRUE);
		$DB1->where('id_event', $eventid);
		$DB1->delete('pelayan_event');
			
		// return $DB1->insert_id();
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

	public function get_event_patoral(){

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
		// echo "<script>alert('inside get_event_view ');</script>";
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
	public function get_volunteer_id_by_name($nama_pelayan){
		// select pelayan_jenis_pelayanan.id_pelayan, pelayan.nama from pelayan_jenis_pelayanan join pelayan on pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan where pelayan.nama = ""
		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select('pelayan_jenis_pelayanan.id_pelayan, pelayan.nama');
		$DB1->from('pelayan_jenis_pelayanan');
		$DB1->join('pelayan','pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan');
		$DB1->where('pelayan.nama',	$nama_pelayan);
		$DB1->limit(1);

		$query = $DB1->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function check_if_volunteer_assigned_in_one_or_more_comission($id_pelayan){

		// SELECT pelayan_jenis_pelayanan.id_pelayan, nama, nama_pelayanan, jenis_pelayanan.id_jenis_pelayanan, (select COUNT(id_pelayan_jenis_pelayanan) from pelayan_jenis_pelayanan where id_pelayan = 20) as 'JumlahBidangPelayananYangDiikuti' 
		// from pelayan_jenis_pelayanan 
		// join pelayan on pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan 
		// join jenis_pelayanan on jenis_pelayanan.id_jenis_pelayanan = pelayan_jenis_pelayanan.id_jenis_pelayanan 
		// WHERE pelayan_jenis_pelayanan.id_pelayan = 20

		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select("pelayan_jenis_pelayanan.id_pelayan, nama, nama_pelayanan, jenis_pelayanan.id_jenis_pelayanan, (select COUNT(id_pelayan_jenis_pelayanan) from pelayan_jenis_pelayanan where id_pelayan = ".$id_pelayan.") as 'JumlahBidangPelayananYangDiikuti'");
		$DB1->from('pelayan_jenis_pelayanan');
		$DB1->join('pelayan', 'pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan ');
		$DB1->join('jenis_pelayanan', 'jenis_pelayanan.id_jenis_pelayanan = pelayan_jenis_pelayanan.id_jenis_pelayanan');
		$DB1->where('pelayan_jenis_pelayanan.id_pelayan', $id_pelayan);
	
		$query = $DB1->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}

	}


	public function check_if_duplicated_volunteer_added_in_event($parameter1, $parameter2, $id){
		// SELECT pelayan_event.id_event, event.event_name,event.start_at, DATE_FORMAT( event.start_at, '%d-%m-%Y' ) as date_human, DATE_FORMAT( event.start_at, '%H:%i') as start_time_human, event.end_at, DATE_FORMAT( event.end_at, '%H:%i') as end_time_human,  pelayan.nama, pelayan_event.id_pelayan, pelayan_event.id_jenis_pelayanan
		// FROM `pelayan_event`
		// JOIN `event` ON pelayan_event.id_event = event.id_event
		// JOIN `pelayan` on pelayan.id_pelayan = pelayan_event.id_pelayan
		// WHERE  pelayan_event.id_pelayan = 78 AND id_jenis_pelayanan = 8
		// ORDER BY pelayan_event.id_event ASC;

		// SELECT (SELECT COUNT(pelayan_event.id_event) from pelayan_event WHERE pelayan_event.id_pelayan = 78) as "showup",pelayan_event.id_event, event.event_name,event.start_at, DATE_FORMAT( event.start_at, '%d-%m-%Y' ) as date_human, DATE_FORMAT( event.start_at, '%H:%i') as start_time_human, event.end_at, DATE_FORMAT( event.end_at, '%H:%i') as end_time_human,  pelayan.nama, pelayan_event.id_pelayan, pelayan_event.id_jenis_pelayanan
		// FROM `pelayan_event`
		// JOIN `event` ON pelayan_event.id_event = event.id_event
		// JOIN `pelayan` on pelayan.id_pelayan = pelayan_event.id_pelayan
		// WHERE  pelayan_event.id_pelayan = 78 AND id_jenis_pelayanan = 8
		// ORDER BY pelayan_event.id_event ASC;

		// (SELECT (SELECT COUNT(pelayan_event.id_event) from pelayan_event WHERE pelayan_event.id_pelayan = 78) as 'showup' , pelayan_event.id_event, event.event_name, event.start_at, DATE_FORMAT( event.start_at, '%d-%m-%Y' ) as date_human, DATE_FORMAT( event.start_at, '%H:%i') as start_time_human, event.end_at, DATE_FORMAT( event.end_at, '%H:%i') as end_time_human,  pelayan.nama, pelayan_event.id_pelayan, pelayan_event.id_jenis_pelayanan FROM `pelayan_event`
		// JOIN `event` ON pelayan_event.id_event = event.id_event
		// JOIN `pelayan` on pelayan.id_pelayan = pelayan_event.id_pelayan
		// WHERE  pelayan_event.id_pelayan = 78 AND id_jenis_pelayanan = 8
	  //AND event.id_event != 1
	  //AND (event.start_at BETWEEN (SELECT event.start_at FROM event where event.id_event = 1) AND (SELECT event.end_at FROM event where event.id_event = 1) OR event.end_at BETWEEN (SELECT event.start_at FROM event where event.id_event = 1) AND (SELECT event.end_at FROM event where event.id_event = 1)) ORDER BY pelayan_event.id_event ASC)

		$result = array();

		$DB1 = $this->load->database('testdb', TRUE);

		$query = $DB1->query(" (SELECT (SELECT COUNT(pelayan_event.id_event) from pelayan_event WHERE pelayan_event.id_pelayan = ".$parameter1.") as 'showup' , pelayan_event.id_event, event.event_name, event.start_at, DATE_FORMAT( event.start_at, '%d-%m-%Y' ) as date_human, DATE_FORMAT( event.start_at, '%H:%i') as start_time_human, event.end_at, DATE_FORMAT( event.end_at, '%H:%i') as end_time_human,  pelayan.nama, pelayan_event.id_pelayan, pelayan_event.id_jenis_pelayanan FROM `pelayan_event`
		JOIN `event` ON pelayan_event.id_event = event.id_event
		JOIN `pelayan` on pelayan.id_pelayan = pelayan_event.id_pelayan
		WHERE  pelayan_event.id_pelayan = ".$parameter1." AND id_jenis_pelayanan = ".$parameter2."
            AND event.id_event != ".$id."
        AND (event.start_at BETWEEN (SELECT event.start_at FROM event where event.id_event = ".$id.") AND (SELECT event.end_at FROM event where event.id_event = ".$id.") OR event.end_at BETWEEN (SELECT event.start_at FROM event where event.id_event = ".$id.") AND (SELECT event.end_at FROM event where event.id_event = ".$id.")) ORDER BY pelayan_event.id_event ASC)");
		// $DB1->order('pelayan_event.id_event', 'ASC');
		// $query = $DB1->get();

		if($query->num_rows() > 0){
			$result = $query->result();
		}
		return $result;
	}

	public function get_detail_by_nama($parameter, $parameter2){
		// SELECT * FROM `pelayan_jenis_pelayanan` JOIN pelayan ON pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan WHERE pelayan_jenis_pelayanan.id_jenis_pelayanan = 8 AND nama = "andre";
		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select('id_pelayan_jenis_pelayanan, pelayan.id_pelayan, id_jenis_pelayanan, nama, email, handphone');
		$DB1->from('pelayan_jenis_pelayanan');
		$DB1->join('pelayan','pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan');
		// $DB1->where('pelayan_jenis_pelayanan.id_jenis_pelayanan', 2);
		$DB1->where('pelayan_jenis_pelayanan.id_jenis_pelayanan',	$parameter2);
		$DB1->group_start();
		$DB1->where('nama', $parameter);
		$DB1->group_end();
		$DB1->limit(1);
		// $DB1->or_where('nama', $parameter);

		$query = $DB1->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

}
?>