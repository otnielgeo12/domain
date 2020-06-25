<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logoprovjateng.ico">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Registration | Dinas Komunikasi dan Informatika Provinsi Jawa Tengah</title>

	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/select2-3.5.2/select2.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/select2-bootstrap/select2-bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/style.css">

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bttn.css"/>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css"/>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/back.css"/>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/footer.css"/>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="icono.min.css">
	<link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">

</head>
<body>

<img src="<?php echo base_url(); ?>assets/img/logo.png">
	<ul class="menu cf">
  <li><a href="https://diskominfo.jatengprov.go.id/">Home</a></li>
  <li>
    <a href="<?php echo base_url(); ?>">Domain</a>
    <ul class="submenu">
      <li><a href="<?php echo base_url(); ?>">Form Domain</a></li>
      <li><a href="<?php echo base_url(); ?>index.php/view_domain">List Domain</a></li>
    </ul>
  </li>
  <li><a href="#">Rekomtek</a>
	<ul class="submenu">
		<li><a href="<?php echo base_url(); ?>index.php/rekomtek">Form Rekomtek</a></li>
      <li><a href="<?php echo base_url(); ?>index.php/view_rekomtek">List Rekomtek</a></li>
	</ul>
	</li>
  <li><a href="<?php echo base_url(); ?>index.php/view_contact">Contact</a></li>
</ul>

    <div class="register-container">
    <div class="row">
        <div class="col-md-7">
            <div class="text-center m-b-md">
                <h3><b>FORM REKOMENDASI TEKNIS </b><br/> - Aplikasi Komputer -</h3>
                <small><b>Dinas Komunikasi dan Informatika Provinsi Jawa Tengah <?php echo date('Y');?> </b></small>
                <br/><?php echo ($this->session->flashdata('message')!="")?$this->session->flashdata('message'):''; ?>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                        <form action="<?php echo base_url(); ?>home/save_rekomtek" id="loginForm" method="POST" enctype="multipart/form-data">
                            <div class="row">
                            <div class="form-group col-lg-6">
                                <label>NIP</label>
                                <input type="number" value="<?php echo set_value('nip'); ?>" id="nip" class="form-control" name="nip">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Nama</label>
                                <div id="loading"><img src="http://diskominfo.jatengprov.go.id/domain/assets/vendor/select2-3.5.2/select2-spinner.gif"/> loading...</div>
                                <input type="nama" id="nama" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>SKPD</label>
                                <select class="js-source-states" id="skpd" name="skpd" style="width: 100%">
                                    <option selected disabled value="">---</option>
                                    <?php          
                                                            
                                    foreach($skpd->result() as $row){                                            
                                        echo '<option value="'.$row->kode_skpd.'">'.$row->nama_skpd.'</option>';
                                    }
                                    ?>                                  
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Email</label>
                                <input type="email" id="email" class="form-control" name="email">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Usulan Aplikasi</label>
                                <input type="text" value="" id="usulan" class="form-control" name="usulan">
                            </div>                            
                            <div class="form-group col-lg-6">
                                <label>Biaya Pembuatan Aplikasi</label>
                                <input type="number" id="biaya" class="form-control" name="biaya">
                            </div>                            
                            <div class="form-group col-lg-12">
                                <label>Rencana Pengembangan</label>
                                <textarea id="pengembangan" name="pengembangan" placeholder="ex : kapan aplikasi akan digunakan? menggunakan pihak ketiga atau tidak? dan sebagainya..." rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Tujuan Aplikasi</label>
                                <textarea id="tujuan" name="tujuan" placeholder="tujuan aplikasi dibuat..." rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Lingkup Penggunaan Aplikasi</label>
                                <textarea id="lingkup" name="lingkup" placeholder="Lingkup Kegunaan Aplikasi Untuk Internal / Eksternal" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>File<br/><small>(doc,docx,pdf) 200kb</small></label>
                                <input type="file" id="userfile" class="form-control" name="userfile">
                            </div>
                            <div class="checkbox col-lg-12">
                                <input type="checkbox" class="i-checks" name="check" value="1">
                                <label for="check">Saya telah menyetujui pendaftaran aplikasi</label>
                            </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success" id="register">Register</button>
                                <button class="btn btn-default" onclick="document.getElementById('loginForm').reset()">Cancel</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
	<div class="col-md-5">
            <div class="text-center m-b-md">               
            </div>
                <div class="col-lg-12 animated-panel zoomIn" style="animation-delay: 0.1s;">
        <div class="hpanel">
            <a class="showhide">
                <div class="panel-heading hbuilt">
                    
                    <div class="panel-tools">
                        <i class="fa fa-chevron-up"></i>
                    </div>
                    -Informasi Rekomendasi Teknis Aplikasi-
                </div>
            </a>
           <div class="panel-body">
                <div class="text-center m-b-md">
                    <h3>REKOMENDASI TEKNIS APLIKASI</h3>
                    <small>Berikut adalah contoh berkas Permohonan Rekomendasi Teknis Aplikasi
					Komputer</small><br>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="edaran">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                    Surat Edaran
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="edaran" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <button class="btn btn-success" id="download">Download</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="fromRekomtek">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Contoh Permohonan Rekomendasi 
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="fromRekomtek" aria-expanded="false">
                            <div class="panel-body">
                                <button class="btn btn-success" id="download">Download</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="flowChart">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                                    Contoh Alur Pembuatan/Flowchart Aplikasi
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                            <div class="panel-body">
                                <button class="btn btn-success" id="download">Download</button>
                            </div>
                        </div>
                    </div>
                </div>
			</div>      
        </div>
            </div>
    </div>
