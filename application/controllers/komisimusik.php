<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class komisimusik extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url','form','html','file');
		$this->load->model('NotifModel','NM');
		$this->load->model('EventModel','EM');
		$this->load->helper('file');
	}

	public function index()
	{
		// $data['result'] = $this->NM->active_record_get_notif();
		$this->load->view('komisimusik/index.php');
	}
	public function schedule($parameter = null){
		
		$get_events = $this->EM->ar_get_event();
		$data['get_events'] = $get_events;
		if($parameter != null){
			$data['parameter'] = $parameter;
		}
		// echo $alert['wl'];
		$this->load->view('komisimusik/schedule.php', $data);
	}
	public function add_volunter_to_schedule($somevalue = null){

		$event_id = $this->input->post('event_id_hidden');
		$data['get_event_info_by_id']  = $this->EM->ar_get_event_by_id($event_id);
		if($somevalue != null){
			$data['validation_error_message'] = $somevalue;
		}
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
	// public function get_worship_leader(){
		
	// 	$result = $this->NM->get_worship_leader();

	// 	echo json_encode($result);

	// }
	public function get_worship_leader(){
		$result = $this->NM->get_wl();

		$arr =  array();

		for ($i=0; $i < sizeof($result); $i++) { 
			$arr[] = $result[$i];
		}
		echo json_encode($result);
	}
	
	public function get_singers(){
		
		$result = $this->NM->get_singers();
		$arr =  array();
		for ($i=0; $i < sizeof($result); $i++) { 
			$arr[] = $result[$i];
		}
		echo json_encode($result);

	}

	public function get_keyboard_player(){
		
		$result = $this->NM->get_keyboard_player();

		$arr =  array();
		for ($i=0; $i < sizeof($result); $i++) { 
			$arr[] = $result[$i];
		}
		echo json_encode($result);

	}
	
	public function get_guitar_player(){
		
		$result = $this->NM->get_guitar_player();

		$arr =  array();
		for ($i=0; $i < sizeof($result); $i++) { 
			$arr[] = $result[$i];
		}
		echo json_encode($result);

	}
	public function get_bass_player(){
		
		$result = $this->NM->get_bass_player();

		$arr =  array();
		for ($i=0; $i < sizeof($result); $i++) { 
			$arr[] = $result[$i];
		}
		echo json_encode($result);

	}
	public function get_drum_player(){
		
		$result = $this->NM->get_drum_player();

		$arr =  array();
		for ($i=0; $i < sizeof($result); $i++) { 
			$arr[] = $result[$i];
		}
		echo json_encode($result);

	}

	// get from add_volunter_to_schedule page
	public function volunter_submit(){
		
		$this->form_validation->set_rules('autocomplete_wl', 'Need to be filled', 'required');

        if ($this->form_validation->run() == FALSE)
        {
        	// $error = $this->validation_errors->error_array();
        	// $this->session->set_userdata('error', validation_errors());
            $this->add_volunter_to_schedule();
        }
        else
        {
        	$worship_leader = $this->input->POST('autocomplete_wl');
			$singers = $this->input->POST('autocomplete_singers');
			$keyboard = $this->input->POST('autocomplete_keyboard');
			$guitar = $this->input->POST('autocomplete_guitar');
			$bass = $this->input->POST('autocomplete_bass');
			$drum = $this->input->POST('autocomplete_drum');
			$alert = array( 'wl' => $worship_leader, 
							'singers' => $singers,
							'key' => $keyboard,
							'guitar'=> $guitar,
							'bass' => $bass,
							'drum' => $drum
						);

            // $this->session->set_userdata('message',"Yeay!");
            $this->schedule($alert);
        }
        
		$test = $this->session->userdata('error');
		// echo "message:".$test."<br>";
		
		// echo "Singers:<br>"
		// for ($i=0; $i < sizeof($singers); $i++) { 
		// 	echo $singers[$i]."<br>";
		// }
		// echo "Key": $keyboard."<br>";
		// echo "Guitar": 
	}

}




