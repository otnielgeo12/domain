<?php

class View_Domain_Models extends CI_Model{

      function show_domain(){

            $hasil=$this->db->query("SELECT * FROM domain 
            WHERE status='1'
            GROUP BY nama_domain 
            ORDER BY log DESC");

            return $hasil;

      }    

	  public function detail_data($id=NULL){
		  $query=$this->db->get_where('domain',array('id'=>$id))->row();
		  return $query;
	  }
}