<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class komisimusik_edit_schedule extends CI_Controller {

	// public $event_id = 0;
	public function __construct() {
		parent::__construct();
		$this->load->helper('url','form','html','file', 'session');
		$this->load->model('NotifModel','NM');
		$this->load->model('EventModel','EM');
		$this->load->helper('file');
		$event_id = 0;
	}

	public function index()
	{
		$this->load->view('komisimusik/edit_schedule.php', $data);
	}
	public function schedule(){
		// $this->session->set_userdata('eventIdSend', $);

		$get_events = $this->EM->get_event();
		$data['get_events'] = $get_events;
		$this->load->view('komisimusik/schedule.php', $data);
	}

	public function add_volunter_to_schedule($somevalue = null){
		$event_id_add = $this->input->post('event_id_add');
		$this->session->set_userdata('_eventId', $event_id_add);
		$event_id_session = $this->session->userdata('_eventId');
		$data['get_event_info_by_id']  = $this->EM->get_event_by_id($event_id_session);
		if($somevalue != null){
			$data['validation_error_message'] = $somevalue;
		}
		$this->load->view('komisimusik/add_schedule.php', $data);
	}

	public function volunter_submit(){
		
		$this->form_validation->set_rules('taginputwl', 'Need to be filled', 'required');
		// $this->form_validation->set_rules('taginputsingers', 'Need to be filled', 'required');
		$this->form_validation->set_rules('taginputkeyboard', 'Need to be filled', 'required');
		$this->form_validation->set_rules('taginputguitar', 'Need to be filled', 'required');
		$this->form_validation->set_rules('taginputbass', 'Need to be filled', 'required');
		$this->form_validation->set_rules('taginputdrum', 'Need to be filled', 'required');
		

		$event_id = $this->session->userdata('_eventId');
		echo "<script>alert(".$event_id.");</script>";
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
            	$detailGuitar = array('id_event' => $event_id,
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
            $this->schedule();
        }
        
		$test = $this->session->userdata('error');
	}

	public function volunteer_edit($id){
		if($id){
			$event_id_session = $id;
		}else{
			$event_id_session = $this->session->userdata('_eventId');
		}
		// $event_id_edit = $this->input->POST('event_id_edit');
		// $this->session->set_userdata('_eventId', $event_id_edit);
		
		// echo $event_id_session;
		$this->form_validation->set_rules('taginputwl', 'Need to be filled', 'required|callback_check_availability['.$event_id_session.']');
		$this->form_validation->set_rules('taginputsingers', '', 'callback_check_availability['.$event_id_session.']');
		$this->form_validation->set_rules('taginputkeyboard', 'Need to be filled', 'required|callback_check_availability['.$event_id_session.']');
		$this->form_validation->set_rules('taginputguitar', 'Need to be filled', 'required|callback_check_availability['.$event_id_session.']');
		$this->form_validation->set_rules('taginputbass', 'Need to be filled', 'required|callback_check_availability['.$event_id_session.']');
		$this->form_validation->set_rules('taginputdrum', 'Need to be filled', 'required|callback_check_availability['.$event_id_session.']');
		

		$event_id = $this->session->userdata('_eventId');
        if ($this->form_validation->run() == FALSE)
        {
        	// $error = $this->validation_errors->error_array();
        	// $this->session->set_userdata('error', validation_errors());
        	$this->edit_volunter_from_schedule($event_id_session);
        	// $this->load->view('komisimusik/edit_schedule.php', $event_id_session);
            // $this->edit_volunter_from_schedule($event_id_session);
            // base_url('komisimusik/edit_volunter_from_schedule');

        }
        else
        {

        	$worship_leader = $this->input->POST('taginputwl');
			$singers = $this->input->POST('taginputsingers');
			$keyboard = $this->input->POST('taginputkeyboard');
			$guitar = $this->input->POST('taginputguitar');
			$bass = $this->input->POST('taginputbass');
			$drum = $this->input->POST('taginputdrum');

			$superDetail = []; $globalIndex=0;

			// detail wl
            $wlreplace = explode(",",str_replace("+"," ",$worship_leader));
            $sizewl =  count($wlreplace);
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
            	$sizesingers =  count($singerreplace);
            
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
            $sizekeyboard =  count($keyboardreplace);
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
            $sizeguitar =  count($guitarreplace);     
            for ($i=0; $i < $sizeguitar; $i++) { 
            	$guitarresult = $this->NM->get_detail_by_nama($guitarreplace[$i], 6);
            	$id_pelayan_guitar; $id_jenis_pelayanan_guitar;
            	foreach ($guitarresult as $key) {
            		$id_pelayan_guitar = $key->id_pelayan;
            		$id_jenis_pelayanan_guitar = $key->id_jenis_pelayanan;
            	}
            	$detailGuitar = array('id_event' => $event_id,
	            						'id_pelayan' => $id_pelayan_guitar,
	            						'id_jenis_pelayanan' => $id_jenis_pelayanan_guitar
	            					);
            	$superDetail[$globalIndex] = $detailGuitar;
            	$globalIndex++;
            }

            // detail bass
            $bassreplace = explode(",",str_replace("+"," ",$bass));
            $sizebass =  count($bassreplace);
            
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
            $sizedrum =  count($drumreplace);
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
            echo "<script>alert(".$event_id_session.");</script>";
            $this->EM->delete_event($event_id_session);
            $this->NM->insert_whole_music_volunter_into_event($superDetail);
            // $this->session->unset_userdata();
            $data['success'] = "success";
            $this->load->view('komisimusik/schedule.php',$data);
        }
        
		$test = $this->session->userdata('error');
	}

	

	public function edit_volunter_from_schedule($parameter = null, $id){
		
		// $event_id_thrown = $this->input->POST('event_id_thrown_edit');
		// echo "<script>alert(".$event_id_thrown.");</script>";

		$event_id = $this->input->POST('event_id_edit');
		$this->session->set_userdata('_eventId', $event_id);
		$event_id_session = $this->session->userdata('_eventId');

		$data;
		if($parameter){
			$data['get_event_info_by_id']  = $this->EM->get_event_by_id($parameter);
		}else{
			$data['get_event_info_by_id']  = $this->EM->get_event_by_id($event_id_session);
		}
		
		$this->load->view('komisimusik/edit_schedule.php', $data);
	}

	public function fetched_volunter_added_to_event_by_id(){

		$id_thrown_from_edit_view = $this->input->POST('event_id_edit');

		$volunter_info = $this->EM->get_submitted_volunter_to_event_by_id($id_thrown_from_edit_view);

		echo json_encode($volunter_info);
	}

	public function check_availability($str){
		// echo  $str." ";
		$event_id = $this->input->post('event_id_session');
		$id = $this->session->userdata('_eventId');
		// echo "id ".$id." ". $event_id." ".$another."<br>";
		$checkParam = explode(",",str_replace("+"," ",$str));
		// echo "print :".$str;
        $sizeOfParam =  count($checkParam);
        echo count($checkParam);
        $error_report = '';
        $id_pelayan;
		$nama;
        $melayaniApaSaja = array();
       	$idJenisPelayanan = array();
       	$totalBidangPelayanan;
		$duplikasi;

		$nama_terduplikasi ='';
        $idpelayan_terduplikasi = 0;
       	$namaEvent_terduplikasi = array();
       	$tanggal_terduplikasi =  array();
       	$start_terduplikasi =  array();
       	$end_terduplikasi =  array();
      	$idEvent_terduplikasi  =  array();
      	$i1 = 0 ; $i2 = 0; $i3 = 0; $i4 = 0; $i5 = 0;

      	
 
      	
        foreach ($checkParam as $x) {
        	// echo "INI :".$checkParam[$i]."<BR>";
        	$volunterId = $this->EM->get_volunteer_id_by_name($x);

        	foreach ($volunterId as $key) {
        		$id_pelayan = $key->id_pelayan;
        	}
       
        	//need to isolated the person
        	$pelayan = $this->EM->check_if_volunteer_assigned_in_one_or_more_comission($id_pelayan);
        	foreach ($pelayan as $key) {
        		$totalBidangPelayanan = $key->JumlahBidangPelayananYangDiikuti;
        		$id_pelayan = $key->id_pelayan;
        		$nama  = $key->nama;
        		$index1 = array_push($melayaniApaSaja, $key->nama_pelayanan);
        		$index2 = array_push($idJenisPelayanan, $key->id_jenis_pelayanan);
        		$index2 -= 1; $index1 -= 1;
        		if($totalBidangPelayanan == 1){
        			
        			$check = $this->EM->check_if_duplicated_volunteer_added_in_event($id_pelayan, $idJenisPelayanan[$index2], $id);
        			// echo $check;
        			foreach ($check as $keys) {
        				// $duplikasi = $keys->showup;	$duplikasi > 1
        				//check kalo namanya terdaftar double di jadwal dengan tanggal jam waktu yang sama
        				// if(true){
        					// if($keys->id_event != $event_id){
        						$error_report .= "Found this volunteer(".$keys->nama."-".$keys->id_pelayan.") duplicated in ".$keys->event_name."(".$keys->id_event.") held on ". $keys->start_at." ". $keys->start_time_human." - ". $keys->end_time_human.")<br>";	
        			}
        		}else{
        			
        		}
        	}
        }
        $this->form_validation->set_message('check_availability', $error_report);
        return false;
	}

	public function view_volunter_from_schedule(){
		$event_id_view = $this->input->post('event_id_throw_view');
		// $this->session->set_userdata('event_id_thrown', $event_id_view);
		$get_volunter_submitted_by_id = $this->EM->get_event_view($event_id_view);

		echo json_encode($get_volunter_submitted_by_id);
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
	

}




