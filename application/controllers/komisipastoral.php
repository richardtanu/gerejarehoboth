<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class komisipastoral extends CI_Controller {

	// public $event_id = 0;
	public function __construct() {
		parent::__construct();
		$this->load->helper('url','form','html','file', 'session');
		$this->load->model('NotifModel','NM');
		$this->load->model('EventModel','EM');
		$this->load->helper('file');
	}

	public function index()
	{
		// $data['result'] = $this->NM->active_record_get_notif();
		$this->load->view('komisipastoral/index.php');
	}
	// public function schedule(){
	// 	// $this->session->set_userdata('eventIdSend', $);

	// 	$get_events = $this->EM->get_event();
	// 	$data['get_events'] = $get_events;
	// 	$this->load->view('komisipastoral/schedule.php', $data);
	// }
	// public function add_volunter_to_schedule($somevalue = null){
	// 	// $test = $somevalue;
	// 	// echo "sent by header: ".$test;
	// 	$event_id = $this->input->post('event_id_hidden');
	// 	// echo "<script>alert('".$event_id."');</script>";
	// 	//showing event time
	// 	$data['get_event_info_by_id']  = $this->EM->ar_get_event_by_id($event_id);
	// 	if($somevalue != null){
	// 		$data['validation_error_message'] = $somevalue;
	// 	}
	// 	$this->load->view('komisimusik/add_schedule.php', $data);
	// }

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
	public function get_pastoral(){
		$result = $this->NM->get_wl();

		$arr =  array();

		for ($i=0; $i < sizeof($result); $i++) { 
			$arr[] = $result[$i];
		}
		echo json_encode($result);
	}


	// get from add_volunter_to_schedule page
	public function pastoral_submit(){
		
		$this->form_validation->set_rules('taginputwl', 'Need to be filled', 'required');
		// $this->form_validation->set_rules('taginputsingers', 'Need to be filled', 'required');
		$this->form_validation->set_rules('taginputkeyboard', 'Need to be filled', 'required');
		$this->form_validation->set_rules('taginputguitar', 'Need to be filled', 'required');
		$this->form_validation->set_rules('taginputbass', 'Need to be filled', 'required');
		$this->form_validation->set_rules('taginputdrum', 'Need to be filled', 'required');
		

		$event_id = $this->session->userdata('id_event_throw');
        if ($this->form_validation->run() == FALSE)
        {
        	// $error = $this->validation_errors->error_array();
        	// $this->session->set_userdata('error', validation_errors());
            $this->add_volunter_to_schedule();
        }
        else
        {

        	$worship_leader = $this->input->POST('taginputwl');
			$singers = $this->input->POST('taginputsingers');
			$keyboard = $this->input->POST('taginputkeyboard');
			$guitar = $this->input->POST('taginputguitar');
			$bass = $this->input->POST('taginputbass');
			$drum = $this->input->POST('taginputdrum');
			// $alert = array( 'wl' => $worship_leader, 
						// 	'singers' => $singers,
						// 	'key' => $keyboard,
						// 	'guitar'=> $guitar,
						// 	'bass' => $bass,
						// 	'drum' => $drum
						// );

            // $this->session->set_userdata('message',"Yeay!");
            // $this->schedule($alert);

			$superDetail = []; $globalIndex=0;

			// detail wl
            $wlreplace = explode(",",str_replace("+"," ",$worship_leader));
            $sizewl =  sizeof($wlreplace);
            for ($i=0; $i < $sizewl; $i++) { 
	            $wlresult = $this->NM->get_detail_by_nama($wlreplace[$i], 2);

	            $id_pelayan_wl; $id_jenis_pelayanan_wl;
	            foreach ($wlresult as $key) {
	            	$id_pelayan_wl = $key->id_pelayan;
	            	$id_jenis_pelayanan_wl = $key->id_jenis_pelayanan;
	            		// echo "inside foreach: ".$id_jenis_pelayanan_wl."<br>";
	            }
	            // $event_id =  $this->session->userdata('event_id_throw_for_adding_music_commision_adding_volunter');
	            	// echo "chck: ".$event_id."<br>";
	            $detailWl = array('id_event' =>$event_id,
		           					'id_pelayan' => $id_pelayan_wl,
		           					'id_jenis_pelayanan' => $id_jenis_pelayanan_wl
		           				);
	            	// echo "detail ".$detailWl['id_pelayan']."<br>";
	            $superDetail[$globalIndex] = $detailWl;
	            $globalIndex++;
            }
            // detail singers
            if(!empty($singers)){
            	$singerreplace = explode(",",str_replace("+"," ",$singers));
            	$sizesingers =  sizeof($singerreplace);
            
            	for ($i=0; $i < $sizesingers; $i++) { 
	            	$singerresult = $this->NM->get_detail_by_nama($singerreplace[$i], 3);
	            	$id_pelayan_singers; $id_jenis_pelayanan_singers;
	            	foreach ($singerresult as $key) {
	            		$id_pelayan_singers = $key->id_pelayan;
	            		$id_jenis_pelayanan_singers= $key->id_jenis_pelayanan;
	            	}
	            	$detailSingers = array('id_event' => $event_id,
		            						'id_pelayan' => $id_pelayan_singers,
		            						'id_jenis_pelayanan' => $id_jenis_pelayanan_singers
		            					);
	            	$superDetail[$globalIndex] = $detailSingers;
	            	$globalIndex++;
            	}
            }  
            // detail keyboard
            $keyboardreplace = explode(",",str_replace("+"," ",$keyboard));
            $sizekeyboard =  sizeof($keyboardreplace);
            for ($i=0; $i < $sizekeyboard; $i++) { 
            	$keyboardresult = $this->NM->get_detail_by_nama($keyboardreplace[$i], 5);
            	$id_pelayan_key; $id_jenis_pelayanan_key;
            	foreach ($keyboardresult as $key) {
            		$id_pelayan_key = $key->id_pelayan;
            		$id_jenis_pelayanan_key = $key->id_jenis_pelayanan;
            	}
            	$detailKey = array('id_event' => $event_id,
	            					'id_pelayan' => $id_pelayan_key,
	            					'id_jenis_pelayanan' => $id_jenis_pelayanan_key
	            				);
            	$superDetail[$globalIndex] = $detailKey;
            	$globalIndex++;
            }

            // detail guitar
            $guitarreplace = explode(",",str_replace("+"," ",$guitar));
            $sizeguitar =  sizeof($guitarreplace);     
            for ($i=0; $i < $sizeguitar; $i++) { 
            	$guitarresult = $this->NM->get_detail_by_nama($guitarreplace[$i], 6);
            	$id_pelayan_guitar; $id_jenis_pelayanan_guitar;
            	foreach ($guitarresult as $key) {
            		$id_pelayan_guitar = $key->id_pelayan;
            		$id_jenis_pelayanan_guitar = $key->id_jenis_pelayanan;
            	}
            	$detailGuitar = array('id_event' => 1,
	            						'id_pelayan' => $id_pelayan_guitar,
	            						'id_jenis_pelayanan' => $id_jenis_pelayanan_guitar
	            					);
            	$superDetail[$globalIndex] = $detailGuitar;
            	$globalIndex++;
            }

            // detail bass
            $bassreplace = explode(",",str_replace("+"," ",$bass));
            $sizebass =  sizeof($bassreplace);
            
            for ($i=0; $i < $sizebass; $i++) { 
            	$bassresult = $this->NM->get_detail_by_nama($bassreplace[$i], 7);
            	$id_pelayan_bass; $id_jenis_pelayanan_bass;
            	foreach ($bassresult as $key) {
            		$id_pelayan_bass = $key->id_pelayan;
            		$id_jenis_pelayanan_bass = $key->id_jenis_pelayanan;
            	}
            	$detailBass = array('id_event' => $event_id,
	            								'id_pelayan' => $id_pelayan_bass,
	            								'id_jenis_pelayanan' => $id_jenis_pelayanan_bass
	            							 );
            	$superDetail[$globalIndex] = $detailBass;
            	$globalIndex++;
            }

            // detail drum
            $drumreplace = explode(",",str_replace("+"," ",$drum));
            $sizedrum =  sizeof($drumreplace);
 			for ($i=0; $i < $sizedrum; $i++) { 
            	$drumresult = $this->NM->get_detail_by_nama($drumreplace[$i], 8);
            	$id_pelayan_drum; $id_jenis_pelayanan_drum;
            	foreach ($drumresult as $key) {
            		$id_pelayan_drum = $key->id_pelayan;
            		$id_jenis_pelayanan_drum = $key->id_jenis_pelayanan;
            	}
            	$detailDrum = array('id_event' =>$event_id,
	            								'id_pelayan' => $id_pelayan_drum,
	            								'id_jenis_pelayanan' => $id_jenis_pelayanan_drum
	            							 );
            	$superDetail[$globalIndex] = $detailDrum;
            	$globalIndex++;
            }
            $this->NM->insert_whole_music_volunter_into_event($superDetail);
        }
        
		$test = $this->session->userdata('error');

	}

}




