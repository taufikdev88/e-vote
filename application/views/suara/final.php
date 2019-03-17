<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Evote</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
</head>
<body>
    <nav class="navbar" role="navigation">
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
    </nav>
    <div class="watermark"></div>
    <div class="container">
        <div class="row">
            <div class="final-header">
                <div class="final-thumb">
                    <img class="center" src="<?php echo base_url('assets/img/paslon/'.$foto[0]) ?>">
                    <span class="final-title"><?php echo $nama[0]; ?></span>
                </div>
                <div class="final-thumb">
                    <span class="skor"><?php echo $total[0]." : ".$total[1]; ?></span>
                </div>
                <div class="final-thumb">
                    <img class="center" src="<?php echo base_url('assets/img/paslon/'.$foto[1]) ?>">
                    <span class="final-title"><?php echo $nama[1]; ?></span>
                </div>                
            </div>
        </div>
        <br><hr>
        <div class="row">
            <div class="col-12">
                <table class="table center">
                    <tr>
                        <td><?php echo $total[0]; ?></td>
                        <td>Perolehan dari <?php echo $jumlah; ?> total suara</td>
                        <td><?php echo $total[1]; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $hari1[0]; ?></td>
                        <td>Perolehan pada tanggal <?php echo $tanggal[0]; ?></td>
                        <td><?php echo $hari1[1]; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $hari2[0]; ?></td>
                        <td>Perolehan pada tanggal <?php echo $tanggal[1]; ?></td>
                        <td><?php echo $hari2[1]; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>