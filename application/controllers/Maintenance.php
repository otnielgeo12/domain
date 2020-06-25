<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {

	function __construct() {
        parent::__construct();        
        date_default_timezone_set('Asia/Jakarta');
        /*if($this->session->){

        }*/
    }

    public function index(){    	
    	$this->load->view('maintenance','');
    }

}

?>