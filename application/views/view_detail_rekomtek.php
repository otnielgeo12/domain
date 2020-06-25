<!DOCTYPE html>
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
      <h3><b>Data Rekomendasi Teknis<b></h3>
	  <h3><b>-Aplikasi Komputer-<b></h3>
	<table class="table">
	 <?php 

    			//foreach($data as $i):
				/*
				$id_rekomtek=$i['id_rekomtek'];
				$nip=$i['nip'];
                $nama=$i['nama'];
				$skpd=$i['skpd'];
				$email=$i['email'];
				$usulan=$i['usulan'];
				$biaya=$i['biaya'];
				$pengembangan=$i['pengembangan'];
				$tujuan=$i['tujuan'];
				$lingkup=$i['lingkup']; */
				
				$id_rekomtek=$data->id_rekomtek;
				$nip=$data->nip;
                $nama=$data->nama;
				$skpd=$data->skpd;
				$email=$data->email;
				$usulan=$data->usulan;
				$biaya=$data->biaya;
				$pengembangan=$data->pengembangan;
				$tujuan=$data->tujuan;
				$lingkup=$data->lingkup;
    ?> 
	<tr>
		<th>NIP</th>
		<td><?php echo $data->nip ?></td>
	</tr>
	<tr>
		<th>Nama Lengkap</th>
		<td><?php echo $nama?></td>
	</tr>
	<tr>
		<th>SKPD</th>
		<td><?php echo $skpd?></td>
	</tr>
	<tr>
		<th>EMAIL</th>
		<td><?php echo $email?></td>
	</tr>
		<th>Usulan Aplikasi</th>
		<td><?php echo $usulan ?></td>
	</tr>
		<th>Biaya</th>
		<td><?php echo $biaya ?></td>
	</tr>
		<th>Pengembangan</th>
		<td><?php echo $pengembangan?></td>
	</tr>
		<th>Tujuan</th>
		<td><?php echo $tujuan ?></td>
	</tr>
		<th>Lingkup</th>
		<td><?php echo $lingkup?></td>
	</tr>
	<?php
    		 	//endforeach;
    		 ?>
	</table>
	  </div>
	</div>

	</div>
	</div>
	<script src="<?php echo base_url().'assets/js/jquery-2.2.4.min.js'?>"> </script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"> </script>
<script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"> </script>
<script src="<?php echo base_url().'assets/js/moment.js'?>"> </script>
<script>

      $(document).ready(function(){

            $('#mydata').DataTable();

      });

</script>

<footer class="container-fluid bg-4 text-center">
  <p class="copyright"><strong>Data Rekomendasi Teknis Aplikasi Komputer</strong>
  - Pendaftaran Domain SKPD Prov Jateng <?php echo date('Y');?> &copy;Copyright Diskominfo Prov. Jateng</p> 
</footer>
</body>
</html>