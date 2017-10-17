<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class komisimusik extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url','form','html');
		$this->load->model('NotifModel','NM');
		$this->load->model('EventModel','EM');
	}

	public function index()
	{
		// $data['result'] = $this->NM->active_record_get_notif();
		$this->load->view('komisimusik/index.php');
	}
	public function schedule(){
		
		$get_events = $this->EM->ar_get_event();
		$data['get_events'] = $get_events;
		$this->load->view('komisimusik/schedule.php', $data);
	}
	public function add_volunter_to_schedule(){
		$event_id = $this->input->post('event_id_hidden');
		$data['get_event_info_by_id']  = $this->EM->ar_get_event_by_id($event_id);
		$this->load->view('komisimusik/add_schedule.php', $data);
	}

	public function news_feed(){
		// TODO
		// css, terus time ago, span hr, see all alerts, facebook scrolling
 		$view = $this->input->POST('view');
 		// echo "console.log("'.$view.'");";
 		if($view != ''){
 			$this->NM->update_notif_seen_by_user();
 		}
 		$output = "";
		$arr = $this->NM->get_notif();

		if($arr['length']>0){
			foreach ($arr['result'] as $row) {
				$now = time();
				$output .= '
					<li>
						<a href="">
							<span>
						    	<span>'.$row->nama.'</span>
						    </span>
						    <span class="message">'.$row->message.'</span>
						    <span class="time"> something here ago</span>
						</a>
				   </li>
				';
			}
		}else{
			$output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
		}
		
		$count = $this->NM->get_count_notif_not_read_yet();
		$data = array(
			'notification' => $output,
			'unseen_notification' => $count
		);
		echo json_encode($data);
	}
	// public function get_event(){
	// 	$arr  = $this->NM->get_notif();
	// }
	public function get_worship_leader(){
		
		$result = $this->NM->get_worship_leader();

		echo json_encode($result);

	}
	public function get_singers(){
		
		$result = $this->NM->get_singers();

		echo json_encode($result);

	}
	public function get_keyboard_player(){
		
		$result = $this->NM->get_keyboard_player();

		echo json_encode($result);

	}
	public function get_guitar_player(){
		
		$result = $this->NM->get_guitar_player();

		echo json_encode($result);

	}
	public function get_bass_player(){
		
		$result = $this->NM->get_bass_player();

		echo json_encode($result);

	}
	public function get_drum_player(){
		
		$result = $this->NM->get_drum_player();

		echo json_encode($result);

	}

}




