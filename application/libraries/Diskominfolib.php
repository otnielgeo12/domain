<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskominfolib {

		protected $CI;

		public function __construct(){
			// Assign the CodeIgniter super-object
            $this->CI =& get_instance();
		}

        public function generate_token($username="",$password=""){
        	if(($username!="" && $username!=NULL) && ($password!="" && $password!=NULL)){

        	}
        }

        public function send_email($subject,$html,$email="",$title=""){

            $set_from="dasarakunya@gmail.com";            
            if($title==""){
                $title="Rekomendasi Teknis Aplikasi";
            }
           /* $CI =& get_instance();
            $CI->load->library('My_PHPMailer');*/
            $mail = new PHPMailer();
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

        public function postCURL($_url, $_param){

	        $postData = '';
	        //create name value pairs seperated by &
	        foreach($_param as $k => $v) 
	        { 
	          $postData .= $k . '='.$v.'&'; 
	        }
	        rtrim($postData, '&');


	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL,$_url);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	        curl_setopt($ch, CURLOPT_HEADER, false); 
	        curl_setopt($ch, CURLOPT_POST, count($postData));
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    

	        $output=curl_exec($ch);

	        curl_close($ch);

	        return $output;
	    }

	    public function alert_success($message){
	    	$message = '<div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <strong>'.$message.'</strong>
                        </div>';	
            return $message;
	    }

	    public function alert_danger($message){
	    	$message = '<div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <strong>'.$message.'</strong>
                        </div>';	
            return $message;
	    }

	    public function filter_input($data){
	    	$data = trim(htmlentities(strip_tags($data)));

			if (get_magic_quotes_gpc())
			  $data = stripslashes($data);

			$data = htmlspecialchars($data);
			return $data;
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

    function antiinject($inject)
    {//by Vires
        $inj=array("order","having","select","'",'"','/*','--');
        $ganti="[NO]";
        $bersih=str_replace($inj,$ganti,$inject);
        return $bersih;
    }


    /****************************************** LIBRARY WBS **************************************/
    function ico_laporan_status($id_stat){ //icon untuk status laporan, 1=diterima, 2=diproses, 3=selesai, 99=ditolak
        $html = '';
        if($id_stat==99){
            $html.='<button type="button" class="btn btn-hover btn-danger btn-block">Ditolak</button>';
        }else if($id_stat==1){
            $html.='<button type="button" class="btn btn-hover btn-primary btn-block">Diterima</button>';
        }else if($id_stat==2){
            $html.='<button type="button" class="btn btn-hover btn-warning btn-block">Diproses</button>';
        }else if($id_stat==3){
            $html.='<button type="button" class="btn btn-hover btn-success btn-block">Selesai</button>';
        }

        return $html;
    }


    /**********************************************************************************************/
}