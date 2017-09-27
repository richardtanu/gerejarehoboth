<?php
Class CalendarModel extends CI_Model
{

	function __construct(){
		parent::__construct();
		$this->load->database('testdb', TRUE);

		
	}

	public function get_events()
	{
		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->select('*');
		$DB1->from('event');
		$query = $DB1->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
		// return $this->db->where("start >=", $start)->where("end <=", $end)->get("calendar_events");
	}
	public function add_events()
	{
		$DB1 = $this->load->database('testdb', TRUE);

		$DB1->set('event_name', $this->input->post('event_name'));
		$DB1->set('start_at', $this->input->post('event_start'));
		$DB1->set('end_at', $this->input->post('event_end'));
		$query = $DB1->insert('event');
		// $input = array(
  //               'event_name'  => $this->input->post('event_name'),
  //               'start_at'    => $this->input->post('event_start'),
  //               'end_at'      => $this->input->post('event_end') 
  //       );
		// $DB1 = $this->load->database('testdb', TRUE);
		// // $this->db2 = $CI->load->database('testdb', TRUE);
  //  		$this->DB1->insert('event', $inputs);
	}


	// public function add_event($data)
	// {
	// 	$this->db->insert("calendar_events", $data);
	// }

	// public function get_event($id)
	// {
	// 	return $this->db->where("ID", $id)->get("calendar_events");
	// }

	// public function update_event($id, $data)
	// {
	// 	$this->db->where("ID", $id)->update("calendar_events", $data);
	// }

	// public function delete_event($id)
	// {
	// 	$this->db->where("ID", $id)->delete("calendar_events");
	// }
}
?>