<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CalendarController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CalendarModel');
        // $this->load->library('form_validation','session');
        $this->load->helper('url','form','html');
        // $this->load->library('database');
        
    }

    //calendar fucntion start from here!
    public function get_events()
    {
         // Our Start and End Dates
         // $start = $this->input->get("start");
         // $end = $this->input->get("end");

         // $startdt = new DateTime('now'); // setup a local datetime
         // $startdt->setTimestamp($start); // Set the date based on timestamp
         // $start_format = $startdt->format('Y-m-d H:i:s');

         // $enddt = new DateTime('now'); // setup a local datetime
         // $enddt->setTimestamp($end); // Set the date based on timestamp
         // $end_format = $enddt->format('Y-m-d H:i:s');

        $events = $this->CalendarModel->get_events();

        $data_events = array();

        foreach($events as $r) {

            // $data_events[] = array(
            //     "id" => $r->event_id,
            //     "event_name" => $r->event_name,
            //     "start_at" => $r->start_at,
            //     "end_at" => $r->end_at,
            //     "date" => $r->date
            // );
            $data_events[] = array(
                "id" => $r->event_id,   
                "title" => $r->event_name,
                "start" => $r->start_at,
                "end" => $r->end_at
            );
        }

        echo json_encode(array("events" => $data_events));
        exit();
    }

    public function add_event(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('event_name', 'event title', 'trim|required');
        $this->form_validation->set_rules('event_start', 'start time', 'trim|required');
        $this->form_validation->set_rules('event_end', 'end time', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        $data = array('success' => false, 'messages' => array());
        if($this->form_validation->run()){
            $data['success'] = true;

            // $inputs = array(
            //     'event_name'  => $this->input->post('event_name'),
            //     'start_at'    => $this->input->post('event_start'),
            //     'end_at'      => $this->input->post('event_end') 
            // );
            $success = $this->CalendarModel->add_events();
            if($success){
                redirect(base_url('admin/index'));
            }
        }else{
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }
    public function timestart(){
        
    }
    public function timeend(){

    }
    // calendar fucntion end here!
}
