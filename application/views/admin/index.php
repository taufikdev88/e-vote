<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var count = function(){
                var today = new Date().getTime(), end = new Date("Mar 1, 2018 23:59:00").getTime();
                var distance = end - today;
                var hari = Math.floor(distance/(1000*60*60*24));
                var jam = Math.floor((distance%(1000*60*60*24))/(1000*60*60));
                var menit = Math.floor((distance%(1000*60*60))/(1000*60));
                var detik = Math.floor((distance%(1000*60))/1000);
                
                $(".hari").text(hari);
                $(".jam").text(jam);
                $(".menit").text(menit);
                $(".detik").text(detik);
                
                if(distance<0){
                    clearInterval(count);
                }
            };
        })
    </script>
</head>
<body>
    <div class="navbar">
        <div class="container">
            <div class="col-8">
                <div class="navbar-header">
                    <div class="navbar-brand">
                        KPU HIMA MEKA
                    </div>
                </div>
            </div>
            <div class="col-4">
                    <form action="<?php echo site_url('admin/cek'); ?>" method="post">
                        <div class="form-login">
                            <input type="text" name="username" class="form-control" placeholder="username" required>
                            <input type="password" name="password" class="form-control" placeholder="password" required>
                            <button type="submit" class="btn btn-primary" name="submit">Masuk</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <div class="watermark"></div>
    <div class="container">
        <?php echo $this->session->flashdata('message');?>
        <div class="row">
            <div class="col-12">
                <div class="center">
                    <h3>Waktu Tersisa :</h3>
                </div>
            </div>
        </div>
        <div class="countdown">
            <span class="hari">00</span>
            <span class="divider">:</span>
            <span class="jam">00</span>
            <span class="divider">:</span>
            <span class="menit">00</span>
            <span class="divider">:</span>
            <span class="detik">00</span>
        </div>
    </div>
</body>
</html>