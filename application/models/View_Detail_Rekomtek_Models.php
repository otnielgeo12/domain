<?php

class View_Detail_Rekomtek_Models extends CI_Model{

	function show_domain($id=""){
		
		if($id!=""){
			$this->db->where(array("id_rekomtek"=>$id));
		}
			$this->db->select("*");
            $hasil= $this->db->get("rekomtek_app");

            return $hasil->row();

      }


	 
}