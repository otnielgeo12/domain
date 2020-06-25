<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_Rekomtek extends CI_Controller {

      function __construct(){

            parent::__construct();

            $this->load->model('View_Rekomtek_Models');

      }

     

      public function index(){

            $x['data']=$this->View_Rekomtek_Models->show_domain();

            $this->load->view('view_rekomtek',$x);

      }

}