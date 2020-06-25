<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_Detail_Rekomtek extends CI_Controller {

      function __construct(){
            parent::__construct();
            $this->load->model('View_Detail_Rekomtek_Models');
			$this->load->database();
            date_default_timezone_set('Asia/Jakarta');
      }

     

      public function index(){
			$id = $this->input->get("id");
            $x['data']=$this->View_Detail_Rekomtek_Models->show_domain($id);
            $this->load->view('view_detail_rekomtek',$x);

      }
	  

}