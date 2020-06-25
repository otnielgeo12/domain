<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->database();
        date_default_timezone_set('Asia/Jakarta');
		
		
    }

	public function index()
	{
		$data['skpd'] = $this->Home_model->get_skpd_real();
		$this->load->view('form_domain_registration',$data);
	}

	public function ajax_skpd(){
		if($this->input->post('skpd_name')!=""){
			$name = $this->input->post('skpd_name',TRUE);
			$q = $this->Home_model->get_skpd_real($name)->result_array();
			echo json_encode($q);
		}
	}

	public function save_registration(){
		$insert = array();
		$insert['nip'] = $this->input->post('nip',TRUE);
		$insert['nama'] = $this->input->post('nama',TRUE);
		$insert['email'] = $this->input->post('email',TRUE);
		$insert['telpon'] = $this->input->post('telp',TRUE);
		$insert['skpd'] = $this->input->post('skpd',TRUE);
		$insert['nama_domain'] = $this->input->post('domain',TRUE);
		$check = $this->input->post('check',TRUE);
		$insert['log'] = date('Y-m-d h:i:s');
		$subject="Layanan Permohonan Domain Provinsi Jawa Tengah";
		$html="Selamat Anda Telah Melakukan Registrasi Domain dengan nama ".$insert['nama_domain'];
		$email=$insert['email'];
		$title="Permohonan Domain Provinsi Jawa Tengah";

		//menambahkan log user agent 
		$agent = "";
		if ($this->agent->is_browser())
		{
	        $agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
	        $agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile())
		{
	        $agent = $this->agent->mobile();
		}
		else
		{
	        $agent = 'Unidentified User Agent';
		}
		$agent .= " / ".$this->agent->platform();
		$insert['host'] = $this->input->ip_address()."/".$agent;		
        
        if($_FILES['userfile']['name']!=""){
        	$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
        }        
        //$upload_data = $this->upload->data();
        //$filename = $upload_data['file_name'];                
                    
		if($insert['nip']!="" && $insert['nama']!="" && $insert['email']!="" && $insert['telpon']!="" && $insert['skpd']!="" && $insert['nama_domain']!="" && $_FILES['userfile']['name']!="" && ($ext=="pdf" || $ext="docx" || $ext=="doc")){

			if($check!=1){
				$this->session->set_flashdata('message','<p style="color:red;">Anda belum menyetujui pendaftaran aplikasi!</p>');
				redirect(base_url());
			}

			if($insert['nama']=="Tidak Ditemukan"){
				$this->session->set_flashdata('message','<p style="color:red;">NIP dan Nama Tidak Ditemukan!</p>');
				redirect(base_url('rekomtek'));
			}else{
				$config['upload_path']          = './uploads/file';
		        $config['allowed_types']        = 'pdf|docx|doc';
		        $config['max_size']             = 2024;	//2MB     
		        $config['file_name']     		= date('Y-m-d')."-domain-".str_replace(' ', '_', pathinfo($_FILES['userfile']['name'], PATHINFO_FILENAME)).'.'.pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);   
		        $this->load->library('upload', $config);

		        /*$filename = $insert['skpd']."-";
		        $filename .= str_replace(' ', '_', pathinfo($_FILES['userfile']['name'], PATHINFO_FILENAME));
		        $config['file_name']			= $filename;	           
		        $insert['filename'] = base64_encode($filename).".".$ext;	        	       */
		        $insert['filename'] = date('Y-m-d')."-domain-".str_replace(' ', '_', pathinfo($_FILES['userfile']['name'], PATHINFO_FILENAME)).'.'.pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
		        if ( ! $this->upload->do_upload('userfile'))
		        {
		                $this->session->set_flashdata('message','<p style="color:red;">Gagal Ditambahkan!<br/><b>'.$this->upload->display_errors().'</p>');
						redirect(base_url());        
						//echo "gagal upload ".$this->upload->display_errors();
		        }else{
		        	if($this->db->insert('domain',$insert)){
						$insert_id = $this->db->insert_id();
						//GALLA EGOV (29 03 2019) - menambahkan notif ke email egov
						$this->session->set_flashdata('message','<p style="color:blue;">Berhasil Ditambahkan! #'.$insert_id.'</p>');
						$html_mail = $this->Home_model->get_skpd_name($insert['skpd'])." telah melakukan Rekomtek Aplikasi pada ".date('dmY').".  
							<br/> Nama/NIP : ".$insert['nama']."/".$insert['nip']."
							<br/> Email : ".$insert['email']."
							<br/> HP/Telp : ".$insert['telpon']."
							<br/> Nama Domain : ".$insert['nama_domain']."							
							<br/> File : <a target='_blank' href='".base_url()."/uploads/file/".$config['file_name']."'>Lihat</a> 
							";
						$this->diskominfolib->send_email("Permohonan Domain - ".$this->Home_model->get_skpd_name($insert['skpd']),$html_mail,"egov.jatengprov@gmail.com","");
						//END GALLA EGOV (29 03 2019) - menambahkan notif ke email egov
						$this->session->set_flashdata('message','<p style="color:blue;">Berhasil Ditambahkan! #'.$insert_id.'</p>');
						$this->send_email($subject,$html,$email,$title);
						redirect(base_url());
						//echo "berhasil insert";
					}else{
						$this->session->set_flashdata('message','<p style="color:red;">Gagal Ditambahkan!<br/><b>'.$this->db->_error_message().'</b></p>');
						redirect(base_url());
						//echo "gagal insert";
					}
		        }			
				/*
		        $upload_data = $this->upload->data();
		        $filename = $upload_data['file_name'];
		        echo $filename;*/
			}			
		}else{
			$this->session->set_flashdata('message','<p style="color:red;">Lengkapi Form!</p>');
			redirect(base_url());
		}
	}

	public function domain_skpd(){
		$data['content'] = $this->Home_model->get_skpd_name();
		$this->load->view('skpd',$data);
	}

	public function domain_skpd_name(){
		$nama_skpd = ($this->input->post('cari_skpd')!="")?$this->input->post('cari_skpd'):"";
		$data['content'] = $this->Home_model->get_skpd_name($nama_skpd);
		$this->load->view('skpd_view',$data);		
	}

	public function domain_skpd_detail($id_skpd=""){

	}

	public function rekomtek()
	{
		$data['skpd'] = $this->Home_model->get_skpd_real();
		$this->load->view('form_rekomtek',$data);
	}

	public function save_rekomtek(){
		$insert = array();
		$insert['nip'] = $this->input->post('nip',TRUE);
		$insert['nama'] = $this->input->post('nama',TRUE);
		$insert['email'] = $this->input->post('email',TRUE);		
		$insert['skpd'] = $this->input->post('skpd',TRUE);
		$insert['usulan'] = $this->input->post('usulan',TRUE);
		$insert['biaya'] = $this->input->post('biaya',TRUE);
		$insert['pengembangan'] = $this->input->post('pengembangan',TRUE);
		$insert['tujuan'] = $this->input->post('tujuan',TRUE);
		$insert['lingkup'] = $this->input->post('lingkup',TRUE);
		$check = $this->input->post('check',TRUE);		
		$insert['log'] = date('Y-m-d h:i:s');

		//menambahkan log user agent 
		$agent = "";
		if ($this->agent->is_browser())
		{
	        $agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
	        $agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile())
		{
	        $agent = $this->agent->mobile();
		}
		else
		{
	        $agent = 'Unidentified User Agent';
		}
		$agent .= " / ".$this->agent->platform();
		$insert['host'] = $this->input->ip_address()."/".$agent;		

		if($_FILES['userfile']['name']!=""){
			$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
		}
		               
		if($insert['nip']!="" && $insert['nama']!="" && $insert['email']!="" && $insert['usulan']!="" && $insert['skpd']!="" && $insert['biaya']!="" && $insert['pengembangan'] && $insert['tujuan']  && $insert['lingkup'] && $_FILES['userfile']['name']!="" && ($ext=="pdf" || $ext="docx" || $ext=="doc")){
			if($check!=1){
				$this->session->set_flashdata('message','<p style="color:red;">Anda belum menyetujui pendaftaran aplikasi!</p>');
				redirect(base_url('rekomtek'));
			} 
			if($insert['nama']=="Tidak Ditemukan"){
				$this->session->set_flashdata('message','<p style="color:red;">NIP dan Nama Tidak Ditemukan!</p>');
				redirect(base_url('rekomtek'));
			}else{

				//config upload file
				$config['upload_path']          = './uploads/file';
		        $config['allowed_types']        = 'pdf|docx|doc';
		        $config['max_size']             = 2024;	//2MB   
		        $config['file_name']     		= date('Y-m-d')."-rekomtek-".str_replace(' ', '_', pathinfo($_FILES['userfile']['name'], PATHINFO_FILENAME)).'.'.pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
		        $this->load->library('upload', $config);

		        /*$filename = $insert['skpd']."-";
		        $filename .= str_replace(' ', '_', pathinfo($_FILES['userfile']['name'], PATHINFO_FILENAME));
		        $config['file_name']			= $filename;	           
		        $insert['filename'] = base64_encode($filename).".".$ext;	        	       */
		        $insert['filename'] = date('Y-m-d')."-".str_replace(' ', '_', pathinfo($_FILES['userfile']['name'], PATHINFO_FILENAME)).'.'.pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
		        //upload file
		        if ( ! $this->upload->do_upload('userfile'))
		        {
		                $this->session->set_flashdata('message','<p style="color:red;">Gagal Ditambahkan!<br/><b>'.$this->upload->display_errors().'</p>');
						redirect(base_url());        
						//echo "gagal upload ".$this->upload->display_errors();
		        }else{
		        	if($this->db->insert('rekomtek_app',$insert)){
						$insert_id = $this->db->insert_id();
						//GALLA EGOV (29 03 2019) - menambahkan notif ke email egov
						$this->session->set_flashdata('message','<p style="color:blue;">Berhasil Ditambahkan! #'.$insert_id.'</p>');
						$html_mail = $this->Home_model->get_skpd_name($insert['skpd'])." telah melakukan Rekomtek Aplikasi pada ".date('dmY').".  
							<br/> Nama/NIP : ".$insert['nama']."/".$insert['nip']."
							<br/> Email : ".$insert['email']."
							<br/> Usulan Aplikasi : ".$insert['usulan']."
							<br/> Biaya Pembuatan Aplikasi : ".$insert['biaya']."
							<br/> Rencana Pengembangan : ".$insert['pengembangan']."
							<br/> Tujuan Aplikasi : ".$insert['tujuan']."
							<br/> Lingkup Aplikasi : ".$insert['lingkup']."
							<br/> File : <a target='_blank' href='".base_url()."/uploads/file/".$config['file_name']."'>Lihat</a> 
							";
						$this->diskominfolib->send_email("Rekomtek Aplikasi - ".$this->Home_model->get_skpd_name($insert['skpd']),$html_mail,"egov.jatengprov@gmail.com","");
						//END GALLA EGOV (29 03 2019) - menambahkan notif ke email egov
						redirect(base_url('rekomtek'));
						//echo "berhasil insert";
					}else{
						$this->session->set_flashdata('message','<p style="color:red;">Gagal Ditambahkan!<br/><b>'.$this->db->_error_message().'</b></p>');
						redirect(base_url('rekomtek'));
						//echo "gagal insert";
					}
		        }		//end upload file
	        	
			}		        		
		}else{
			$this->session->set_flashdata('message','<p style="color:red;">Lengkapi Form!</p>');
			redirect(base_url('rekomtek'));
		}
	}

	public function webservice_nip(){
		if($this->input->post('nip')!=""){
			$nip = $this->input->post('nip',TRUE);
			$response = $this->get_web_page("http://simpeg.bkd.jatengprov.go.id/webservice/identitas?nip=".$nip);
			$resArr = array();
			$resArr = json_decode($response);
			print_r($resArr); 

		}else if($this->input->get('nip')!=""){
			$nip = $this->input->get('nip',TRUE);
			$response = $this->get_web_page("http://simpeg.bkd.jatengprov.go.id/webservice/identitas?nip=".$nip);
			$resArr = array();
			$resArr = json_decode($response);
			print_r($resArr);
		}
	}

	function get_web_page($url) {
	    $options = array(
	        CURLOPT_RETURNTRANSFER => true,   // return web page
	        CURLOPT_HEADER         => false,  // don't return headers
	        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
	        CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
	        CURLOPT_ENCODING       => "",     // handle compressed
	        CURLOPT_USERAGENT      => "test", // name of client
	        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
	        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
	        CURLOPT_TIMEOUT        => 120,    // time-out on response
	    ); 

	    $ch = curl_init($url);
	    curl_setopt_array($ch, $options);

	    $content  = curl_exec($ch);

	    curl_close($ch);

	    return json_encode($content);
	}
	public function send_email($subject,$html,$email="",$title=""){

            $set_from="dasarakunya@gmail.com";            
            if($title==""){
                $title="Rekomendasi Teknis Aplikasi";
            }
            $CI =& get_instance();
            $CI->load->library('My_PHPMailer');
            $mail = new My_PHPMailer();
            $mail->IsSMTP(); 
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = "tls";
            $mail->Host       = "smtp.gmail.com";
            $mail->Port       = 587;
            $mail->Username   = "dasarakunya@gmail.com"; //bisa diganti menyesuaikan email yang akan digunakan
            $mail->Password   = "otnielgeo123";
            $mail->SetFrom($set_from, $title);
            $mail->AddReplyTo($set_from, $title);
            $mail->Subject    = $subject;
            $mail->MsgHTML($html);
            $mail->AddAddress($email);           
            if($mail->Send())
                return true;
            else 
                return false;

        }

}
