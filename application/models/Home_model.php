<?php 
class Home_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    public function get_skpd($name=""){
        $this->db->select('role,rolename,aktif');
        if($name!=""){
            $this->db->like('rolename',$name,'both');
        }                
        //$this->db->where('aktif','y');        
        $this->db->from('role');
        $query = $this->db->get();
        return $query;
    }

    public function get_skpd_parent($parent){

    }

    public function get_skpd_real($name=""){
        $this->db->select('kode_skpd,nama_skpd,aktif');
        if($name!=""){
            $this->db->like('skpd_name',$name,'both');
        }                
        $this->db->where('aktif="y"');        
        $this->db->from('skpd');
        $query = $this->db->get();
        return $query;
    }

    public function get_skpd_name($kode_skpd=""){
        if($kode_skpd!=""){
            $this->db->select('nama_skpd');
            $this->db->where(array('kode_skpd'=>$kode_skpd));
            $query = $this->db->get('skpd');
            if($this->db->affected_rows()>0){
                return $query->row()->nama_skpd;
            }else return false;            
        }
    }
}
?>