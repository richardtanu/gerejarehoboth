<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class KomisiMusik extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url','form','html');
		$this->load->model('NotifModel','NM');
	}

	public function index()
	{
		$this->load->view('komisimusik/index.php');
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
}




