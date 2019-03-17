<script type="text/javascript">
	$(document).ready(function(){
		var x = $(".carousel-inner img").length;
		var i = 0, temp = 3;
		setInterval(function(){
			if(i == x) i = 0;
			if(i < 1) temp = 3; else temp = i;
			
			$(".carousel-inner #p"+temp).removeClass("active");
			$(".carousel-indicators #i"+temp).removeClass("active");
			
			i++;
			$(".carousel-inner #p"+i).addClass("active");
			$(".carousel-indicators #i"+i).addClass("active");
		},3000);
		
		$("button[type='button'][name='submit']").click(function(){
			$("#ver1,#ver2").removeClass("hidden");
			$(this).attr("type","submit");
		})
        
        $("input").keypress(function(e){
            if(e.which == 13){
                $("button[type='button'][name='submit']").click();
            }
        })
        
        $("#see").mousedown(function(){
            $("#pass").attr("type","text");
            $(this).css('box-shadow','0 0 5px 1px #ea7e11');
        })
	})
</script>
    <div class="container">
        <div class="row logo">
            <img src="<?php echo base_url(); ?>assets/img/logo.png">
        </div>
        <div class="row form-login">
            <div class="col-6">
                <div class="pull-right">
                    <div class="carousel" id="slideku">
                        <ol class="carousel-indicators">
                            <li data-target="slideku" class="active" id="i1"></li>
                            <li data-target="slideku" id="i2"></li>
                            <li data-target="slideku" id="i3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active" id="p1">
                                <img src="<?php echo base_url(); ?>assets/img/photo1.jpg">
                            </div>
                            <div class="carousel-item" id="p2">
                                <img src="<?php echo base_url(); ?>assets/img/photo2.JPG">
                            </div>
                            <div class="carousel-item" id="p3">
                                <img src="<?php echo base_url(); ?>assets/img/photo3.JPG">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="pull-left">
					<span class="info">
						<p class="text-info">Masukkan username dan password yang telah didapat dari panitia</p>
						<p class="text-info"><?php echo $this->session->flashdata('message');?></p>
					</span>
                    <form action="<?php echo site_url('web/proses'); ?>" method="post" id="formlogin">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" id="pass" required>
                            <span class="icon-eye" id="see"> </span>
                        </div>
                        <div class="form-group hidden" id="ver1">
                        	<label>Tanggal berapa anda lahir ? format (tahun-bulan-tanggal)</label></div>
                        <div class="form-group hidden" id="ver2">
                        	<input class="form-control" type="text" name="ttl" lang="id" id="tanggal" required>
                        </div>
                        <div class="form-group">
                            <button type="button" name="submit" class="btn btn-primary">Masuk</button>
                            <button type="reset" class="btn btn-danger">Ulang</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3">
<!--                no comment-->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="center">Suara masuk pada tanggal <?php echo $tanggal[0]." : ".$jumlah[0]; ?> </div>
                <div class="center">Suara masuk pada tanggal <?php echo $tanggal[1]." : ".$jumlah[1]; ?> </div>
            </div>
        </div>
    </div>