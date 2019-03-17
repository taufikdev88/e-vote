<!DOCTYPE html>
<html lang="id">
</html>
<head>
    <meta charset="UTF-8">
    <title>E-Vote</title>
    <link rel="icon" href="<?php echo base_url()?>assets/img/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/datepicker.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#tanggal").datepicker({
                format:'yyyy-mm-dd'
            });
            $(document).on("contextmenu",function(){
                return false;
            })
        })
    </script>
</head>
<body>
    <div class="navbar" role="navigation">
        <div class="navbar-header">
			<img class="navbar-logo" src="<?php echo base_url(); ?>assets/img/logo.jpeg">
            <a class="navbar-brand" href="<?php echo site_url('web'); ?>">E-Vote Mekatronika</a>
        </div>
        <div>
			<span class="navbar-text"><p>Aktif Berkontribusi !</p></span>
        </div>
        <div class="pull-right navbar-partner">
        	<img src="<?php echo base_url(); ?>assets/img/partner.jpeg" alt="">
        </div>
    </div>
   	<div class="watermark" style="z-index: -3;"></div>