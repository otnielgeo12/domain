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
        <div class="col-md-12">
            <div class="text-center m-b-md">
      <h3><b>Data Domain Registration<b></h3>
      <small>domain yang sudah disetujui</small>
    <div>
    	<table class="table" id="mydata">
    		<thead>
                  <tr>

                        <th>No</th>
                        <th>SKPD</th>
                        <th>Nama Domain</th>
						<th>Tanggal</th>
						<td></td>
                  </tr>
            </thead>
        <?php 
          $no=0;
          foreach($data->result_array() as $i):
              $no++;
				      $id_domain=$i['id_domain'];
              $skpd = $this->Home_model->get_skpd_name($i['skpd']);
              //$skpd=$i['skpd'];
				          $nama_domain = $i['nama_domain'];
				$log=$i['log'];
    		 ?>
    		 	<tr>
                        
                        <td><?php echo $no;?> </td>                        
                        <td><?php echo $skpd;?> </td>
						<td><?php echo $nama_domain;?> </td>
						<td><?php echo $log;?> </td>
                </tr>
				      </div>
				    </div>
				  </div>
				</div>
    		 <?php endforeach
    		 ?>
    	</table>
    </div>

<div class="center">
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
	<script src="<?php echo base_url();?>assets/css/bttn.css"></script>
<script>

      $(document).ready(function(){

            $('#mydata').DataTable();

      });

</script>
<div class="content">
<footer class="container-fluid bg-4 text-center">
  <p class="copyright"><strong>Data Domain</strong>
  - Pendaftaran Domain SKPD Prov Jateng <?php echo date('Y');?> &copy;Copyright Diskominfo Prov. Jateng</p> 
</footer>
</div>
</body>
</html>