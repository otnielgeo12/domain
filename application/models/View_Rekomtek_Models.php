<?php

class View_Rekomtek_Models extends CI_Model{

      function show_domain(){

            $hasil=$this->db->query("SELECT * FROM rekomtek_app");

            return $hasil;

      }    

	  public function detail_data($id=NULL){
		  $query=$this->db->get_where('domain',array('id'=>$id))->row();
		  return $query;
	  }
}