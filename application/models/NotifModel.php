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
	// public function update_notif_count($where, $){
	// 	$DB1 = $this->load->database('testdb', TRUE);
	// 	$DB1->select("*");
	// 	//something here
	// 	$DB1->where('id_notifikasi', $where);
	// 	$DB1->upda
	// }
	public function add_user_notification($datas){

		//SOMETHING HERE!!!
		$DB1 = $this->load->database('testdb', TRUE);
		// $DB1->trans_start();
		// $DB1->set('id_user', $datas['iduser']);
		// $DB1->set('id_notifikasi', $datas['idnotif']);
		// $DB1->set('id_event', $datas['idevent']);
		$DB1->insert('user_notifikasi', $datas);
		return $DB1->insert_id();
		// $DB1->trans_complete();
		

	}

}
?>