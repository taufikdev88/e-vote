<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
        <link rel="icon" href="<?php echo base_url()?>assets/img/favicon.png" type="image/png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jspdf.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
        $(document).ready(function(){
            $(".menu-item .header").click(function(){
                $(".menu-item").each(function(){
                    $(this).children(".item").slideUp();
                })
                $(this).next(".item").slideToggle();
                $(this).css("height","auto");
            })

            $(document).on("contextmenu",function(){
                return false;
            })
            
            $("#print").click(function () {
                var doc = new jsPDF();
                doc.addHTML($('#content'), 15, 15, {
                    'background': '#fff',
                    'border':'2px solid white',
                }, function() {
                    doc.save('report.pdf');
                });
            });
            
            $("#tanggal").datepicker({
                format: 'yyyy-mm-dd'
            });
        })
        function toggleNew(){
            $(".collapse").slideToggle();
        }
    </script>
</head>
<body>
    <div class="navbar" role="navigation">
        <div class="navbar-header">
			<img class="navbar-logo" src="<?php echo base_url(); ?>assets/img/logo.jpeg">
            <a class="navbar-brand" href="<?php echo site_url('dashboard'); ?>">E-Vote Mekatronika</a>
        </div>
        <div>
			<span class="navbar-text"><p>Aktif Berkontribusi !</p></span>
        </div>
        <div class="pull-right navbar-partner">
        	<img src="<?php echo base_url(); ?>assets/img/partner.jpeg" alt="">
        </div>
    </div>
   	<div class="watermark"></div>
   	<div class="container">
   	    <div class="row">
   	        <div class="col-3">
   	            <div class="menubar-group">
                    <div class="menu-item">
                        <div class="header">Administrator</div>
                        <ul class="item">
                            <li><a href="<?php echo site_url('anggota'); ?>">Pengguna</a></li>
                            <li><a href="<?php echo site_url('paslon'); ?>">Pasangan Calon</a></li>
                        </ul>
                    </div>
                </div>
   	            <div class="menubar-group">
                    <div class="menu-item">
                        <div class="header">Data Evote</div>
                        <ul class="item">
                            <li><a href="<?php echo site_url('suara'); ?>">Perhitungan Suara</a></li>
<!--
                            <li><a href="../data/voted.php">Penyumbang Suara</a></li>
                            <li><a href="../data/notvote.php">User Golput</a></li>
-->
                        </ul>
                    </div>
                </div>
   	            <div class="menubar-group">
                    <div class="menu-item">
                        <div class="header">User Option</div>
                        <ul class="item" style="display: block">
                            <li><a href="<?php echo site_url('dashboard/logout'); ?>">Keluar</a></li>
                        </ul>
                    </div>
                </div>
   	        </div>