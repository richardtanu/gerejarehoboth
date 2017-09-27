<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('EventModel','EM');
		$this->load->model('NotifModel','NM');
		$this->load->library('form_validation','session');
		$this->load->helper('url','form','html');
	}

	public function index()
	{
		$this->load->view('admin/index.php');
	}
	public function event()
	{
		$data['result'] = $this->EM->get_pelayanans();
		$this->load->view('admin/event.php','','TRUE', $data);
	}
	public function testing(){
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('event_name','Event Name','required');
		$this->form_validation->set_rules('event_date','Event Name','required');
		$this->form_validation->set_rules('event_time_start','Event Start Time','required');
		$this->form_validation->set_rules('event_time_end','Event End Time','required');
		$this->form_validation->set_rules('event_description','Event Name','required');

		if($this->form_validation->run() == FALSE){
			$arr['success'] = false;
			$arr['notif'] = validation_errors();
		}else{
			$arr['name'] = $this->input->POST('event_name');
			$arr['success'] = true;
			$arr['notif'] = "success";
		}
		echo json_encode($arr);
	}
	
	public function add_events(){

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('event_name','Event Name','required');
		// $this->form_validation->set_rules('event_description','Event Description','required');
		$this->form_validation->set_rules('event_date','Event Name','required');
		$this->form_validation->set_rules('event_time_start','Event Start Time','required');
		$this->form_validation->set_rules('event_time_end','Event End Time','required');
		$this->form_validation->set_rules('event_description','Event Name','required');
		// $this->form_validation->set_rules('komisi[]','Komisi','required');
		if ($this->form_validation->run() == false) {
			$arr['success'] = false;
			$arr['notif'] = validation_errors();
			// echo json_encode($arr);
		}else{
			//get post input
			$eventname = $this->input->post('event_name');
			$eventdate = $this->input->post('event_date');
			$start = $this->input->post('event_time_start');
			$end = $this->input->post('event_time_end');
			$description = $this->input->post('event_description');
			// chekcbox
			// $komisicb = $this->input->post('komisi');
			// $data['komisi'] =implode(",", $komisicb);
			//dateformat for mysql is => YYYY-MM-DD HH:MM:SS
			
			//inserting event
			$begin = $eventdate." ".$start;
			$end = $eventdate ." ".$end;
			$data = array(
				'event_name' => $eventname,
				'start_at' => $begin,
				'end_at' => $end,
				'event_description' => $description
			);
			$arr['event_name'] = $eventname;
			$insertIdEvent = $this->EM->insert_event($data);
			
			//inserting notif
			$var = $this->session->userdata('loggedIn');
			$message =  "Event '".$data['event_name']."' created by ".$var['username'];
			$arr['user_who_created'] = (string)$var['username'];

			date_default_timezone_set('Asia/Jakarta');
			$now = date('Y-m-d H:i:s');
			$notif = array(
				'message' => $message,
				'created_at' => $now
			);
			$arr['notification'] = $notif['message'];
			$arr['created_at'] = $notif['created_at'];
			$insertIdNotif = $this->NM->insert_notif($notif);

			// inserting user_notifikasi
			$datas = array( 'id_user' => $var['iduser'], 
							'id_notifikasi' => $insertIdNotif,
							'id_event' => $insertIdEvent
						  );
			$arr['id_user'] = $datas['id_user'];
			$arr['id_event'] = $datas['id_notifikasi'];

			$insertIdUserNotif = $this->NM->add_user_notification($datas);

			//count unread notification
			$count = $this->NM->notif_count();
			$arr['count_notif']= $count;

			//utilities
			$arr['notif'] = "SUKSES!";
			$arr['success'] = true;
			// echo json_encode($arr);
			// $this->output
			// 	 ->set_content_type('application/json')
			// 	 ->set_output(json_encode($arr));

		}
		// header('Content-Type: application/json');
		echo json_encode($arr);
		// $this->output->set_output(json_encode($arr));
	}

}