</div>

    <script src="<?php echo base_url();?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery-flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery-flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery-flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/flot.curvedlines/curvedLines.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery.flot.spline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/iCheck/icheck.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/select2-3.5.2/select2.min.js"></script>

    <!-- App scripts -->
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#loading').hide();
            $(".js-source-states").select2();
            $('#skpd_name').on('keyup',function(event){             
                event.preventDefault();
                $.post('<?php echo base_url();?>home/ajax_skpd',{skpd_name:$('#skpd_name').val()},function(data,status){
                    $('#result').html(data);
                });
            });

            $('#nip').bind('change',function(){
            //$('#nip').blur(function(){
                //var nip = $(this).val();
                $.ajax({
                    type:"POST",
                    dataType:'json',
                    url:'<?php echo base_url();?>home/webservice_nip',
                    data:{nip:$(this).val()},
                    beforeSend: function(status)
                    {   
                        $('#loading').show();
                    }, 
                    success:function(data,status){
                        //console.log(JSON.stringify(data));
                        //console.log(status);
                        $('#loading').hide();
                        var obj = jQuery.parseJSON(JSON.stringify(data));
                        if(obj.nama!=undefined){
                            //if(status=="success"){
                                console.log(obj.nama);
                                $('#nama').val(obj.nama);
                                if(obj.email!="" && obj.email!=null){
                                    $('#email').val(obj.email);
                                }                            
                            //}
                        }else{
                            $('#nama').val("Tidak Ditemukan");
                        }
                    }
                })/*.
                    done(function(data){
                        //console.log(JSON.stringify(data));
                        var obj = jQuery.parseJSON(JSON.stringify(data));
                        if(obj.nama!=undefined){
                            console.log(obj.nama);
                            $('#nama').val(obj.nama);
                            if(obj.email!="" && obj.email!=null){
                                $('#email').val(obj.email);
                            }
                        }else{
                            $('#nama').val("Tidak Ditemukan");
                        }
                    }).
                    fail( function(xhr, textStatus, errorThrown) {
                    /*alert(xhr.responseText);
                    alert(textStatus);*/
                /*})*/;
            });        
            });
    </script>
<div class="content">
<footer class="container-fluid bg-4 text-center">
  <p class="copyright"><strong>Rekomendasi Teknis Aplikasi Komputer</strong>
  - Pendaftaran Rekomendasi Teknis Aplikasi Komputer SKPD Prov Jateng <?php echo date('Y');?> &copy;Copyright Diskominfo Prov. Jateng</p> 
</footer>
</div>
</body>
</html>