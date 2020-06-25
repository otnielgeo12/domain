<html lang="id">

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
    <a href="#">Domain</a>
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
        <div class="col-md-12">
            <div class="text-center m-b-md">
      <h3><b>Data Rekomendasi Teknis<b></h3>
	  <h3>-Aplikasi Komputer-</h3>
    <div>
    	<table class="table" id="mydata">
    		<thead>
                  <tr>

                        <th>NIP</th>
                        <th>Nama</th>
                        <th>SKPD</th>
                        <th>Usulan</th>
						<th>Tanggal</th>
						<td></td>
                  </tr>
            </thead>
    		<?php 
    			foreach($data->result_array() as $i):
				$id_rekomtek=$i['id_rekomtek'];
                $nip=$i['nip'];
                $nama=$i['nama'];
                $skpd=$i['skpd'];
				$usulan=$i['usulan'];
				$log=$i['log'];
    		 ?>
    		 	<tr>
                        
                        <td><?php echo $nip;?> </td>
                        <td><?php echo $nama;?> </td>
                        <td><?php echo $skpd;?> </td>
						<td><?php echo $usulan;?> </td>
						<td><?php echo $log;?> </td>
						<td><button class="bttn-fill bttn-sm bttn-primary"><a href="view_detail_rekomtek/?id=<?php echo $id_rekomtek?>">Detail</a></button></td>
                </tr>
				      </div>
				    </div>
				  </div>
				</div>
    		 <?php
    		 	endforeach;
    		 ?>
    	</table>
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


<script>

      $(document).ready(function(){

            $('#mydata').DataTable();

      });
	  
	  %nav.menu
  %input#menu-toggler.menu-toggler{:type => "checkbox", :checked => "checked"}
  %label{:for => "menu-toggler"}
  %ul
    %li.menu-item
      %a.fa.fa-facebook{:href => "https://www.facebook.com/", :target => "_blank"}
    %li.menu-item
      %a.fa.fa-google{:href => "https://www.google.com/", :target => "_blank"}
    %li.menu-item
      %a.fa.fa-dribbble{:href => "https://dribbble.com/", :target => "_blank"}
    %li.menu-item
      %a.fa.fa-codepen{:href => "https://codepen.io/", :target => "_blank"}
    %li.menu-item
      %a.fa.fa-linkedin{:href => "https://www.linkedin.com/", :target => "_blank"}
    %li.menu-item
      %a.fa.fa-github{:href => "https://github.com/", :target => "_blank"}
      
	  

</script>
<div class="content">
<footer class="container-fluid bg-4 text-center">
  <p class="copyright"><strong>Data Rekomendasi Teknis Aplikasi Komputer</strong>
  - Pendaftaran Rekomendasi Teknis Aplikasi Komputer SKPD Prov Jateng <?php echo date('Y');?> &copy;Copyright Diskominfo Prov. Jateng</p> 
</footer>
</div>

</body>

</html>