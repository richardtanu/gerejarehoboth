<?php
Class NotifModel extends CI_Model
{

	function __construct(){
		parent::__construct();
	}

	public function insert_notif($datas){

		$DB1 = $this->load->database('testdb', TRUE);
		$DB1->insert('notifikasi', $datas);
		return $DB1->insert_id();
	}
	public function notif_count(){

		$DB1 = $this->load->database('testdb', TRUE);
		$DB1->where('read_status', '0');
		$DB1->from('notifikasi');
		return $DB1->count_all_results();
	}

	public function add_user_notification($datas){

		$DB1 = $this->load->database('testdb', TRUE);
		// $DB1->trans_start();
		// $DB1->set('id_user', $datas['iduser']);
		// $DB1->set('id_notifikasi', $datas['idnotif']);
		// $DB1->set('id_event', $datas['idevent']);
		$DB1->insert('user_notifikasi', $datas);
		return $DB1->insert_id();
		// $DB1->trans_complete();
		

	}

	public function update_notif_seen_by_user(){

		$DB1 = $this->load->database('testdb', TRUE);
		// $new = array('read_status' => 1);

		
		$DB1->set('read_status', 1, FALSE);
		$DB1->where('read_status', 0);
		$DB1->update('notifikasi');

	}	
	

	public function get_notif(){
		// Query
		// SELECT event.event_name, event.start_at, event.end_at, users.nama, notifikasi.message, notifikasi.created_at, notifikasi.read_status 
		// FROM `user_notifikasi`
		// JOIN event ON event.id_event = user_notifikasi.id_event 
		// JOIN users ON  users.id_user = user_notifikasi.id_user 
		// JOIN notifikasi ON notifikasi.id_notifikasi = user_notifikasi.id_notifikasi
		// WHERE notifikasi.read_status = 0;

		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select("event.event_name, event.start_at, event.end_at, users.nama, notifikasi.message, notifikasi.created_at, notifikasi.read_status");
		$DB1->from('user_notifikasi');
		$DB1->join('event', 'event.id_event = user_notifikasi.id_event');
		$DB1->join('users', 'users.id_user = user_notifikasi.id_user');
		$DB1->join('notifikasi', 'notifikasi.id_notifikasi = user_notifikasi.id_notifikasi');
		// $DB1->where('notifikasi.read_status', 0);
		$DB1->order_by('created_at', 'DESC');

		$query = $DB1->get();
		// $test = $query->result();
		$returns = array('result' => $query->result(),
						'length' => $query->num_rows()
					);
		
		if ( $query->num_rows() > 0) {
			// echo "<script>alert('yeay');</script>";
			// echo "<script>console.log('yeay');</script>";
			return $returns;
		}else{
			return false;
		}
	}

	public function get_count_notif_not_read_yet(){
		// Query
		// SELECT event.event_name, event.start_at, event.end_at, users.nama, notifikasi.message, notifikasi.created_at, notifikasi.read_status 
		// FROM `user_notifikasi`
		// JOIN event ON event.id_event = user_notifikasi.id_event 
		// JOIN users ON  users.id_user = user_notifikasi.id_user 
		// JOIN notifikasi ON notifikasi.id_notifikasi = user_notifikasi.id_notifikasi
		// WHERE notifikasi.read_status = 0;

		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select("event.event_name, event.start_at, event.end_at, users.nama, notifikasi.message, notifikasi.created_at, notifikasi.read_status");
		$DB1->from('user_notifikasi');
		$DB1->join('event', 'event.id_event = user_notifikasi.id_event');
		$DB1->join('users', 'users.id_user = user_notifikasi.id_user');
		$DB1->join('notifikasi', 'notifikasi.id_notifikasi = user_notifikasi.id_notifikasi');
		$DB1->where('notifikasi.read_status', 0);
		$DB1->order_by('created_at', 'DESC');

		$query = $DB1->get();
		
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		}else{
			return false;
		}
	}

		// 1 	Pelayan Firman
		// 2 	Worship Leader 	
		// 3 	Singers 	
		// 4 	Choir 	
		// 5 	Keyboardist 
		// 6 	Guitarits 	
		// 7 	Bassist 	
		// 8 	Drummer 	
		// 9 	Soundman 	
		// 10 	Cameraman 	
		// 11 	Navigator 	
		// 12 	Lighting 	
		// 13 	Content Multimedia 	
		// 14 	Event Organizer 	
		// 15 	Usher 	
		// 16 	Kolektan
	public function get_wl(){
		// SELECT * FROM `pelayan_jenis_pelayanan` JOIN pelayan ON pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan WHERE pelayan_jenis_pelayanan.id_jenis_pelayanan = 8;
		 	
		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select('id_pelayan_jenis_pelayanan, pelayan.id_pelayan, id_jenis_pelayanan, nama, email, handphone');
		$DB1->from('pelayan_jenis_pelayanan');
		$DB1->join('pelayan','pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan');
		$DB1->where('pelayan_jenis_pelayanan.id_jenis_pelayanan', 2);

		$query = $DB1->get();
		$result = $query->result();
		if($query->num_rows() > 0){
			return $query->result();
			// $wl_array = array();
			// foreach ($result as $row) {
			//    $wl_array[] = $row->nama;
			// }
			// $data = $wl_array;

			// return $data;

		}else{
			return false;
		}
	}
	public function get_singers(){
		// SELECT * FROM `pelayan_jenis_pelayanan` JOIN pelayan ON pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan WHERE pelayan_jenis_pelayanan.id_jenis_pelayanan = 8;
		 	
		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select('id_pelayan_jenis_pelayanan, pelayan.id_pelayan, id_jenis_pelayanan, nama, email, handphone');
		$DB1->from('pelayan_jenis_pelayanan');
		$DB1->join('pelayan','pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan');
		$DB1->where('pelayan_jenis_pelayanan.id_jenis_pelayanan', 3);

		$query = $DB1->get();
		$result = $query->result();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
		

	}
	public function get_keyboard_player(){
		// SELECT * FROM `pelayan_jenis_pelayanan` JOIN pelayan ON pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan WHERE pelayan_jenis_pelayanan.id_jenis_pelayanan = 8;
		 	
		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select('id_pelayan_jenis_pelayanan, pelayan.id_pelayan, id_jenis_pelayanan, nama, email, handphone');
		$DB1->from('pelayan_jenis_pelayanan');
		$DB1->join('pelayan','pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan');
		$DB1->where('pelayan_jenis_pelayanan.id_jenis_pelayanan', 5);

		$query = $DB1->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function get_guitar_player(){
		// SELECT * FROM `pelayan_jenis_pelayanan` JOIN pelayan ON pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan WHERE pelayan_jenis_pelayanan.id_jenis_pelayanan = 8;
		 	
		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select('id_pelayan_jenis_pelayanan, pelayan.id_pelayan, id_jenis_pelayanan, nama, email, handphone');
		$DB1->from('pelayan_jenis_pelayanan');
		$DB1->join('pelayan','pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan');
		$DB1->where('pelayan_jenis_pelayanan.id_jenis_pelayanan', 6);

		$query = $DB1->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function get_bass_player(){
		// SELECT * FROM `pelayan_jenis_pelayanan` JOIN pelayan ON pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan WHERE pelayan_jenis_pelayanan.id_jenis_pelayanan = 8;
		 	
		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select('id_pelayan_jenis_pelayanan, pelayan.id_pelayan, id_jenis_pelayanan, nama, email, handphone');
		$DB1->from('pelayan_jenis_pelayanan');
		$DB1->join('pelayan','pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan');
		$DB1->where('pelayan_jenis_pelayanan.id_jenis_pelayanan', 7);

		$query = $DB1->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function get_drum_player(){
		// SELECT * FROM `pelayan_jenis_pelayanan` JOIN pelayan ON pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan WHERE pelayan_jenis_pelayanan.id_jenis_pelayanan = 8;
		 	
		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select('id_pelayan_jenis_pelayanan, pelayan.id_pelayan, id_jenis_pelayanan, nama, email, handphone');
		$DB1->from('pelayan_jenis_pelayanan');
		$DB1->join('pelayan','pelayan_jenis_pelayanan.id_pelayan = pelayan.id_pelayan');
		$DB1->where('pelayan_jenis_pelayanan.id_jenis_pelayanan', 8);

		$query = $DB1->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

}
?>