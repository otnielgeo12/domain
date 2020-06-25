<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_Domain extends CI_Controller {

      function __construct(){

            parent::__construct();

            $this->load->model('View_Domain_Models');

      }

     

      public function index(){

            $x['data']=$this->View_Domain_Models->show_domain();

            $this->load->view('view_domain',$x);

      }

}